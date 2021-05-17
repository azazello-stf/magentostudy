<?php
/**
 * News data installation script
 *
 * @author Bulat
 */

/**
 * @var $installer Mage_Core_Model_Resource_Setup
 */
$installer = $this;

$collection = Mage::getModel('magentostudy_news/news')->getCollection()->getItems();

foreach($collection as $news){
    $news->status = Magentostudy_News_Model_News::STATUS_ENABLED;
    $news->save();
}