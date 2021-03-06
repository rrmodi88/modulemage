<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Catalog
 * @copyright   Copyright (c) 2012 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * New products block
 *
 * @category   Mage
 * @package    Mage_Catalog
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Frontslash_CustomProduct_Block_Product_Default_Bestseller extends Mage_Catalog_Block_Product_List
{
    public function __construct()
    {
        
    }
    protected function _getProductCollection()
    {
        parent::__construct();
        $storeId    = Mage::app()->getStore()->getId();
        $products = Mage::getResourceModel('reports/product_collection')
            ->addAttributeToSelect('*');
        $totalDay = Mage::getStoreConfig("customproduct/block2/period");
        $totalDay = isset($totalDay) ? $this->setTimePeriod : 60;
        $currentDate  = Mage::app()->getLocale()->date();        
        
        $startDate = strtotime ( '-'.$totalDay.' day' , strtotime ( $currentDate ) ) ;
        $startDate = date ( 'Y-m-j' , $startDate );
        
        $currentDate = date ( 'Y-m-j' , strtotime($currentDate) );         
    
        
        $products->addFieldToFilter('created_at',array('from'=>$startDate,'to'=>$currentDate))
            ->addOrderedQty()
            ->setStoreId($storeId)
            ->addStoreFilter($storeId)
            ->setOrder('ordered_qty', 'desc');
            
           // $productLimit = Mage::getStoreConfig("customproduct/block2/product_load_max");
           $productLimit = 3;
            if($productLimit != "")
            {
                $products->setPageSize($productLimit);
            }
        
        
        $productFlatData = Mage::getStoreConfig('catalog/frontend/flat_catalog_product');
        if($productFlatData == "1")
        {
             $products->getSelect()
                ->joinLeft(
                    array('cpl' => $products->getResource()->getFlatTableName()),
                        "e.entity_id = cpl.entity_id"
                )
                ->where("cpl.visibility IN (?)", 
                    array(
                        Mage_Catalog_Model_Product_Visibility::VISIBILITY_IN_CATALOG, 
                        Mage_Catalog_Model_Product_Visibility::VISIBILITY_BOTH
                    )
                );
        }
        
    
        Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($products);
        Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($products);
        Mage::getSingleton('cataloginventory/stock')->addInStockFilterToCollection($products);
    
        $this->_productCollection = $products;
    
        return $this->_productCollection;
    }
}
