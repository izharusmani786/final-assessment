<?php

namespace SimplifiedMagento\AssignmentEleven\Block;

use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Catalog\Model\Product;

class View extends \Magento\Framework\View\Element\Template
{
    protected $scopeConfig;
    public function __construct(
        Context $context,
        ScopeConfigInterface $scopeConfig,
        Product $product,  array $data = []
    ) {
        $this->product = $product;
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    public function getHelloData(){
        $str = 'Hello World';
        return $str;
    }

    public function getSystemConfigValue()
    {
        $first_field = $this->scopeConfig->getValue('First/Firstgroup/FirstField');
        $second_field = $this->scopeConfig->getValue('First/Firstgroup/SecondField');
        $third_field = $this->scopeConfig->getValue('First/Firstgroup/FourthField');
        $fourth_field = $this->scopeConfig->getValue('First/Firstgroup/FifthField');
        
        $str = "<b>First Field:</b> ".$first_field." <br><b>Second Field:</b> ".$second_field." <br><b>Third Field:</b> ".$third_field." <br><b>Fourth Field:</b> ".$fourth_field;

        return $str;
    }

}