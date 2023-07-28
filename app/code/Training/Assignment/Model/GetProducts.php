<?php
namespace Training\Assignment\Model;
use Training\Assignment\Api\GetProductsInterface;
use Training\Assignment\Model\ReviewsFactory;
use Magento\Framework\Webapi\Rest\Request;
use Magento\Framework\App\Action\Context;

class GetProducts implements GetProductsInterface
{

    protected $writeReview;
    protected $request;

    public function __construct(
        ReviewsFactory $writeReview,
        Request $request
        )
    {
        $this->writeReview = $writeReview;
        $this->request = $request;
    }

    public function getData()
    {  
        $getProductId = $this->request->getParam('id'); 
        $model = $this->writeReview->create();
        $collection = $model->getCollection();
        if(!empty($getProductId))
        {
        $collection->addFieldToFilter("product_id", ["in" => $getProductId]);
        }
        $data = $collection->getData();
        if(!empty($data))
        {
            $response['data'] = $data;
            $response['msg'] = 'Data Successfully Fetched';
        }
        else
        {
            $response['msg'] = 'Record Not Found';
        }
        return $response;

    }

   

}