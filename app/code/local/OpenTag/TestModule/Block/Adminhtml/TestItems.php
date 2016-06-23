<?php
class OpenTag_TestModule_Block_AdminHtml_TestItems
    extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    protected function _construct()
    {
        //parent::_construct();

        $this->_addButtonLabel = Mage::helper('opentag_testmodule')->__('Add new quote');

        $this->_blockGroup = 'opentag_testmodule';      // имя модуля
        $this->_controller = 'adminhtml_testitems';     // путь относительно корня модуля где лежит grid

        $this->_headerText = Mage::helper('opentag_testmodule')->__('Test Items');
    }

    public function getCreateUrl()
    {
        return $this->getUrl('opentag_testmodule_admin/testitems/edit');
    }
}