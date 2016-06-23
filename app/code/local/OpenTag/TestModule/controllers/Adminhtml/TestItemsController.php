<?php
class OpenTag_TestModule_AdminHtml_TestItemsController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Testitems'));

        $this->loadLayout();
        $this->_setActiveMenu('opentag_testmodule');
        $this->_addBreadcrumb(Mage::helper('opentag_testmodule')->__('Testitems'),
                              Mage::helper('opentag_testmodule')->__('Testitems'));
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_title($this->__('Add new item'));

        $this->loadLayout();
        $this->_setActiveMenu('opentag_testmodule');
        $this->_addBreadcrumb(Mage::helper('opentag_testmodule')->__('Add new item'),
                              Mage::helper('opentag_testmodule')->__('Add new item'));
        $this->renderLayout();
    }

    public function editAction()
    {
        $this->_title($this->__('Edit item'));

        $this->loadLayout();
        $this->_setActiveMenu('opentag_testmodule');
        $this->_addBreadcrumb(Mage::helper('opentag_testmodule')->__('Edit item'),
                              Mage::helper('opentag_testmodule')->__('Edit item'));
        $this->renderLayout();
    }

    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('opentag_testmodule/adminhtml_testitem')->toHtml()
        );
    }
}