<?php

/**
 * Grid Admin Record Save Controller.
 * @category  Training
 * @package   Training_Assignment
 * @author    Training
 * @copyright Copyright (c) 2010-2017 Webkul Software Private Limited (https://webkul.com)
 * @license   https://store.webkul.com/license.html
 */
namespace Training\Assignment\Controller\Adminhtml\Review;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Webkul\Grid\Model\GridFactory
     */
    var $reviewsFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Webkul\Grid\Model\GridFactory $gridFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Training\Assignment\Model\ReviewsFactory $reviewsFactory
    ) {
        parent::__construct($context);
        $this->reviewsFactory = $reviewsFactory;
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('review/review/addrow');
            return;
        }
        try {
            $rowData = $this->reviewsFactory->create();
            $rowData->setData($data);
            if (isset($data['id'])) {
                $rowData->setEntityId($data['id']);
            }
            $rowData->save();
            $this->messageManager->addSuccess(__('Review data has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('review/review/index');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Training_Assignment::save');
    }
}