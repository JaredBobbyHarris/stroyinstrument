<?php
/**
 * sublayout products
 *
 * @package	VirtueMart
 * @author Max Milbers
 * @link http://www.virtuemart.net
 * @copyright Copyright (c) 2014 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL2, see LICENSE.php
 * @version $Id: cart.php 7682 2014-02-26 17:07:20Z Milbo $
 */

defined('_JEXEC') or die('Restricted access');
$products_per_row = $viewData['products_per_row'];
switch ($products_per_row) {
	case 1: $products_per_row_swap=9; break; 
	case 2: $products_per_row_swap=6; break; 
	case 3: $products_per_row_swap=4; break; 
	case 4: $products_per_row_swap=3; break; 
//	case 5: $products_per_row_swap=0; break; 
	case 6: $products_per_row_swap=2; break; 
//	case 7: $products_per_row_swap=0; break; 
//	case 8: $products_per_row_swap=0; break; 
	case 9: $products_per_row_swap=1; break;
} 
$currency = $viewData['currency'];
$showRating = $viewData['showRating'];
$verticalseparator = " vertical-separator";
echo shopFunctionsF::renderVmSubLayout('askrecomjs');

$ItemidStr = '';
$Itemid = shopFunctionsF::getLastVisitedItemId();
if(!empty($Itemid)){
	$ItemidStr = '&Itemid='.$Itemid;
}

foreach ($viewData['products'] as $type => $products ) {

	$rowsHeight = shopFunctionsF::calculateProductRowsHeights($products,$currency,$products_per_row);

	if(!empty($type) and count($products)>0){
		$productTitle = vmText::_('COM_VIRTUEMART_'.strtoupper($type).'_PRODUCT'); ?> 
<div class="<?php echo $type ?>-view"> 
  <h4><?php echo $productTitle ?></h4>
		<?php // Start the Output
    }

	// Calculating Products Per Row
	$cellwidth = ' width'.floor ( 100 / $products_per_row );

	$BrowseTotalProducts = count($products);

	$col = 1;
	$nb = 1;
	$row = 1;

	foreach ( $products as $product ) {

		// Show the horizontal seperator
		if ($col == 1 && $nb > $products_per_row) { ?>
	<div class="horizontal-separator"></div>
		<?php }

		// this is an indicator wether a row needs to be opened or not
		if ($col == 1) { ?>
	<div class="vmproducts row">
		<?php }

		// Show the vertical seperator
		if ($nb == $products_per_row or $nb % $products_per_row == 0) {
			$show_vertical_separator = ' ';
		} else {
			$show_vertical_separator = $verticalseparator;
		}

    // Show Products ?>
    
	<div class="col-sm-6 <?php echo ' col-md-' . $products_per_row_swap . $show_vertical_separator ?>">
		<div class="vmproduct schover clearfix">
			<div class="virtimage">
               <a title="<?php echo $product->product_name ?>" href="<?php echo $product->link.$ItemidStr; ?>">
						<?php
						echo $product->images[0]->displayMediaThumb('class="linelabimage"', false);
						?>
					</a>

			</div> 
		<!--	 <span class="label"></span> -->
		<div class="vmname">
		<div class="pname"><?php echo JHtml::link ($product->link.$ItemidStr, $product->product_name); ?></div>
			<div class="vm-product-rating-container">			
				<?php echo shopFunctionsF::renderVmSubLayout('rating',array('showRating'=>$showRating, 'product'=>$product));
				if ( VmConfig::get ('display_stock', 1)) { ?>
					<span class="vmicon vm2-<?php echo $product->stock->stock_level ?>" title="<?php echo $product->stock->stock_tip ?>"></span>
				<?php }
				echo shopFunctionsF::renderVmSubLayout('stockhandle',array('product'=>$product));
				?>
			</div>


				<div class="vm-products-<?php echo $rowsHeight[$row]['product_s_desc'] ?>">
					<?php if(!empty($rowsHeight[$row]['product_s_desc'])){
					?>
					<p class="vmdesc">
						<?php // Product Short Description
						if (!empty($product->product_s_desc)) {
							echo shopFunctionsF::limitStringByWord ($product->product_s_desc, 60, ' ...') ?>
						<?php } ?>
					</p>
			<?php  } ?>
				</div>


			<?php //echo $rowsHeight[$row]['price'] ?>
			<div class="pricevm"><div class="vm3pr-<?php echo $rowsHeight[$row]['price'] ?>"> <?php
				echo shopFunctionsF::renderVmSubLayout('prices',array('product'=>$product,'currency'=>$currency)); ?>
			</div>
		</div>
			<?php //echo $rowsHeight[$row]['customs'] ?>

			 </div>
			  <div class="vmcartarea">
  <?php	echo shopFunctionsF::renderVmSubLayout('addtocart',array('product'=>$product,'rowHeights'=>$rowsHeight[$row])); ?>		
			</div> 
		</div>
	</div>

	<?php
    $nb ++;

      // Do we need to close the current row now?
      if ($col == $products_per_row || $nb>$BrowseTotalProducts) { ?>
    <div class="clear"></div>
  </div>
      <?php
      	$col = 1;
		$row++;
    } else {
      $col ++;
    }
  }

      if(!empty($type)and count($products)>0){
        // Do we need a final closing row tag?
        //if ($col != 1) {
      ?>
    <div class="clear"></div>
  </div>
    <?php
    // }
    }
  }
