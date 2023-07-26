<?php
namespace Training\Assignment\Block\Adminhtml\Review\Edit\Form;

/**
 * Interceptor class for @see \Training\Assignment\Block\Adminhtml\Review\Edit\Form
 */
class Interceptor extends \Training\Assignment\Block\Adminhtml\Review\Edit\Form implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\Block\Template\Context $context, \Magento\Framework\Registry $registry, \Magento\Framework\Data\FormFactory $formFactory, \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig, \Training\Assignment\Model\Status $options, \Training\Assignment\Model\Products $products, \Training\Assignment\Model\Users $users, \Training\Assignment\Model\Ratings $ratings, array $data = [])
    {
        $this->___init();
        parent::__construct($context, $registry, $formFactory, $wysiwygConfig, $options, $products, $users, $ratings, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function getForm()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getForm');
        return $pluginInfo ? $this->___callPlugins('getForm', func_get_args(), $pluginInfo) : parent::getForm();
    }
}
