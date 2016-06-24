<?php
class OpenTag_TestModule_Block_AdminHtml_TestItems extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    /**
     * Config Grid Container
     */
    protected function _construct()
    {
        $this->_addButtonLabel = Mage::helper('opentag_testmodule')->__('Add new item');

        $this->_blockGroup = 'opentag_testmodule';      // имя модуля
        $this->_controller = 'adminhtml_testitems';     // путь относительно корня модуля где лежит grid

        $this->_headerText = Mage::helper('opentag_testmodule')->__('Admin - CRUD fot Test Items');
    }

    /**
     * @return Set url for button Add new Item
     */
    public function getCreateUrl()
    {
        return $this->getUrl('/testitems/edit');
    }
}