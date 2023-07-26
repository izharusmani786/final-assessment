<?php

namespace SimplifiedMagento\AssignmentNine\Block;

use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\Registry;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Request\Http;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\ProductFactory;

class View extends \Magento\Framework\View\Element\Template
{
    protected $registry;
    protected $request;
    protected $product;
    protected $productFactory;

    public function __construct(
        Context $context,
        Registry $registry,
        Http $request,
        Product $product,
        ProductFactory $productFactory,
        array $data = []
    ) {
        $this->product = $product;
        $this->productFactory = $productFactory;
        $this->registry = $registry;
        $this->request = $request;
        parent::__construct($context, $data);
    }

    public function gethelloData(){
        $str = 'Hello World';
        return $str;
    }

    public function getProductAttributeValue()
    {
        $prodvar = $this->registry->registry('current_product');
        $productId = $prodvar->getId();
        $product = $this->product->load($productId);
        $productattributevalue =$this->product->getResource()->getAttribute('dimension_pro')->getFrontend()->getValue($product);
        return $productattributevalue;
    }

    public function getProductAttributeLabel()
    {
        $prodvar = $this->registry->registry('current_product');
        $productId = $prodvar->getId();
        $product = $this->product->load($productId);
        $productattributelabel =$this->product->getResource()->getAttribute('dimension_pro')->getFrontend()->getLabel();
        return $productattributelabel;
    }

    public function getProductColorValue()
    {
        $prodvar = $this->registry->registry('current_product');
        $productId = $prodvar->getId();
        $product = $this->product->load($productId);
        $productattributevalue =$this->product->getResource()->getAttribute('color_pro')->getFrontend()->getValue($product);
        return $productattributevalue;
    }

    public function getProductColorLabel()
    {
        $prodvar = $this->registry->registry('current_product');
        $productId = $prodvar->getId();
        $product = $this->product->load($productId);
        $productattributelabel =$this->product->getResource()->getAttribute('color_pro')->getFrontend()->getLabel();
        return $productattributelabel;
    }


    public function getProductDatailById()
    {
        $id = $this->request->getParam('id');
        $productId = urldecode($id);
        $product = $this->productFactory->create()->load($productId);
        
        // $productimages = array();
        // $productimages = $product->getMediaGalleryImages();
        // $image = '';
        // foreach($productimages as $productimage)
        // {
        //     $image = $productimage["url"];
        // }

        $string = "Product Name ". $product->getName()."<br> Product ID ". $product->getId()."<br> Product Price ". $product->getPrice()."<br>".$image;
        return $productId;
    }

}