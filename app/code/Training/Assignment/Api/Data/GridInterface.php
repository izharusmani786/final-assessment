<?php
/**
 * Training_Assignment Grid Interface.
 *
 * @category    Training
 *
 * @author      Training Software Private Limited
 */
namespace Training\Assignment\Api\Data;

interface GridInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ENTITY_ID = 'id';
    const USER_ID = "user_id";
    const PRODUCT_ID = "product_id";
    const NAME = 'name';
    const EMAIL = 'email';
    const PHONE = 'phone';
    const RATING = 'product_rating';
    const CONTENT = 'product_description';
    const STATUS = 'status';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId();

    /**
     * Set EntityId.
     */
    public function setEntityId($entityId);

    /**
     * Get userid.
     *
     * @return int
     */
    public function getUserId();

    /**
     * Set userid.
     */
    public function setUserId($user_id);

    /**
     * Get productid.
     *
     * @return int
     */
    public function getProductId();

    /**
     * Set productid.
     */
    public function setProductId($product_id);

    /**
     * Get Name.
     *
     * @return varchar
     */
    public function getName();

    /**
     * Set Name.
     */
    public function setName($name);

    /**
     * Get Email.
     *
     * @return varchar
     */
    public function getEmail();

    /**
     * Set Email.
     */
    public function setEmail($email);

    /**
     * Get Phone.
     *
     * @return varchar
     */
    public function getPhone();

    /**
     * Set Phone.
     */
    public function setPhone($phone);

    /**
     * Get Rating.
     *
     * @return varchar
     */
    public function getRating();

    /**
     * Set Rating.
     */
    public function setRating($rating);

    /**
     * Get Content.
     *
     * @return varchar
     */
    public function getContent();

    /**
     * Set Content.
     */
    public function setContent($content);

    /**
     * Get status.
     *
     * @return varchar
     */
    public function getStatus();

    /**
     * Set status.
     */
    public function setStatus($status);

    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt();

    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt);

    /**
     * Get Updated At.
     *
     * @return varchar
     */
    public function getUpdatedAt();

    /**
     * Set UpdateTime.
     */
    public function setUpdatedAt($updatedAt);

}