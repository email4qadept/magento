<?php



namespace Ipraxa\Company\Block\Adminhtml;


class Reports extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor.
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_report';
        $this->_blockGroup = 'Ipraxa_Company';
        $this->_headerText = __('Custom report Listing');
     
        parent::_construct();
    }
}
