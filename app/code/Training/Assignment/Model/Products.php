<?php
/**
 * Webkul_Grid Status Options Model.
 * @category    Webkul
 * @author      Webkul Software Private Limited
 */
namespace Training\Assignment\Model;

class Products
{
    /**
     * Get Grid row status type labels array.
     * @return array
     */
    public function getProductsArray()
    {
        $products = ['1' => __('Product One'),'2' => __('Product Two')];
        return $products;
    }

    /**
     * Get Grid row status labels array with empty value for option element.
     *
     * @return array
     */
    public function getAllProducts()
    {
        $res = $this->getProducts();
        array_unshift($res, ['value' => '', 'label' => '']);
        return $res;
    }

    /**
     * Get Grid row type array for option element.
     * @return array
     */
    public function getProducts()
    {
        $res = [];
        foreach ($this->getProductsArray() as $index => $value) {
            $res[] = ['value' => $index, 'label' => $value];
        }
        return $res;
    }

    /**
     * {@inheritdoc}
     */
    public function toProductArray()
    {
        return $this->getProducts();
    }
}