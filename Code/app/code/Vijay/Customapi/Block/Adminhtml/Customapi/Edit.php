<?php
/**
 * @author VIJAYAKUMAR S
 * @copyright Copyright (c) 2018
 * @package Vijay_Customapi
 */
namespace Vijay\Customapi\Block\Adminhtml\Customapi;
 
class Edit extends \Magento\Backend\Block\Widget\Form\Container
{

    protected function _construct()
    {
        parent::_construct();

        $this->_blockGroup = 'Vijay_Customapi';
        $this->_controller = 'adminhtml_customapi';
        $this->buttonList->remove('delete');
        $this->buttonList->remove('back');
        $this->buttonList->remove('save');
        $this->buttonList->remove('reset');
    }

    /**
     * @return \Magento\Framework\Phrase
     */
    public function getHeaderText()
    {
        return __('Custom API');
    }
}