<?php

namespace SimplifiedMagento\AssignmentEleven\Controller\Adminhtml\Member;
use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;

class Page extends Action
{

    protected $resultPageFactory;
    protected $_publicActions = ['index'];
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
     
    public function execute() {        
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend((__('Member Details')));
        $this->_setActiveMenu('SimplifiedMagento_AssignmentEleven::member');
 
        $resultPage->addBreadcrumb(__('affiliate'), __('Member'));
        $resultPage->addBreadcrumb(__('affiliate'), __('Member Details'));
 
        return $resultPage;
    }
 
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('SimplifiedMagento_AssignmentEleven::member');
    }






    // private $pageFatory;

    // public function __construct(
    //     PageFactory $pageFatory,
    //     Action\Context $context
    //     )
    // {
    //     $this->pageFatory = $pageFatory;
    //     parent::__construct($context);
    // }

    // public function execute()
    // {
    //     //echo 'aaaaa';
    //     //exit;
    //     return $this->pageFatory->create();
    // }   
}


