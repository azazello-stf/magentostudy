<?php
/**
 * News frontend controller
 *
 * @author Bulat
 */

class Magentostudy_News_IndexController
    extends Mage_Core_Controller_Front_Action
{
    public function preDispatch()
    {
        parent::preDispatch();
        if(!Mage::helper('magentostudy_news')->isEnabled()){
          $this->setFlag('', 'no-dispatch', true);
          $this->_redirect('noRoute');
        }
    }

    public function indexAction()
    {
        $this->loadLayout();

        $listBlock = $this->getLayout()->getBlock('news.list');

        if($listBlock){
            $currentPage = abs(intval($this->getRequest()->getParam('p')));
            if($currentPage < 1){
                $currentPage = 1;
            }
            $listBlock->setCurrentPage($currentPage);
        }

        $this->renderLayout();
    }

    public function viewAction()
    {
        $newsId = $this->getRequest()->getParam('id');
        if(!$newsId){
            return $this->_forward('noRoute');
        }

        $model = Mage::getModel('magentostudy_news/news');
        $model->load($newsId);

        if(!$model->getId()){
            return $this->_forward('noRoute');
        }

        Mage::register('news_item', $model);

        Mage::dispatchEvent('before_news_item_display', array('news_item' => $model));

        $this->loadLayout();

        $itemBlock = $this->getLayout()->getBlock('news.item');
        if($itemBlock){
            $listBlock = $this->getLayout()->getBlock('news.list');
            if($listBlock){
                $page = (int) $listBlock->getCurrentPage() ? (int) $listBlock->getCurrentPage() : 1;
            }else{
                $page = 1;
            }
            $itemBlock->setPage($page);
            $this->renderLayout();
        }
    }
}