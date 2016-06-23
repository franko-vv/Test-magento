<?php
class OpenTag_TestModule_Block_AdminHtml_TestItems_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    protected  function  _construct()
    {
        $this->setId('testitemsGrid');
        $this->_controller = 'adminhtml_testitems';
        $this->setUseAjax(true);

        $this->setDefaultSort('id');
        $this->setDefaultDir('desc');
    }

    /**
     * Which collection to use to display in grid
     */
    protected  function  _prepareCollection()
    {
        //TODO:Or getModel()->getCollection();
        $collection = Mage::getResourceModel('opentag_testmodule/testcustommodel_collection');
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * Url for edit item
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

    /**
     * @return Url for AJAX
     */
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current' => true));
    }

    protected function _getHelper()
    {
        return Mage::helper('opentag_testmodule');
    }

    /**
     * Which columns to display in grid
     */
    protected function _prepareColumns()
    {
        /**
         * Add Column method:
         * id - идентификатор колонки
         * header - название колонки в таблице
         * align - позиционирование текста
         * filter_index
         * index
         * type
         * truncate
         * sortable
         * filter
         * width
         * escape
         */
        $this->addColumn('id', array(
            'header' => $this->_getHelper()->__('Id'),
            'type' => 'number',
            'index' => 'id'
        ));

        $this->addColumn('name', array(
           'header' => $this->_getHelper()->__('First Name'),
            'type' => 'text',
            'index' => 'name'
        ));

        $this->addColumn('second_name', array(
            'header' => $this->_getHelper()->__('Second Name'),
            'type' => 'text',
            'index' => 'second_name'
        ));

        $this->addColumn('message', array(
            'header' => $this->_getHelper()->__('Message'),
            'type' => 'text',
            'index' => 'message'
        ));

        $this->addColumn('action', array(
            'header' => $this->_getHelper()->__('Action'),
            'width' => '60px',
            'type' => 'action',
            'actions' => array(
                array(
                    'caption' => $this->_getHelper()->__('Edit'),
                    'url' => array(
                        'base' => '*/*/edit',
                    ),
                    'field' => 'id'
                )
            ),
            'filter' => false,
            'sortable' => false,
            'index' => 'id'
        ));

        return parent::_prepareColumns();
    }
}
