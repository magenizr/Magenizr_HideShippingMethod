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

class GetFilteredRates
{

    /**
     * Remove flagged shipping method
     *
     * @param \Magento\Shipping\Model\Rate\Result $subject
     * @param array $result
     * @return array
     */
    public function afterGetAllRates($subject, $result)
    {
        foreach ($result as $key => $rate) {
            if ($rate->getIsDisabled()) {
                unset($result[$key]);
            }
        }

        return $result;
    }
}
