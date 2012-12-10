<?php
/**
* @category   Mage
* @package    Mage_Catalog
* @author     Damodar Bashyal
*/
class Technooze_Tcatalog_Block_Helper_Product_Compare extends Mage_Catalog_Helper_Product_Compare
{
    // enable or disable products comparison
    private $_enable = false;

    public function __construct(){
        $this->_enable = Mage::getStoreConfig('catalog/recently_products/compared_count');
    }

    /**
     * Retrieve url for adding product to compare list
     *
     * @param   Mage_Catalog_Model_Product $product
     * @return  boolean|string
     */
    public function getAddUrl($product)
    {
        // To disable product comparison:
        // Go to System > Configuration > Catalog: Catalog > Recently Viewed/Compared Products
        // Set 'Default Recently Compared Products' count to 0
        if($this->_enable) {
            return parent::getAddUrl($product);
        }
        return $this->_enable;
    }
}