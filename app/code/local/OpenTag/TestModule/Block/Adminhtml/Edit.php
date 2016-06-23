<?php
class OpenTag_TestModule_Block_Adminhtml_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'opentag_testmodule';
        $this->_mode = 'edit';
        $this->_controller = 'adminhtml';

        $itemId = (int) $this->getRequest()->getParam($this->_objectId);
        $testItem = Mage::getModel('opentag_testmodule/testcustommodel')->load($itemId);
        Mage::register('current_item', $testItem);
    }

    public function getHeaderText()
    {
        $item = Mage::registry('current_item');
        if($item->getId())
        {
            return Mage::helper('opentag_testmodule')->__("Edit Item", $this->escapeHtml($item->getName()));
        }
        else
        {
            return Mage::helper('opentag_testmodule')->__("Add new item");
        }
    }
}