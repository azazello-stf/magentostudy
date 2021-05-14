<?php

$installer = $this;

$installer->startSetup();

$installer->getConnection()
    ->addColumn($installer->getTable('azazello_dbscript/ticket'), 'created_at', array(
       'type' => Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
        'nullable' => false,
        'default'  => Varien_Db_Ddl_Table::TIMESTAMP_INIT,
        'comment'  => 'Created At',
    ));

$installer->endSetup();