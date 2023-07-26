<?php
namespace SimplifiedMagento\AssignmentEleven\Ui\Component\Listing\Grid\Column;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;
 
class MemberActions extends Column {
    const FORM_URL_PATH_EDIT = 'AssignmentEleven/Memberdetails/editform';
    const FORM_URL_PATH_DELETE = 'AssignmentEleven/Memberdetails/deleteform';
    protected $urlBuilder;
    private $editUrl;
 
    public function __construct(ContextInterface $context, UiComponentFactory $uiComponentFactory, UrlInterface $urlBuilder, array $components = [], array $data = [], $editUrl = self::FORM_URL_PATH_EDIT) {
        $this->urlBuilder = $urlBuilder;
        $this->editUrl = $editUrl;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }
 
    public function prepareDataSource(array $dataSource) {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $name = $this->getData('name');
 
                if (isset($item['form_id'])) {
                    $item[$name]['edit'] = [
                        'href' => $this->urlBuilder->getUrl($this->editUrl, ['form_id' => $item['form_id']]),
                        'label' => __('Edit')
                    ];
                    $item[$name]['delete'] = [
                        'href' => $this->urlBuilder->getUrl(self::FORM_URL_PATH_DELETE, ['form_id' => $item['form_id']]),
                        'label' => __('Delete'),
                        'confirm' => [
                            'title' => __('Delete "${ $.$data.title }"'),
                            'message' => __('Are you sure you wan\'t to delete a "${ $.$data.name }" record?')
                        ]
                    ];
                }
            }
        }
        return $dataSource;
    }
}