<?php
/**
 * Magenizr HideShippingMethod
 *
 * @category    Magenizr
 * @package     Magenizr_HideShippingMethod
 * @copyright   Copyright (c) 2018 Magenizr (https://www.magenizr.com)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

namespace Magenizr\HideShippingMethod\Model\Adminhtml\Shipping\Config\Source;

class Allmethods implements \Magento\Framework\Option\ArrayInterface
{

    /**
     * @var \Magenizr\HideShippingMethod\Helper\Data
     */
    private $helper;

    /**
     * Init Constructor
     *
     * @param \Magenizr\HideShippingMethod\Helper\Data $helper
     */
    public function __construct(
        \Magenizr\HideShippingMethod\Helper\Data $helper
    ) {
        $this->helper = $helper;
    }

    /**
     * Return array of options
     *
     * @return array
     */
    public function toOptionArray()
    {
        return $this->helper->getActiveCarriers();
    }
}
