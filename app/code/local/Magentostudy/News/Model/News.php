<?php
/**
 * News item model
 *
 * @author Bulat
 */

class Magentostudy_News_Model_News extends Mage_Core_Model_Abstract{
    protected function _construct()
    {
        $this->_init('magentostudy_news/news');
    }

    protected function _beforeSave()
    {
        parent::_beforeSave();
        if($this->isObjectNew()){
            $this->setData('create_at', Varien_Date::now());
        }
        return $this;
    }
}