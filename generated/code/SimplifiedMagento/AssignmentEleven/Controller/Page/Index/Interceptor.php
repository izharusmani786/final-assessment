<?php
namespace SimplifiedMagento\AssignmentEleven\Controller\Page\Index;

/**
 * Interceptor class for @see \SimplifiedMagento\AssignmentEleven\Controller\Page\Index
 */
class Interceptor extends \SimplifiedMagento\AssignmentEleven\Controller\Page\Index implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\View\Result\PageFactory $pageFatory, \Magento\Framework\App\Action\Context $context)
    {
        $this->___init();
        parent::__construct($pageFatory, $context);
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
