<?php
class OpenTag_TestModule_Model_Observer
{
    const ADMIN_EMAIL = "admin@example.com";

    public function __construct()
    {
    }

    public function eventSendEmail($observer)
    {
        $event = $observer->getEvent();

        $message = $event->getMessageBody();

        $this->sendEmailToAdmin($message);
        exit;
    }

    public function sendEmailToAdmin($message)
    {
        $params = $this->getRequest()->getParams();

        $mail = new Zend_Mail();
        $mail->setBodyText($params['comment']);
        $mail->setFrom($params['email'], $params['name']);
        $mail->addTo(ADMIN_EMAIL, 'Some Recipient');
        $mail->setSubject('Test Inchoo_SimpleContact Module for Magento');
        try {
            $mail->send();
        }
        catch(Exception $ex) {
            Mage::getSingleton('core/session')->addError('Unable to send email. Sample of a custom notification error from OpenTag_TestModule.');
        }
    }
}