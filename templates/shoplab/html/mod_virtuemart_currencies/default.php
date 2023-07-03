<?php // no direct access
defined('_JEXEC') or die('Restricted access');
vmJsApi::jQuery();
$replacement_from=array('<select', '</select', '<option','</option', 'value="', 'selected="selected"', 'id="virtuemart_currency_id"', 'name="virtuemart_currency_id"');
$replacement_to=array('<ul class="currencymenu"', '</ul', '<li','</li', 'rel="', 'class="active"','','');
$doc =& JFactory::getDocument();
$doc->addScriptDeclaration("
jQuery(document).ready(function() {
	jQuery('#currencySelector ul li').click(function(el) {
		jQuery('#virtuemart_currency_id').attr('value', jQuery(this).attr('rel'));
		jQuery('#currencySelector').submit();	
	});	
});
");
?>
<?php echo $text_before ?>

<nav class="navbar shoplablogin" role="navigation">
  <ul class="navbar-left">
    <li class="dropdown">  
     <a aria-expanded="false" href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="log_icons fa fa-usd"></i><span>Currency</span></a>
         <div class="dropdown-menu dropdownlab top" data-keep-open="true">
            <fieldset>
			<form action="<?php echo vmURI::getCleanUrl() ?>" method="post" id="currencySelector">
<a id="chosser_arrows" class="icon exchange"></a>
		<input type="hidden" id="virtuemart_currency_id" name="virtuemart_currency_id" value="" />
	<?php
		$chooser = JHTML::_('select.genericlist', $currencies, 'virtuemart_currency_id', 'class="vm-chzn-select"', 'virtuemart_currency_id', 'currency_txt', $virtuemart_currency_id) ;
		echo str_ireplace($replacement_from, $replacement_to, $chooser); 
		//echo $chooser; 
	?>
</form> 
</fieldset>
         </div>
           </li>
             </ul>
              </nav> 

