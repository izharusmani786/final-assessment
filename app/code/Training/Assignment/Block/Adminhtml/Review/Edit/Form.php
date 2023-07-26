<?php
/**
 * Training_Assignment Add New Row Form Admin Block.
 * @category    Training
 * @package     Training_Assignment
 * @author      Training Software Private Limited
 *
 */
namespace Training\Assignment\Block\Adminhtml\Review\Edit;


/**
 * Adminhtml Add New Row Form.
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry             $registry
     * @param \Magento\Framework\Data\FormFactory     $formFactory
     * @param array                                   $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        \Training\Assignment\Model\Status $options,
        \Training\Assignment\Model\Products $products,
        \Training\Assignment\Model\Users $users,
        \Training\Assignment\Model\Ratings $ratings,
        array $data = []
    ) 
    {
        $this->_options = $options;
        $this->_products = $products;
        $this->_users = $users;
        $this->_ratings = $ratings;
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form.
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        $dateFormat = $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT);
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create(
            ['data' => [
                            'id' => 'edit_form', 
                            'enctype' => 'multipart/form-data', 
                            'action' => $this->getData('action'), 
                            'method' => 'post'
                        ]
            ]
        );

        $form->setHtmlIdPrefix('wkgrid_');
        if ($model->getEntityId()) {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Edit Review'), 'class' => 'fieldset-wide']
            );
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        } else {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Add Review'), 'class' => 'fieldset-wide']
            );
        }

        $fieldset->addField(
            'name',
            'text',
            [
                'name' => 'name',
                'label' => __('Name'),
                'id' => 'name',
                'title' => __('Name'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $wysiwygConfig = $this->_wysiwygConfig->getConfig(['tab_id' => $this->getTabId()]);

        $fieldset->addField(
            'email',
            'text',
            [
                'name' => 'email',
                'label' => __('Email'),
                'id' => 'email',
                'class' => 'required-entry',
                'required' => true
            ]
        );

        $fieldset->addField(
            'phone',
            'text',
            [
                'name' => 'phone',
                'label' => __('Phone'),
                'id' => 'phone',
                'class' => 'required-entry',
                'required' => true
            ]
        );

        $fieldset->addField(
            'product_rating',
            'select',
            [
                'name' => 'product_rating',
                'label' => __('Rating'),
                'id' => 'product_rating',
                'class' => 'required-entry',
                'values' => $this->_ratings->getRatingsArray(),
                'required' => true
            ]
        );
        
        $fieldset->addField(
            'product_description',
            'editor',
            [
                'name' => 'product_description',
                'label' => __('Review'),
                'style' => 'height:36em;',
                'required' => true,
                'config' => $wysiwygConfig
            ]
        );

        $fieldset->addField(
            'user_id',
            'select',
            [
                'name' => 'user_id',
                'label' => __('User Id'),
                'id' => 'user_id',
                'title' => __('User Id'),
                'values' => $this->_users->getUsersArray(),
                'class' => 'user_id',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'product_id',
            'select',
            [
                'name' => 'product_id',
                'label' => __('Product'),
                'id' => 'product_id',
                'title' => __('Product'),
                'values' => $this->_products->getProductsArray(),
                'class' => 'product_id',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'created_at',
            'date',
            [
                'name' => 'created_at',
                'label' => __('Created At'),
                'date_format' => $dateFormat,
                'time_format' => 'HH:mm:ss',
                'class' => 'validate-date validate-date-range date-range-custom_theme-from',
                'class' => 'required-entry',
                'style' => 'width:200px',
            ]
        );
        $fieldset->addField(
            'status',
            'select',
            [
                'name' => 'status',
                'label' => __('Status'),
                'id' => 'status',
                'title' => __('Status'),
                'values' => $this->_options->getOptionArray(),
                'class' => 'status',
                'required' => true,
            ]
        );
        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}