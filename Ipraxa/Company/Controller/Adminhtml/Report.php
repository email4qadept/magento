<?php

namespace Ipraxa\Company\Controller\Adminhtml;

abstract class Report extends \Ipraxa\Company\Controller\Adminhtml\AbstractAction
{
    const PARAM_CRUD_ID = 'report_id';

    
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Ipraxa_Company::company_report');
    }
}