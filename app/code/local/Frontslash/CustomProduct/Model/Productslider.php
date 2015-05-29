<?php class Frontslash_CustomProduct_Model_Productslider
{
    public function toOptionArray()
    {
        $options = array();        
        $options[] = array('value'=>'1_new', 'label'=>Mage::helper('ThemeConfig')->__('1: New'));        
        $options[] = array('value'=>'2_random', 'label'=>Mage::helper('ThemeConfig')->__('2: Random'));
        $options[] = array('value'=>'3_rated', 'label'=>Mage::helper('ThemeConfig')->__('3: Rated'));        
        
        
        $attributeId = Mage::getResourceModel('eav/entity_attribute')->getIdByCode('catalog_product','product_option');
        $attribute = Mage::getModel('catalog/resource_eav_attribute')->load($attributeId);
        $attributeOptions = $attribute ->getSource()->getAllOptions();	
        
        $attributeOptions = array_slice($attributeOptions, 1);
        
        $i = 4;    
        foreach ($attributeOptions as $option)
        {
            $options[] = array('value'=> $i."_".strtolower($option['label']), 'label'=>Mage::helper('ThemeConfig')->__(ucfirst($i.": ".$option['label'])));
            $i++;
        }
        
        return $options;
    }

}?>