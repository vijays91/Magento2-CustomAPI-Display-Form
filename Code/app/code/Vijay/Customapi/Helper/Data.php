<?php 
/**
 * @author VIJAYAKUMAR S
 * @copyright Copyright (c) 2018
 * @package Vijay_Customapi
 */
namespace Vijay\Customapi\Helper; 

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{ 	
 	protected $_scopeConfig;

    const XML_CUSTOM_API_USER_ID     = 'apitask_tab/apitask_setting/api_user_id';

 	public function __construct (
			\Magento\Framework\App\Helper\Context $context,
			\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig 
		) {
		parent::__construct($context);
		$this->_scopeConfig = $scopeConfig;
    }
    
    public function customapi_user_id() {
        return $this->_scopeConfig->getValue(self::XML_CUSTOM_API_USER_ID);
    }
}