<?php

namespace Ipraxa\Company\Controller\Adminhtml\Report;


class Index extends \Ipraxa\Company\Controller\Adminhtml\Report
{
    
    public function execute()
    {

        $resultPage = $this->_resultPageFactory->create();
		
		

        return $resultPage;
    }
}
