<?php


namespace Ipraxa\Company\Model\ResourceModel\Report;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'entity_id';

    /**
     * {@inheritdoc}
     */
    protected function _construct()
    {
        $this->_init('Ipraxa\Company\Model\Report', 'Ipraxa\Company\Model\ResourceModel\Report');
    }
}
