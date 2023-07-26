<?php
/**
 * Webkul_Grid Status Options Model.
 * @category    Webkul
 * @author      Webkul Software Private Limited
 */
namespace Training\Assignment\Model;

class Ratings
{
    /**
     * Get Grid row status type labels array.
     * @return array
     */
    public function getRatingsArray()
    {
        $ratings = ['1' => __('One'),'2' => __('Two'),'3' => __('Three'),'4' => __('Four'),'5' => __('Five')];
        return $ratings;
    }

    /**
     * Get Grid row status labels array with empty value for option element.
     *
     * @return array
     */
    public function getAllRatings()
    {
        $res = $this->getRatings();
        array_unshift($res, ['value' => '', 'label' => '']);
        return $res;
    }

    /**
     * Get Grid row type array for option element.
     * @return array
     */
    public function getRatings()
    {
        $res = [];
        foreach ($this->getRatingsArray() as $index => $value) {
            $res[] = ['value' => $index, 'label' => $value];
        }
        return $res;
    }

    /**
     * {@inheritdoc}
     */
    public function toRatingArray()
    {
        return $this->getRatings();
    }
}