<?php

class Azazello_DBScript_Model_Resource_Comment extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('azazello_dbscript/comment', 'comment_id');
    }
}