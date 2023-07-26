<?php 

namespace SimplifiedMagento\AssignmentNine\Controller\Page;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Action;


class Index extends \Magento\Framework\App\Action\Action {

    protected $_insertData;
    protected $resultRedirect;
    protected $productRepository; 
    protected $productCollection;
    protected $pageFactory;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
    ) {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

	public function execute(){

        return $this->pageFactory->create();

	}
}