<?php 
/**
 * @package modules
 * @since       February 2015
 * @author      Linelab http://www.linelabox.com
 * @copyright   Copyright (C) 2015 Linelab. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * jQuery plugin OwlCarousel2 https://github.com/smashingboxes/OwlCarousel2
 * Based on mod_virtuemart_product (c) VirtueMart  http://www.virtuemart.net
 * VirtueMart is Free Software.
 * VirtueMart comes with absolute no warranty. 
 *
 */
defined ('_JEXEC') or die('Restricted access');
vmJsApi::jPrice();
?>
   <div class="<?php echo $params->get ('moduleclass_sfx') ?>owl-carousel">
			<?php foreach ($products as $product) { ?>
			<div class="vmproduct xschover item">
				<?php
				if (!empty($product->images[0])) {
					$image = $product->images[0]->displayMediaThumb ('class="linelabimage" border="0"', FALSE);
				} else {
					$image = '';
				} ?>       
				<div class="virtimage"><?php echo $product->images[0]->displayMediaThumb('class="linelabimage" border="0"', FALSE); ?> </div>
				 <div class="vmname">
				<div class="pname"><?php echo JHTML::link(JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id='.$product->virtuemart_product_id.'&virtuemart_category_id='.$product->virtuemart_category_id), $product->product_name, array('title' => $product->product_name, 'class'=>'dboxname')); ?>
			   </div>
				  <?php 
				if ($show_price and  isset($product->prices)) {
					echo '<br />'.$currency->createPriceDiv ('salesPrice', '', $product->prices, FALSE, FALSE, 1.0, TRUE);
					if ($product->prices['salesPriceWithDiscount'] > 0) {
						echo $currency->createPriceDiv ('salesPriceWithDiscount', '', $product->prices, FALSE, FALSE, 1.0, TRUE);
					}
				//	echo '</div>';
				}  ?>
					</div>
			  <div class="vmcartarea">
			  <div class="vmcartbox">
				  <?php if (!empty($product->product_s_desc)) { ?>
						<div class="vmshort_desc">
							<?php // echo shopFunctionsF::limitStringByWord ($product->product_s_desc, 60, '...') ?>
						</div>
						<?php } ?>
<?php if ($show_addtocart) {echo shopFunctionsF::renderVmSubLayout('addtocart',array('product'=>$product));} ?>
 </div>
</div>
</div>   
	   	<?php } ?>
 </div>