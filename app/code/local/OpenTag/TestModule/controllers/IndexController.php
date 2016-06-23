<?php

class OpenTag_TestModule_IndexController extends Mage_Core_Controller_Front_Action
{
    const MIN_FIRSTNAME_LENGTH = 2;

    public function indexAction()
    {
        $this->loadLayout();

        // Add new block - opentag/default/testmodule/contact.phtml
        //$block = $this->getLayout()->createBlock('testmodule/contact');

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

    public function saveDataAction()
    {
        if ($this->getRequest()->isPost())
        {
            $session = Mage::getSingleton('core/session');
            $email = (string) $this->getRequest()->getPost('email');
            $firstName = (string) $this->getRequest()->getPost('first_name');
            $secondName = (string) $this->getRequest()->getPost('second_name');
            $message = (string) $this->getRequest()->getPost('Message');

            try
            {
                $validEmail = new Zend_Validate_EmailAddress();
                if (!($validEmail->isValid($email)))
                    Mage::throwException($this->__('Please enter a valid email address.'));

                $validName = new Zend_Validate_StringLength();
                $validName->setMin(self::MIN_FIRSTNAME_LENGTH);
                if (!($validName->isValid($firstName)))
                    Mage::throwException($this->__('Name must be a valid email address.'));

                // TODO: Unit Tests
                // Save data to Db
                $testCustomModel = Mage::getModel('opentag_testmodule/testcustommodel');
                $testCustomModel->setData('name', $firstName);
                $testCustomModel->setData('second_name', $secondName);
                $testCustomModel->setData('message', $message);
                $testCustomModel->save();

                Mage::dispatchEvent('custom_model_sendemail', array (
                    'formmessage' => $testCustomModel,
                    'email' => $email
                ));

                //TODO:
                $session->addSuccess($this->__('Thank you. Item has been saved.'));
            }
            catch (Mage_Core_Exception $ex)
            {
                $session->addException($ex, $this->__('There was a problem. Please check your input information'));
            }
        }

        $this->_redirectReferer();
    }

}