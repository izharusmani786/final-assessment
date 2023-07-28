<?php 

namespace Training\Assignment\Block;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\Registry;
use Magento\Catalog\Model\Product;
use Training\Assignment\Model\ReviewsFactory;
use Magento\Framework\App\Request\Http;
use Magento\Catalog\Model\ProductFactory;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Customer\Model\SessionFactory;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $collection;
    protected $request;
    protected $_productFactory;
    protected $scopeConfig;
    protected $sessionFactory;

    public function __construct(
        Context $context,
        ReviewsFactory $collection,
        ProductFactory $productFactory,
        ScopeConfigInterface $scopeConfig,
        SessionFactory $sessionFactory,
        Http $request,
        array $data = []
    ) {
        $this->collection = $collection;
        $this->request = $request;
        $this->_productFactory = $productFactory;
        $this->scopeConfig = $scopeConfig;
        $this->sessionFactory = $sessionFactory;
        parent::__construct($context, $data);
    }

    public function getReviewsByProductId()
    {
        $product_id = $this->request->getParam('id');
        $model = $this->collection->create();
        $collection = $model->getCollection();
        $collection->addFieldToFilter('product_id', ['eq' => $product_id]);
        $data = $collection->getData();
        return $data;
    }

    public function getCustomerId()
    {
        $customerSession = $this->sessionFactory->create();
        $customerId = $customerSession->getCustomer()->getId();
        return $customerId;
    }

    public function getProductId()
    {
        $product_id = $this->request->getParam('id');
        return $product_id;
    }

    public function getProductName()
    {
        //$product_custom_title = $this->scopeConfig->getValue('FirstSection/Firstgroup/FirstField');
        //$title_status = $this->scopeConfig->getValue('FirstSection/Firstgroup/SecondField');

        $product_id = $this->request->getParam('id');
        $product = $this->_productFactory->create()->load($product_id);
        $name = $product->getName();

        // if($title_status == 1){
        //     $name = $product_custom_title;
        // } else {
        //     $name = $product_name;
        // }

        return $name;
    }

    public function getProductTitle()
    {
        $product_custom_title = $this->scopeConfig->getValue('FirstSection/Firstgroup/FirstField');
        $title_status = $this->scopeConfig->getValue('FirstSection/Firstgroup/SecondField');

        $product_id = $this->request->getParam('id');
        $product = $this->_productFactory->create()->load($product_id);
        $product_name = $product->getName();

        if($title_status == 1){
            $name = $product_custom_title;
        } else {
            $name = $product_name;
        }

        return $name;
    }

}