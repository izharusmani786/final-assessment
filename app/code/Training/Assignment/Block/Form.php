<?php 

namespace Training\Assignment\Block;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\Registry;
use Magento\Catalog\Model\Product;
use Training\Assignment\Model\ReviewsFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Request\Http;
use Magento\Customer\Model\SessionFactory;


class Form extends \Magento\Framework\View\Element\Template
{
    protected $collection;
    protected $request;
    protected $sessionFactory;

    public function __construct(
        Context $context,
        ReviewsFactory $collection,
        Http $request,
        SessionFactory $sessionFactory,
        array $data = []
    ) {
        $this->collection = $collection;
        $this->request = $request;
        $this->sessionFactory = $sessionFactory;
        parent::__construct($context, $data);
    }

    public function getAction()
    {
        $action = '/index.php/review/page/savereview';
        return $action;
    }

    public function getProductId()
    {
        $product_id = $this->request->getParam('id');
        return $product_id;
    }

    public function getCustomerName()
    {
        $customerSession = $this->sessionFactory->create();
        $customerName = $customerSession->getCustomer()->getName();
        return $customerName;
    }

    public function getCustomerEmail()
    {
        $customerSession = $this->sessionFactory->create();
        $customerEmail = $customerSession->getCustomer()->getEmail();
        return $customerEmail;
    }

}