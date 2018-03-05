<?php
namespace Ipraxa\Company\Model;


class Report extends \Magento\Framework\Model\AbstractModel
{
   
    protected $_reportCollectionFactory;

   
    protected $_storeViewId = null;

    
    protected $_reportFactory;

   
    protected $_formFieldHtmlIdPrefix = 'page_';

    
    protected $_storeManager;

   
    protected $_monolog;

    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Ipraxa\Company\Model\ResourceModel\Report $resource,
        \Ipraxa\Company\Model\ResourceModel\Report\Collection $resourceCollection,
        \Ipraxa\Company\Model\ReportFactory $reportFactory,
        
        \Ipraxa\Company\Model\ResourceModel\Report\CollectionFactory $reportCollectionFactory,
    
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Logger\Monolog $monolog
    ) {
        parent::__construct(
            $context,
            $registry,
            $resource,
            $resourceCollection
        );
		
        $this->_reportFactory = $reportFactory;
       
      
        $this->_storeManager = $storeManager;
        $this->_reportCollectionFactory = $reportCollectionFactory;

        $this->_monolog = $monolog;

        if ($storeViewId = $this->_storeManager->getStore()->getId()) {
			
            $this->_storeViewId = $storeViewId;
        }
    }

   

    
}
