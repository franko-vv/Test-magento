<?php
class OpenTag_TestModule_Block_Adminhtml_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $item = Mage::registry('current_item');
        $form = new Varien_Data_Form();

        $fieldset = $form->addFieldset('edit_testitem', array(
            'legend' => Mage::helper('opentag_testmodule')->__('Item Details')
        ));

        if($item->getId())
        {
            $fieldset->addField('id', 'hidden', array(
                'name' => 'id',
                'required' => true
            ));
        }

        $fieldset->addField('name', 'text', array(
            'name' => 'name',
            'label' => Mage::helper('opentag_testmodule')->__('First Name'),
            'required' => true,
            'class' => 'required-entry validate-length minimum-length-2'
        ));

        $fieldset->addField('second_name', 'text', array(
            'name' => 'second_name',
            'label' => Mage::helper('opentag_testmodule')->__('Second Name'),
            'required' => false
        ));

        $fieldset->addField('message', 'textarea', array(
            'name' => 'message',
            'label' => Mage::helper('opentag_testmodule')->__('Message'),
            'required' => false
        ));

        $form->setMethod('post');
        $form->setUseContainer(true);
        $form->setId('edit_form');
        $form->setAction($this->getUrl('*/*/save'));
        $form->setValues($item->getData());

        $this->setForm($form);
    }
}