<?php 

namespace Training\Assignment\Controller\Page;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Training\Assignment\Model\ReviewsFactory;
use Magento\Customer\Model\SessionFactory;
use Magento\Framework\Controller\ResultFactory;

class SaveReview extends Action 
{
    protected $pageFactory;
    protected $reviewFactory;
    protected $sessionFactory;
    protected $resultFactory;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        ReviewsFactory $reviewFactory,
        SessionFactory $sessionFactory,
        ResultFactory $resultFactory,
    ) {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->reviewFactory = $reviewFactory;
        $this->sessionFactory = $sessionFactory;
        $this->resultFactory = $resultFactory;
    }

	public function execute()
    {
        $customerSession = $this->sessionFactory->create();
        $customerId = $customerSession->getCustomer()->getId();

        $post_data = $this->getRequest()->getParams();
        $data = array(
            'name' => $post_data['name'],
            'email' => $post_data['email'],
            'phone' => $post_data['phone'],
            'product_rating' => $post_data['rating'],
            'product_description' => $post_data['review'],
            'user_id' => $customerId,
            'product_id' => $post_data['product_id'],
            'status' => 1
        );
        
        $model = $this->reviewFactory->create();
        $model->addData($data);
        $saveData = $model->save();

        $redirect = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
        $redirect->setUrl('/reviews/page/index/id/'.$post_data['product_id']);

        return $redirect;

	}
}