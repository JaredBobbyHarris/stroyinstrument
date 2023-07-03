<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>


 <div class="pull-right clearfix">
  <div class="vmcart">
    <i class="icon ti ti-shopping-cart"></i>
<!-- Virtuemart 2 Ajax Card -->
<div class="vmCartModule <?php echo $params->get('moduleclass_sfx'); ?>" id="vmCartModule">
<span class="total_products"><?php echo  $data->totalProductTxt ?></span>
		<a class="total" data-toggle="dropdown" href="#"><span class="hidden-xs totalcart"><?php if ($data->totalProduct and $show_price and $currencyDisplay->_priceConfig['salesPrice'][0]) { ?>
		<?php echo $data->billTotal; ?>
		<?php } ?></span></a>
	

<?php
if ($show_product_list) {
	?>
<div class="dropdown-menu dropdownlab dropdown-right top" data-keep-open="true">
  <section>
   <ul class="minicartvm">
	<div id="hiddencontainer" style=" display: none;">
		<div class="vmcontainer">
		   <li class="clearfix">
		    <!-- product images -->
		       <div class="text"><span class="product_name"></span>
				 <div class="vmdetails"><span class="quantity"></span>&nbsp;x&nbsp;
<?php if ($show_price and $currencyDisplay->_priceConfig['salesPrice'][0]) { ?>
<span class="subtotal_with_tax"></span>
			</div>
                  </div>
			<?php } ?>
		   </li>
		</div>
	</div>
	   	<div class="vm_cart_products">
		<div class="vmcontainer">
		<?php
			foreach ($data->products as $product){
				?>  <li class="clearfix">
				      <!-- product images -->
				      <div class="text">
                          <span class="product_name"><?php echo  $product['product_name'] ?></span>
                                <div class="vmdetails">
<span class="quantity"><?php echo  $product['quantity'] ?></span>&nbsp;x&nbsp;<span class="subtotal_with_tax"><?php if ($show_price and $currencyDisplay->_priceConfig['salesPrice'][0]) { ?>
<?php echo $product['subtotal_with_tax'] ?></span></div>
                                       </div>
				<?php } ?>
			</li>
		<?php }
		?>
		</div>
	</div>
	</ul>
  </section>	
	
<?php } ?>
 
  <section>
   <div class="row">
     <div class="col-md-12 cartbtn show_cart">
        <?php if ($data->totalProduct) echo  $data->cart_show; ?>
          </div>
            </div>
              </section>


	<div class="payments_signin_button" ></div>
<noscript>
<?php echo vmText::_('MOD_VIRTUEMART_CART_AJAX_CART_PLZ_JAVASCRIPT') ?>
</noscript>
   </div>
  </div>
 </div>
</div>