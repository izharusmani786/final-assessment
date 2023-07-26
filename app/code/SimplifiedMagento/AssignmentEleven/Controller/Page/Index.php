<?php

namespace SimplifiedMagento\AssignmentEleven\Controller\Page;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    private $pageFatory;

    public function __construct(
        PageFactory $pageFatory,
        Context $context 
    ){
        $this->pageFatory = $pageFatory;
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->pageFatory->create();
    }   
}