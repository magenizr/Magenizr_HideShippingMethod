<?php
/**
 * Magenizr HideShippingMethod
 *
 * @category    Magenizr
 * @package     Magenizr_HideShippingMethod
 * @copyright   Copyright (c) 2018 Magenizr (http://www.magenizr.com)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

namespace Magenizr\HideShippingMethod\Block\Adminhtml\System\Config\Field;

use Magento\Framework\Registry;
use Magento\Backend\Block\Template\Context;

class DatePicker extends \Magento\Config\Block\System\Config\Form\Field
{

    /**
     * @var Registry
     */
    protected $_coreRegistry;

    /**
     * Init Constructor
     *
     * @param Context $context
     * @param Registry $coreRegistry
     * @param array $data
     */
    public function __construct(
        Context  $context,
        Registry $coreRegistry,
        array    $data = []
    ) {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context, $data);
    }

    /**
     * Init Render
     *
     * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return mixed
     */
    public function render(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $element->setDateFormat(\Magento\Framework\Stdlib\DateTime::DATE_INTERNAL_FORMAT);
        $element->setTimeFormat('HH:mm:ss'); //set date and time as per requirment
        $element->setShowsTime(true);

        return parent::render($element);
    }
}
