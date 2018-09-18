<?php
/**
 * @author VIJAYAKUMAR S
 * @copyright Copyright (c) 2018
 * @package Vijay_Customapi
 */
namespace Vijay\Customapi\Block\Adminhtml\Customapi\Edit;

class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;
 
    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry             $registry
     * @param \Magento\Framework\Data\FormFactory     $formFactory
     * @param array                                   $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        array $data = []
    ) 
    {
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }
 
    /**
     * Prepare form.
     *
     * @return $this
     */
    protected function _prepareForm()
    {

        $form = $this->_formFactory->create();
        $response = $this->_coreRegistry->registry('custom_api');
        $data = ($response) ? $response['data'] : "";

        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Custom API Information')]);
        $id = isset($data['id']) ?  " ". $data['id'] ." " : "-";
        $fieldset->addField(
            'id',
            'label',
            ['name' => 'id', 'label' => __('User Id'), 'title' => __('User Id'), 'value' => $id]
        );

        $first_name = isset($data['first_name']) ?  " ". $data['first_name'] ." " : "-";
        $fieldset->addField(
            'first_name',
            'label',
            ['name' => 'first_name', 'label' => __('First Name'), 'title' => __('First Name'), 'value' => $first_name]
        );

        $last_name = isset($data['last_name']) ?  " ". $data['last_name'] ." " : "-";
        $fieldset->addField(
            'last_name',
            'label',
            ['name' => 'last_name', 'label' => __('Last Name'), 'title' => __('Last Name'), 'value' => $last_name]
        );
 
        $avatar = isset($data['avatar']) ? $data['avatar'] : "-";
        $avatar_img = isset($data['avatar']) ? "<img src='". $data['avatar'] ."' alt='image' />" : "- <style>#avatar_href {display:none;}</style>";
        $afterElementHtml = "<p>". $avatar_img ."</p>"; // <style>.admin__field-control.control {margin-top: 8px;}</style>
        $fieldset->addField(
            'avatar_href',
            'link',
            ['name' => 'avatar_href', 'label' => 'Avatar', 'target' => '_blank', 'title' => __('Avatar'), 'value' => __('Avatar'), 'href' => $avatar, 'before_element_html' => $afterElementHtml]

        );

        $form->setMethod('post');
        $form->setUseContainer(true);
        $form->setId('custom_api_view_form');

        $this->setForm($form);

        return parent::_prepareForm();
    }
}