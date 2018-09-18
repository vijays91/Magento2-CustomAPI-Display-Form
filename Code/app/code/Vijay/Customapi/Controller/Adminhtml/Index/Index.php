<?php
/**
 * @author VIJAYAKUMAR S
 * @copyright Copyright (c) 2018
 * @package Vijay_Customapi
 */
namespace Vijay\Customapi\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;

class Index extends \Magento\Backend\App\Action
{
	protected $messageManager;
	protected $custom_api;
	protected $helper;
    protected $_coreRegistry;
    protected $resultPageFactory;	

	public function __construct(
		Action\Context $context,
		\Magento\Framework\Message\ManagerInterface $messageManager,
		\Vijay\Customapi\Model\Requests\Api $custom_api,
		\Vijay\Customapi\Helper\Data $helper,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry
	) {
		$this->messageManager = $messageManager;
		$this->custom_api = $custom_api;
		$this->helper = $helper;
        $this->_coreRegistry = $registry;
		parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
	}

    public function execute() {
		$custom_api_result = $this->custom_api->getUserInfo();
        $this->_coreRegistry->register('custom_api', $custom_api_result);
        
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Vijay_Customapi::customapi')
            ->addBreadcrumb(__('Vijay'), __('Vijay'))
            ->addBreadcrumb(__('Customapi Pages'), __('Customapi Pages'));
        $resultPage->getConfig()->getTitle()->prepend(__('Custom API Pages'));
        return $resultPage;
    }
}