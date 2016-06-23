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
        /*
        $itemBlock = $this->getLayout()->createBlock('opentag_testmodule_adminhtml/testitems');
        $this->loadLayout()->_addContent($itemBlock)->renderLayout();
        */
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
            $this->getLayout()->createBlock('opentag_testmodule/adminhtml_testitems_grid')->toHtml()
        );
    }
/*
    public function editAction()
    {
        $brand = Mage::getModel('opentag_testmodule/testcustommodel');
        if ($brandId = $this->getRequest()->getParam('id', false))
        {
            $brand->load($brandId);

            if ($brand->getId()->_getSession()->addError($this->__('This brand no longer exists.')))
                return $this->_redirect('opentag_testmodule_admin/testitems/index');
        }
    }
/*
    protected function _isAllowed()
    {
        $actionName = $this->getRequest()->getActionName();
        switch ($actionName) {
            case 'index':
            case 'edit':
            case 'delete':
                // intentionally no break
            default:
                $adminSession = Mage::getSingleton('admin/session');
                $isAllowed = $adminSession
                    ->isAllowed('opentag_testmodule/testcustommodel');
                break;
        }

        return $isAllowed;
    }
*/
}