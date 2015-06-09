<?php class Frontslash_ThemeConfig_Model_Footerstyle
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'1', 'label'=>Mage::helper('ThemeConfig')->__('Footer Style 1')),
            array('value'=>'2', 'label'=>Mage::helper('ThemeConfig')->__('Footer Style 2')),
            array('value'=>'3', 'label'=>Mage::helper('ThemeConfig')->__('Footer Style 3')),
           
            
        );
    }

}?>