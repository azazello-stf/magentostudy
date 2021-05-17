<?php


class Magentostudy_News_Block_Adminhtml_News_Renderer_Color extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $value = $row->getData($this->getColumn()->getIndex());
        switch($value){
            case Magentostudy_News_Model_News::STATUS_ENABLED:
                $color = "green";
                $name = Mage::helper("magentostudy_news")->__('Enabled');
                break;
            case Magentostudy_News_Model_News::STATUS_DISABLED:
                $color = "red";
                $name = Mage::helper("magentostudy_news")->__('Disabled');
                break;
        }
        return '<span style="color: '. $color . ';">' . $name . '</span>';
    }

}