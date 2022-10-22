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
     * Init Constructor
     *
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Framework\Stdlib\DateTime\TimezoneInterface $timezone
     * @param \Magento\Customer\Helper\Session\CurrentCustomer $session
     * @param \Magento\Shipping\Model\Config $shippingConfig
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\Stdlib\DateTime\TimezoneInterface $timezone,
        \Magento\Customer\Helper\Session\CurrentCustomer $session,
        \Magento\Shipping\Model\Config $shippingConfig
    ) {
        parent::__construct($context);

        $this->timezone = $timezone;
        $this->session = $session;
        $this->shippingConfig = $shippingConfig;
    }

    /**
     * Get module configuration values from core_config_data
     *
     * @param string $setting
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
        $timezone = $this->timezone->getConfigTimezone();

        $date_current = date_create('now', new \DateTimeZone($timezone))
            ->getTimestamp();
        $date_start = date_create($this->getConfig('date_start'), new \DateTimeZone($timezone))
            ->getTimestamp();
        $date_end = date_create($this->getConfig('date_end'), new \DateTimeZone($timezone))
            ->getTimestamp();

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
         * Check if end date is in range
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

            $title = $carrierModel->getConfigData('title');

            foreach ($carrierMethods as $methodCode => $method) {
                $code = $carrierCode . '_' . $methodCode;

                $methods[] = [
                    'label' => sprintf('%s (%s)', $title, $methodCode),
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
