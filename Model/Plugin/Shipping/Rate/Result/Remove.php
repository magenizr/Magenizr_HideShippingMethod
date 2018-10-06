<?php
/**
 * Magenizr HideShippingMethod
 *
 * @category    Magenizr
 * @package     Magenizr_HideShippingMethod
 * @copyright   Copyright (c) 2018 Magenizr (https://www.magenizr.com)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

namespace Magenizr\HideShippingMethod\Model\Plugin\Shipping\Rate\Result;

use Magento\Quote\Model\Quote\Address\RateRequest;
use Magento\Shipping\Model\Rate\Result;

class Remove
{

    /**
     * @var \Magenizr\HideShippingMethod\Helper\Data|Helper
     */
    private $helper;

    /**
     * @var RateRequest
     */
    private $requestRate;

    /**
     * Remove constructor.
     * @param \Magenizr\HideShippingMethod\Helper\Data $helper
     * @param RateRequest $requestRate
     */
    public function __construct(
        \Magenizr\HideShippingMethod\Helper\Data $helper,
        RateRequest $requestRate
    ) {
        $this->helper = $helper;
        $this->requestRate = $requestRate;
    }

    /**
     * Validate each shipping method before append and apply the rules action if validation was successful.
     *
     * @param \Magento\Shipping\Model\Rate\Result $subject
     * @param \Magento\Quote\Model\Quote\Address\RateResult\AbstractResult|\Magento\Shipping\Model\Rate\Result $result
     * @return array
     */
    public function beforeAppend($subject, $result)
    {
        if (!$result instanceof \Magento\Quote\Model\Quote\Address\RateResult\Method) {
            return [$result];
        }

        if ($this->helper->isAvailable()) {
            $hideMethods = explode(',', $this->helper->getConfig('carriers_hide'));

            $code = $result->getCarrier() . '_' . $result->getMethod();

            if (in_array($code, $hideMethods)) {
                $result->setIsDisabled(true);
            }
        }

        return [$result];
    }
}
