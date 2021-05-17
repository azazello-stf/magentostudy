<?php
/**
 * News item model
 *
 * @author Bulat
 */
class Magentostudy_News_Model_News extends Mage_Core_Model_Abstract
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 2;

    /**
     * Define resource model
     */
    protected function _construct()
    {
        $this->_init('magentostudy_news/news');
    }

    /**
     * If object is new adds creation date
     *
     * @return Magentostudy_News_Model_News
     */
    protected function _beforeSave()
    {
        parent::_beforeSave();
        if ($this->isObjectNew()) {
            $this->setData('created_at', Varien_Date::now());
        }
        return $this;
    }


    /**
     * Get product status
     *
     * @return int
     */
    public function getStatus()
    {
        if (is_null($this->_getData('status'))) {
            $this->setData('status', self::STATUS_ENABLED);
        }
        return $this->_getData('status');
    }
}