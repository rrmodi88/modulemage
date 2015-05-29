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
class Frontslash_CustomProduct_Block_Product_Customlistfooter extends Mage_Catalog_Block_Product_List
{
    protected function _getProductCollection()
    {

        if (is_null($this->_productCollection)) {
            
            
            /*$attributeId = Mage::getResourceModel('eav/entity_attribute')->getIdByCode('catalog_product','product_option');
            $attribute = Mage::getModel('catalog/resource_eav_attribute')->load($attributeId);
            $attributeOptions = $attribute ->getSource()->getAllOptions();	
            
            foreach ($attributeOptions as $option)
            {
                if(strtolower($option['label']) == strtolower($this->getCustomproduct())) {
                    $filterId = $option['value'];
                    break;
                } 
            }
            
            $collection = Mage::getResourceModel('catalog/product_collection');
            Mage::getModel('catalog/layer')->prepareProductCollection($collection);
        
           $collection->addAttributeToFilter('product_option', array('finset'=>$filterId))
                    ->addStoreFilter();
            
            $numProducts = Mage::helper('customproduct')->productMaxLimit($this->getBlockLimitId());
            $collection->setPage(1, $numProducts)->load();*/
            $attributeId = Mage::getResourceModel('eav/entity_attribute')->getIdByCode('catalog_product','product_footer_option');
            $attribute = Mage::getModel('catalog/resource_eav_attribute')->load($attributeId);
            $attributeOptions = $attribute ->getSource()->getAllOptions();
            $getAllPossibleArray = $this->getCustomproduct();
            foreach ($getAllPossibleArray as $attrKey => $attrValue) {
                foreach ($attributeOptions as $attropKey => $attropValue) {
                        if(strtolower($attropValue['label']) == strtolower($attrValue)) {
                        $filterId = $attropValue['value'];
                        break;
                        }
                }

                $collection = Mage::getResourceModel('catalog/product_collection');
                Mage::getModel('catalog/layer')->prepareProductCollection($collection);
            
               $collection->addAttributeToFilter('product_footer_option', array('finset'=>$filterId))
                        ->addStoreFilter();
                
                $numProducts = Mage::helper('customproduct')->productFooterMaxLimit($this->getBlockLimitId());
                $collection->setPage(1, $numProducts)->load();

            }
            $this->_productCollection = $collection;
        }        
        return $this->_productCollection;
    }
}
