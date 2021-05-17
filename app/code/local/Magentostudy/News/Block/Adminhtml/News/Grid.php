<?php
/**
 * News List admin grid
 *
 * @author Bulat
 */
class Magentostudy_News_Block_Adminhtml_News_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Init Grid default properties
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('news_list_grid');
        $this->setDefaultSort('created_at');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    /**
     * Prepare collection for Grid
     *
     * @return Magentostudy_News_Block_Adminhtml_Grid
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('magentostudy_news/news')->getResourceCollection();

        $this->setCollection($collection);
        return parent::_prepareCollection();
    }


    /**
     * Add mass action to grid
     *
     * @return $this|Magentostudy_News_Block_Adminhtml_News_Grid
     */
    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('news_action');
        $this->getMassactionBlock()->setFormFieldName('news');

        $this->getMassactionBlock()->addItem('delete', array(
            'label'=> Mage::helper('magentostudy_news')->__('Delete'),
            'url'  => $this->getUrl('*/*/massDelete', array('' => '')),        // public function massDeleteAction() in Mage_Adminhtml_Tax_RateController
            'confirm' => Mage::helper('magentostudy_news')->__('Are you sure?')
        ));

        $this->getMassactionBlock()->addItem('status_enable', array(
            'label' => Mage::helper('magentostudy_news')->__('Enable'),
            'url' => $this->getUrl('*/*/massStatusEnable'),
        ));

        $this->getMassactionBlock()->addItem('status_disable', array(
            'label' => Mage::helper('magentostudy_news')->__('Disable'),
            'url' => $this->getUrl('*/*/massStatusDisable'),
        ));

        return $this;
    }


    /**
     * Prepare Grid columns
     *
     * @return Mage_Adminhtml_Block_Catalog_Search_Grid
     */
    protected function _prepareColumns()
    {
//        $this->addColumn('news_action', array(
//            'width' => '20px',
//            'index' => 'news_action',
//            'type' => 'number',
//            'escape' => true,
//        ));

        $this->addColumn('news_id', array(
            'header'    => Mage::helper('magentostudy_news')->__('ID'),
            'width'     => '50px',
            'index'     => 'news_id',
        ));

        $this->addColumn('title', array(
            'header'    => Mage::helper('magentostudy_news')->__('News Title'),
            'index'     => 'title',
        ));

        $this->addColumn('author', array(
            'header'    => Mage::helper('magentostudy_news')->__('Author'),
            'index'     => 'author',
        ));

        $this->addColumn('published_at', array(
            'header'   => Mage::helper('magentostudy_news')->__('Published On'),
            'sortable' => true,
            'width'    => '170px',
            'index'    => 'published_at',
            'type'     => 'date',
        ));

        $this->addColumn('created_at', array(
            'header'   => Mage::helper('magentostudy_news')->__('Created'),
            'sortable' => true,
            'width'    => '170px',
            'index'    => 'created_at',
            'type'     => 'datetime',
        ));

        $this->addColumn('status', array(
            'header'   => Mage::helper('magentostudy_news')->__('Status'),
            'sortable' => true,
            'width'    => '90px',
            'index'    => 'status',
            'type'     => 'options',
            'options'  => array(
                Magentostudy_News_Model_News::STATUS_ENABLED  => Mage::helper('magentostudy_news')->__('Enabled'),
                Magentostudy_News_Model_News::STATUS_DISABLED => Mage::helper('magentostudy_news')->__('Disabled'),
            ),
            'renderer' => new Magentostudy_News_Block_Adminhtml_News_Renderer_Color(),
//            'frame_callback' => [$this, '_formatCell']   // Problems  \lib\Varien\Object.php on line 653

        ));

        $this->addColumn('action',
            array(
                'header'    => Mage::helper('magentostudy_news')->__('Action'),
                'width'     => '100px',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(array(
                    'caption' => Mage::helper('magentostudy_news')->__('Edit'),
                    'url'     => array('base' => '*/*/edit'),
                    'field'   => 'id'
                )),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'news',
        ));

        return parent::_prepareColumns();
    }

    /**
     * Return row URL for js event handlers
     *
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

    /**
     * Grid url getter
     *
     * @return string current grid url
     */
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current' => true));
    }

    /**
     * Realize colored output
     */
//    protected function _formatCell($value)
//    {
//        $value =  $row->getData($column->getIndex());
//        return '<div style="color:#FFF;font-weight:bold;background:#F55804;border-radius:8px;width:100%">'.$value.'</div>';
//        return 111;
//    }
}