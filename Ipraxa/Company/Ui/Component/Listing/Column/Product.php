<?php
/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Ipraxa\Company\Ui\Component\Listing\Column;

use Magento\Framework\Escaper;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Sales\Model\ResourceModel\Order\Status\CollectionFactory;


/**
 * Class Product
 */
class Product extends Column
{
    /**
     * @var Escaper
     */
    protected $escaper;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param Escaper $escaper
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        Escaper $escaper,
        array $components = [],
        array $data = []
    ) {
        $this->escaper = $escaper;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Product Source
     *
     * @param array $dataSource
     * @return array
     */
	 
	 protected function getOrderList($order_id){
		 $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
    $order = $objectManager->create('Magento\Sales\Model\Order')->loadByIncrementId($order_id);
    $orderItems = $order->getAllItems();
	  return $orderItems;
		 
		 
		 }
	 
	protected function getProductNameByOrderId($order_id)
	{
		$orderItems = $this->getOrderList($order_id);
	//$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
   // $order = $objectManager->create('Magento\Sales\Model\Order')->loadByIncrementId($order_id);
   // $orderItems = $order->getAllItems();
	 foreach ($orderItems as $item) {
		 $product_name[] =  $item->getName();
		 }
	return   $product_name;
		
	}
	
	/****/
	protected function getProductSkuByOrderId($order_id)
	{
	$orderItems = $this->getOrderList($order_id);
	 foreach ($orderItems as $item) {
		 $product_sku[] =  $item->getSku();
	}
	return   $product_sku;
	}
	
		/****/
	protected function getProductManuByOrderId($order_id)
	{  $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$orderItems = $this->getOrderList($order_id);
	 foreach ($orderItems as $item) {
		 $product_id =  $item->getProductId();
		 $product_manufacturer[] =$objectManager->create('Magento\Catalog\Model\Product')->load($product_id )->getAttributeText('manufacturer');

	  }
	  
	  return   $product_manufacturer;
		
		
	}
	
	protected function getProductQtyByOrderId($order_id)
	{
		$orderItems = $this->getOrderList($order_id);
	 foreach ($orderItems as $item) {
		 
		 $product_qty[] =  $item->getQtyOrdered();
	  }
	  return   $product_qty;
		
		
	}
	
	/*************/
	  /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
   public function prepareDataSource(array $dataSource)
    {
		
    
	 
   $fieldName = $this->getData('name');
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
				$order_id = $item['increment_id'];
				$ProductArray = $this->getProductNameByOrderId($order_id);
				$SkuArray = $this->getProductSkuByOrderId($order_id);
				$ManufArray = $this->getProductManuByOrderId($order_id);
				$QtyArray = $this->getProductQtyByOrderId($order_id);
				
				
                $item[$fieldName . '_name'] = implode(",",$ProductArray);
				 $item[$fieldName . '_sku']  = implode(",",$SkuArray);
			 $item[$fieldName . '_manufacturer']  = implode(",",$ManufArray); 
				  $item[$fieldName . '_qty']  = implode(",",$QtyArray);
				//$item[$this->getData('manufacturer')] = 1;
            }
        }
	
	//echo '<pre/>'; print_r($dataSource);
	//exit;
		
        return $dataSource;
    }
}
