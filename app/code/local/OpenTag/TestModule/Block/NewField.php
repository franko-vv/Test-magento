<?php
class OpenTag_TestModule_Block_NewField extends Mage_Core_Block_Template
{
    public function getNewField()
    {
        return 'Test Module';
    }

    public function getNewFieldUrl()
    {
        return $this->getUrl('test_module');
    }
}