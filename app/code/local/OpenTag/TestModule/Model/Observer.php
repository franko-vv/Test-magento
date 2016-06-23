<?php
class OpenTag_TestModule_Model_Observer
{
    const ADMIN_EMAIL = "admin@example.com";

    public function eventSendEmail($observer)
    {
        $event = $observer->getEvent();
        $data = $event->getFormmessage()->getData();
        $email = $event->getEmail();

        $this->sendEmailToAdmin($data, $email);
    }

    public function sendEmailToAdmin($text, $email)
    {
        $mail = new Zend_Mail();
        $mail->setBodyText($text['message']);
        $mail->setFrom($email, $text['name']);
        $mail->addTo(self::ADMIN_EMAIL, 'Some Recipient');
        $mail->setSubject('TestModule for Magento');

        try
        {
            //$mail->send();
            $emailMessage = 'Message has been sent from ' . $email . ' ' . $text['name'] .
                            ' to ' . self::ADMIN_EMAIL . ' with message body: \n' . $text['message'];
            Mage::log($emailMessage, null, 'email_log.log');
        }
        catch(Exception $ex) {
            Mage::getSingleton('core/session')->addError('Unable to send email. Sample of a custom notification error from OpenTag_TestModule.');
        }
    }
}