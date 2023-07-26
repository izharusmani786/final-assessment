<?php
/**
 * Webkul_Grid Status Options Model.
 * @category    Webkul
 * @author      Webkul Software Private Limited
 */
namespace Training\Assignment\Model;

class Users
{
    /**
     * Get Grid row status type labels array.
     * @return array
     */
    public function getUsersArray()
    {
        $users = ['1' => __('Izhar'),'2' => __('Rohit'),'3' => __('Rajeev')];
        return $users;
    }

    /**
     * Get Grid row status labels array with empty value for option element.
     *
     * @return array
     */
    public function getAllUsers()
    {
        $res = $this->getUsers();
        array_unshift($res, ['value' => '', 'label' => '']);
        return $res;
    }

    /**
     * Get Grid row type array for option element.
     * @return array
     */
    public function getUsers()
    {
        $res = [];
        foreach ($this->getUsersArray() as $index => $value) {
            $res[] = ['value' => $index, 'label' => $value];
        }
        return $res;
    }

    /**
     * {@inheritdoc}
     */
    public function toUserArray()
    {
        return $this->getUsers();
    }
}