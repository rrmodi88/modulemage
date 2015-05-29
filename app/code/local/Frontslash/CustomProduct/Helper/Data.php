<?php 
class Frontslash_CustomProduct_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function productMaxLimit($id)
    {
	$limitConfig = array();
	$limitConfig['1c'] = 'customproduct/custom/product_load_max';
	$limitConfig['2f'] = 'customproduct/block_first/product_load_max';
	
	$default = 20;
	$limit = Mage::getStoreConfig($limitConfig[$id]);
	if($limit == null || $limit == " ") {
	    $limit = $default;
	}
	return $limit;
    }
    public function productFooterMaxLimit($id)
    {
		$limitConfig = array();
		$limitConfig['1c'] = 'customproduct/custom_footer/product_load_max';
		$limitConfig['2f'] = 'customproduct/block_first/product_load_max';
		
		$default = 20;
		
		$limit = Mage::getStoreConfig($limitConfig['1c']);
		if($limit == null || $limit == " ") {
		    $limit = $default;
		}
		return $limit;
    }
}
?>