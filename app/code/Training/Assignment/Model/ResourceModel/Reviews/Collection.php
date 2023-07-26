<?php 

namespace Training\Assignment\Model\ResourceModel\Reviews;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{
	
	/**
     * @var string
     */
    protected $_idFieldName = 'id';
    /**
     * Define resource model.
     */
	
	protected function _construct(){
		$this->_init("Training\Assignment\Model\Reviews","Training\Assignment\Model\ResourceModel\Reviews");
	}
}