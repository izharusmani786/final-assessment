<?php

namespace Training\Assignment\Model;

use Training\Assignment\Api\Data\GridInterface;

class Reviews extends \Magento\Framework\Model\AbstractModel implements GridInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'custom_product_review';

    /**
     * @var string
     */
    protected $_cacheTag = 'custom_product_review';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'custom_product_review';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
		$this->_init("Training\Assignment\Model\ResourceModel\Reviews");
    }
    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * Set EntityId.
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * Get userid.
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->getData(self::USER_ID);
    }

    /**
     * Set userid.
     */
    public function setUserId($user_id)
    {
        return $this->setData(self::USER_ID, $user_id);
    }

     /**
     * Get productid.
     *
     * @return int
     */
    public function getProductId()
    {
        return $this->getData(self::PRODUCT_ID);
    }

    /**
     * Set productid.
     */
    public function setProductId($product_id)
    {
        return $this->setData(self::PRODUCT_ID, $product_id);
    }

    /**
     * Get Name.
     *
     * @return varchar
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * Set Name.
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

	/**
     * Get Email.
     *
     * @return varchar
     */
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * Set Email.
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

	/**
     * Get Phone.
     *
     * @return varchar
     */
    public function getPhone()
    {
        return $this->getData(self::PHONE);
    }

    /**
     * Set Phone.
     */
    public function setPhone($phone)
    {
        return $this->setData(self::PHONE, $phone);
    }


    /**
     * Get Rating.
     *
     * @return varchar
     */
    public function getRating()
    {
        return $this->getData(self::RATING);
    }

    /**
     * Set Rating.
     */
    public function setRating($rating)
    {
        return $this->setData(self::RATING, $rating);
    }

    /**
     * Get getContent.
     *
     * @return varchar
     */
    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }

    /**
     * Set Content.
     */
    public function setContent($content)
    {
        return $this->setData(self::CONTENT, $content);
    }

    /**
     * Get Status.
     *
     * @return varchar
     */
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    /**
     * Set Status.
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

	/**
     * Get UpdatedAt.
     *
     * @return varchar
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * Set UpdatedAt.
     */
    public function setUpdatedAt($updateAt)
    {
        return $this->setData(self::UPDATED_AT, $updateAt);
    }

}