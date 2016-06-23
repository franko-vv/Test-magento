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

    public function saveAction()
    {
        $data=$this->getRequest()->getPost();
        if (!empty($data))
        {
            try
            {
                Mage::getModel('opentag_testmodule/testcustommodel')->setData($data)->save();
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('opentag_testmodule')->__('Item saved.')
                );
            }
            catch (Exception $ex)
            {
                Mage::logException($ex);
            }
        }
        return $this->_redirect('*/*/');
    }

    public function deleteAction()
    {
        $itemId=$this->getRequest()->getParam('id', false);

        try
        {
            Mage::getModel('opentag_testmodule/testcustommodel')->setId($itemId)->delete();
            Mage::getSingleton('adminhtml/session')->addSuccess(
                Mage::helper('opentag_testmodule')->__('Item deleted.')
            );

            return $this->_redirect('*/*/');
        }
        catch (Exception $ex)
        {
            Mage::logException($ex);
            Mage::getSingleton('adminhtml/session')->addError(
                Mage::helper('opentag_testmodule')->__("Can't deleted item.")
            );
        }

        return $this->_redirectReferer();
    }
}