<?php
class OpenTag_TestModule_Model_Resource_TestCustomModel_Collection
    extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('opentag_testmodule/testcustommodel');
    }
}