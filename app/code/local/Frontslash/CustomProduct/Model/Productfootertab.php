<?php class Frontslash_CustomProduct_Model_Productfootertab
{
    public function toOptionArray()
    {
        $options = array();        
        // $options[] = array('value'=>'1_Boy', 'label'=>Mage::helper('ThemeConfig')->__('1: Boy'));        
        // $options[] = array('value'=>'2_Girl', 'label'=>Mage::helper('ThemeConfig')->__('2: Girl'));
        // $options[] = array('value'=>'3_Kid', 'label'=>Mage::helper('ThemeConfig')->__('3: Kids'));        
        
        
        $attributeId = Mage::getResourceModel('eav/entity_attribute')->getIdByCode('catalog_product','product_footer_option');
        $attribute = Mage::getModel('catalog/resource_eav_attribute')->load($attributeId);
        $attributeOptions = $attribute ->getSource()->getAllOptions();	
        
        $attributeOptions = array_slice($attributeOptions, 1);
        
        $i = 1;    
        foreach ($attributeOptions as $option)
        {
            $options[] = array('value'=> $i."_".strtolower($option['label']), 'label'=>Mage::helper('ThemeConfig')->__(ucfirst($i.": ".$option['label'])));
            $i++;
        }
        
        return $options;
    }

}?>