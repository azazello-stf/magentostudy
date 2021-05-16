<?php
/**
 * News Admin helper
 *
 * @author Bulat
 */

class Magentostudy_News_Helper_Admin
    extends mage_Core_Helper_Abstract
{
    /**
     * Check permission for passed action
     *
     * @param string $action
     * @return bool
     */
    public function isActionAllowed($action)
    {
        return Mage::getSingleton('Admin/session')->isAllowed('news/manaeg/'. $action);
    }
}