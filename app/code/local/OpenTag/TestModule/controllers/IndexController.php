<?php

class OpenTag_TestModule_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();

        // Add new block - rwd/template/testmodule/contact.phtml
        $block = $this->getLayout()->createBlock(
            'Mage_Core_Block_Template',
            'contact',
            array(
                'template' => 'testmodule/contact.phtml'
            )
        );

        $this->getLayout()->getBlock('content')->append($block);

        $this->renderLayout();
    }

    public function saveData()
    {
        echo "Data saved";
    }

}