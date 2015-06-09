<?php class Frontslash_ThemeConfig_Model_Headerstyle
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'1', 'label'=>Mage::helper('ThemeConfig')->__('Header Style 1')),
            array('value'=>'2', 'label'=>Mage::helper('ThemeConfig')->__('Header Style 2')),
            array('value'=>'3', 'label'=>Mage::helper('ThemeConfig')->__('Header Style 3')),
            
        );
    }

}?>