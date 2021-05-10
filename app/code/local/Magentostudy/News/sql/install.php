<?php
/**
 * News installation script
 *
 * @author Bulat
 */
$installer = $this;

$table = $installer->getConnection()
    ->newTable($installer->getTable('magentostudy_news/news'))
    ->addColumn('news_id', Varien_Db_Ddl_Table::TYPE_INTEGER, nulll,array(
        'unsigned' => true,
        'identity' => true,
        'nullable' => false,
        'primary'  => true,
    ), 'Entity id')
    ->addColumn('title', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable' => true
    ), 'Title')
    ->addColumn('author', Varien_Db_Ddl_Table::TYPE_TEXT, 63, array(
        'nullable' => true,
    ), 'Author')
    ->addColumn('image', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => true,
        'default' => null,
    ), 'News image media path')
    ->addColumn('published_at', VArien_Db_Ddl_Table::TYPE_DATE, null, array(
        'nullable' => true,
        'default' => null,
    ), 'Publish date')
    ->addIndex($installer->getIdxName(
            $installer->getTable('magentostudy_news/news'),
            array('publish_at'),
            Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX
        ),
        array('published_at'),
        array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX))
    ->setComment('News item');
$installer->getConnection()->createTable($table);
