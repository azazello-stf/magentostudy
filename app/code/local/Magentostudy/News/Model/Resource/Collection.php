<?php
/**
 *  News collection
 *
 * @author Bulat
 */
class Magentostudy_News_Model_Resource_News_Collection
    extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct(){
        $this->_init('magentostudy_nwes/news');
    }

    public function prepareForList($page){
        $this->setPageSize(Mage::helper('magentostudy_news')->getNewsPerPage());
        $this->setCurPage($page)->setOrder('published_at', Varien_Data_Collection::SORT_ORDER_DESC);
        return $this;
    }
}