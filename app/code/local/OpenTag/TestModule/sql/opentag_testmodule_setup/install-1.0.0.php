<?php

$installer = $this;
$connection = $installer->getConnection();

$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('ivision_contact_form'))
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Id')
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
    ), 'Name')
    ->addColumn('second_name', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => true,
    ), 'Second Name')
    ->addColumn('message', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => true,
    ), 'Message');
$installer->getConnection()->createTable($table);

$installer->endSetup();