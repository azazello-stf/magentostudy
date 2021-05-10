<?php
/**
 * News Item block
 *
 * @author Magento
 */
class Magentostudy_News_Block_item
    extends Mage_Core_Block_Template
{
    /**
     * Current news item instance
     *
     * @var Magentostudy_News_Model_News
     */

    protected $_item;

    /**
     * Return parameters for backurl
     *
     * @param array $additionalParams
     * @return array
     */
    protected function _getbackUrlQueryParams(array $additionalParams = array()){
        return array_merge(array('p' => $this->getPage()), $additionalParams);
    }

    /**
     * return URL to the news list page
     *
     * @return string
     */
    public function getBackUrl()
    {
        return $this->getUrl('*/', array('_query' => $this->_getBackUrlQueryParams()));
    }

    /**
     * Return URL for resized News Item image
     *
     * @param Magentostudy_News_Model_News $item
     * @param integer $width
     * @return string|false
     */
    public function getImageUrl(Magentostudy_News_Model_News $item, int $width){
        return Mage::helper('magentostudy_news/image')->resize($item, $width);
    }
}