<?php
namespace SimplifiedMagento\AssignmentEleven\Model\ResourceModel\Memberdetails;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'entity_id';
    protected function _construct()
    {
        $this->_init('SimplifiedMagento\AssignmentEleven\Model\Memberdetails', 'SimplifiedMagento\AssignmentEleven\Model\ResourceModel\Memberdetails');
    }
}