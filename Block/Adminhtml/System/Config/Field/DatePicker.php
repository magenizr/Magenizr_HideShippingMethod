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

class DatePicker extends \Magento\Config\Block\System\Config\Form\Field
{

    const TEMPLATE_DATEPICKER = 'system/config/field/datepicker.phtml';

    /**
     * @Override Title
     */
    // @codingStandardsIgnoreStart
    protected function _prepareLayout()
    {
        $this->setTemplate(static::TEMPLATE_DATEPICKER);

        return parent::_prepareLayout();
    }
    // @codingStandardsIgnoreEnd

    /**
     * Return element html
     *
     * @param  \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return string
     */
    public function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $this->addData([
                'html_id' => $element->getHtmlId()
            ]);

        return $element->getElementHtml() . $this->toHtml();
    }
}
