<?php

class OpenTag_TestModule_CatalogController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();

        //Zend_Debug::dump($this->getLayout()->getUpdate()->getHandles());
    }
}