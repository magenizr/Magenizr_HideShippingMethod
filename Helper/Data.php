<?php
/**
 * Magenizr HideShippingMethod
 *
 * @category    Magenizr
 * @package     Magenizr_HideShippingMethod
 * @copyright   Copyright (c) 2018 Magenizr (https://www.magenizr.com)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

namespace Magenizr\HideShippingMethod\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{

    /**
     * @var \Magento\Framework\Stdlib\DateTime\TimezoneInterface
     */
    private $timezone;

    /**
     * @var \Magento\Customer\Helper\Session\CurrentCustomer
     */
    private $session;

    /**
     * @var \Magento\Framework\App\Config
     */
    private $shippingConfig;

    /**
     * @var String
     */
    private $tab = 'checkout';

    /**
     * Data constructor.
     * @param \Magento\Framework\Stdlib\DateTime\TimezoneInterface $timezone
     * @param \Magento\Customer\Helper\Session\CurrentCustomer $session
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Magento\Shipping\Model\Config $shippingConfig
     */
    public function __construct(
        \Magento\Framework\Stdlib\DateTime\TimezoneInterface $timezone,
        \Magento\Customer\Helper\Session\CurrentCustomer $session,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Shipping\Model\Config $shippingConfig
    ) {
    
        $this->timezone = $timezone;
        $this->session = $session;
        $this->scopeConfig = $scopeConfig;
        $this->shippingConfig = $shippingConfig;
    }

    /**
     * Get module configuration values from core_config_data
     *
     * @param $setting
     * @return mixed
     */
    public function getConfig($setting)
    {
        return $this->scopeConfig->getValue(
            $this->tab . '/magenizr_hideshippingmethod/' . $setting,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Get different values from core_config_data and decide if custom shipping method is available.
     *
     * @return boolean
     */
    public function isAvailable()
    {
        $date_current = strtotime($this->timezone->formatDate());
        $date_start = strtotime($this->getConfig('date_start'));
        $date_end = strtotime($this->getConfig('date_end'));
        $weekdays = $this->getConfig('weekdays');
        $day = strtolower(date('D', $date_current));

        /**
         * Check if shipping method is actually enabled
         */
        if (!$this->getConfig('enabled')) {
            return false;
        }

        /**
         * Check if shipping method should be available for logged in users only
         */
        if ($this->getConfig('customer') && !$this->isCustomerLoggedIn()) {
            return false;
        }

        /**
         * Check if shipping method should be visible at current name of day
         */
        if (strpos($weekdays, $day) === false) {
            return false;
        }

        /**
         * Check if start date is in range
         */
        if ($date_start && $date_start > $date_current) {
            return false;
        }

        /**
         * Check if start end is in range
         */
        if ($date_end && $date_end < $date_current) {
            return false;
        }

        return true;
    }

    /**
     * Return array of allowed carriers
     *
     * @return array
     */
    public function getActiveCarriers()
    {
        $carriers = $this->shippingConfig->getActiveCarriers();
        $methods = [];

        foreach ($carriers as $carrierCode => $carrierModel) {
            if (!$carrierMethods = $carrierModel->getAllowedMethods()) {
                continue;
            }

            $title = $this->scopeConfig->getValue('carriers/' . $carrierCode . '/title');

            foreach ($carrierMethods as $methodCode => $method) {
                $code = $carrierCode . '_' . $methodCode;

                $methods[] = [
                    'label' => $title,
                    'value' => $code
                ];
            }
        }

        return $methods;
    }

    /**
     * Check if current user logged in
     *
     * @return bool
     */
    private function isCustomerLoggedIn()
    {
        return $this->session->isLoggedIn();
    }
}
