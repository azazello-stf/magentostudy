<?php
/**
 * News item resource model
 *
 * @author Bulat
 */

class Magentostudy_News_Model_Resource_News
    extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('magentostudy_news/news', 'news_id');
    }
}

