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

// Set up data rows
$dataRows = array(
    array(
        'title'         => 'Test 1',
        'author'        => 'Author 1',
        'published_at'  => '2020-12-22',
        'content'       => 'ipsum lorem ipsum lorem 1',
    ),
    array(
        'title'         => 'Test 2',
        'author'        => 'Author 2',
        'published_at'  => '2019-09-02',
        'content'       =>'Ipsum lorem ipsum lorem 2',
    ),
    array(
        'title'         => 'Test 3',
        'author'        => 'Author 3',
        'published_at'  => '2018-04-12',
        'content'       => 'Ipsum lorem, ipsum lorem 3',
    )
);

foreach($dataRows as $data){
    Mage::getModel('magentostudy_news/news')
        ->setData($data)
        ->save();
}