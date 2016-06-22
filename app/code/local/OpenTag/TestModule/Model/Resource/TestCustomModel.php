<?php
class OpenTag_TestModule_Model_Resource_TestCustomModel extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('testmodule/testcustommodel', 'id');
    }
}