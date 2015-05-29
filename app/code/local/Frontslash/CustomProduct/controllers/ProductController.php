<?php
class Frontslash_CustomProduct_ProductController extends Mage_Core_Controller_Front_Action
{
	public function indexAction()
	{
		$getId = $_GET['pro'];
		$defaultTabs = array("new","random","rated");
		$filterBy = $getId;
		$activeTab = strtolower($getId);                        
		if(in_array($activeTab,$defaultTabs)) {
		    $activeTab = "_default_".$activeTab;
		}
		else {
		    $activeTab = "_customlist";
		}
		$this->loadLayout();
		if(Mage::getStoreConfig('customproduct/custom/display_tab')) {
			$blockValue = $this->getLayout()->createBlock('customproduct/product'.$activeTab)->setCustomproduct($filterBy)->setBlockLimitId("1c")->setTemplate('catalog/product/customproduct/without-list.phtml')->toHtml();
		} else {
			$blockValue = $this->getLayout()->createBlock('customproduct/product'.$activeTab)->setCustomproduct($filterBy)->setBlockLimitId("1c")->setTemplate('catalog/product/customproduct/list.phtml')->toHtml();
		}
		
		$this->getResponse()->setBody($blockValue);		
        }
}