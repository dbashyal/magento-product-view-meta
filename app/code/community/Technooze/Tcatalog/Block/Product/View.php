<?php
/**
 * Technooze_Tcatalog extension
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @category   Technooze
 * @package    Technooze_Tcatalog
 * @copyright  Copyright (c) 2008 Technooze LLC
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Product View block
 *
 * @category Technooze
 * @package  Technooze_Tcatalog
 * @module   Tcatalog
 * @author   Damodar Bashyal (enjoygame @ hotmail.com)
 */
class Technooze_Tcatalog_Block_Product_View extends Mage_Catalog_Block_Product_View
{
    /**
     * Core magento code doesn't replace special chars
     * so, this function prepares the meta description before it's used
     *  Note:: you can remove this override if core team fixes it.
     *
     * @return Technooze_Tcatalog_Block_Product_View
     */
    protected function _prepareLayout()
    {
        $product = $this->getProduct();
        $description = $product->getData('meta_description');
        if(empty($description)){
            // get product short description
            $description = $product->getData('short_description');
            if(empty($description) || strtolower($description) == 'na'){
                // if short description is empty, get long description
                $description = $product->getData('description');
            }
            // let decode if any html entities exists
            // strip all html tags
            // replace new lines with space
            // then tidy it up with removing extra spaces
            $description = trim(preg_replace('/\s+/', ' ', preg_replace('/\r|\n/', ' ', strip_tags(html_entity_decode($description)))));

            // found this option to remove microsoft word's special characters
            // suppressing error "Notice: iconv() [function.iconv]: Detected an illegal character in input string  in..."
            // with @, because i can't find any other solution to fix error
            $description = @iconv(mb_detect_encoding($description, mb_detect_order(), true), "ASCII//IGNORE", $description);

            // now get 255 characters only and set it as meta description
            $product->setData('meta_description', Mage::helper('core/string')->substr($description, 0, 255));
        }

        return parent::_prepareLayout();
    }
}