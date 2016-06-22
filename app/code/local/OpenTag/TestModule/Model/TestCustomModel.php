<?php
class OpenTag_TestModule_Model_TestCustomModel extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('testmodule/testcustommodel');
    }

    protected function _afterSave()
    {
        parent::_afterSave();

        // Sent email
        $this->sendEmailToAdmin();
    }

    const ADMIN_EMAIL = "admin@example.com";
    public function sendEmailToAdmin($message)
    {
        $params = $this->getRequest()->getParams();

        $mail = new Zend_Mail();
        $mail->setBodyText($params['comment']);
        $mail->setFrom($params['email'], $params['name']);
        $mail->addTo(self::ADMIN_EMAIL, 'Some Recipient');
        $mail->setSubject('TestModule for Magento');

        try
        {
            $mail->send();
        }
        catch(Exception $ex) {
            Mage::getSingleton('core/session')->addError('Unable to send email. Sample of a custom notification error from OpenTag_TestModule.');
        }
    }
}