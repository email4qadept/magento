<?php

namespace Ipraxa\Company\Model\ResourceModel;


class Report extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * construct
     * @return void
     */
    protected function _construct()
    {
        $this->_init('sales_order', 'order_id');
    }
}
