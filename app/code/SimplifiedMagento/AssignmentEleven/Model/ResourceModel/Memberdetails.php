<?php
namespace SimplifiedMagento\AssignmentEleven\Model\ResourceModel;
class Memberdetails extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('assignmentfinal_affiliate_member', 'entity_id');
    }
}