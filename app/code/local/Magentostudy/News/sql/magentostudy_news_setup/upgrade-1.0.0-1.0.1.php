<?php
/*
 * Version 1.0.1
 *
 * Added news status
 *
 */

$installer = $this;

$installer->startSetup();

$installer->getConnection()
    ->addColumn($installer->getTable('magentostudy_news/news'), 'status', array(
        'type' => Varien_Db_Ddl_Table::TYPE_INTEGER,
        'nullable' => false,
        'default' => Magentostudy_News_Model_News::STATUS_ENABLED,
        'comment' => 'News status',
    ));

$installer->endSetup();