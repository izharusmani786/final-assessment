<?php
namespace Training\Assignment\Controller\Page\SaveReview;

/**
 * Interceptor class for @see \Training\Assignment\Controller\Page\SaveReview
 */
class Interceptor extends \Training\Assignment\Controller\Page\SaveReview implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\View\Result\PageFactory $pageFactory, \Training\Assignment\Model\ReviewsFactory $reviewFactory, \Magento\Customer\Model\SessionFactory $sessionFactory, \Magento\Framework\Controller\ResultFactory $resultFactory)
    {
        $this->___init();
        parent::__construct($context, $pageFactory, $reviewFactory, $sessionFactory, $resultFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        return $pluginInfo ? $this->___callPlugins('execute', func_get_args(), $pluginInfo) : parent::execute();
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'dispatch');
        return $pluginInfo ? $this->___callPlugins('dispatch', func_get_args(), $pluginInfo) : parent::dispatch($request);
    }
}
