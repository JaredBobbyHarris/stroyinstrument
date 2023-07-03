<?php
/**
 *
 * Show the product details page
 *
 * @package	VirtueMart
 * @subpackage
 * @author Max Milbers, Valerie Isaksen

 * @link http://www.virtuemart.net
 * @copyright Copyright (c) 2004 - 2010 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * VirtueMart is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * @version $Id: default_images.php 6188 2012-06-29 09:38:30Z Milbo $
 */
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

JFactory::getDocument()->addScript(JFactory::getUri()->base(true).'/templates/'.JFactory::getApplication()->getTemplate().'/assets/js/fancybox/jquery.fancybox-1.3.4.js');
JFactory::getDocument()->addScript(JFactory::getUri()->base(true).'/templates/'.JFactory::getApplication()->getTemplate().'/assets/js/slimbox2/slimbox2.js');
JFactory::getDocument()->addScript(JFactory::getUri()->base(true).'/templates/'.JFactory::getApplication()->getTemplate().'/assets/js/pikachoose/jquery.jcarousel.min.js');
JFactory::getDocument()->addScript(JFactory::getUri()->base(true).'/templates/'.JFactory::getApplication()->getTemplate().'/assets/js/pikachoose/jquery.pikachoose.full.js');
JFactory::getDocument()->addStyleSheet(JFactory::getUri()->base(true).'/templates/'.JFactory::getApplication()->getTemplate().'/assets/css/fancybox/jquery.fancybox-1.3.4.css');
JFactory::getDocument()->addStyleSheet(JFactory::getUri()->base(true).'/templates/'.JFactory::getApplication()->getTemplate().'/assets/css/slimbox2/slimbox2.css');
JFactory::getDocument()->addStyleSheet(JFactory::getUri()->base(true).'/templates/'.JFactory::getApplication()->getTemplate().'/assets/css/pikachoose/base.css');
JHTML::_('behavior.modal');

?>
<style type="text/css">
div.pika-stage {width: auto !important;}
.clip img {
	width:auto !important;
	height:100% !important;
}

</style>
<script type="text/javascript">
	SqueezeBox.parsers.extend({
		gallery:function(preset) {
			if (document.id(this.options.target)) return document.id(this.options.target);
			if (this.element && !this.element.parentNode) return this.element;
			return (preset ? this.element : false);
		}
	});
	SqueezeBox.handlers.extend({
		gallery: function(el) {
			if (el) return el;
			el=document.id('images');
			if (el) return el;
			return this.onError();
		},

	});
	
	function show_gallery(anchor) {
		anchor.removeProperty('href');
		SqueezeBox.open($('images'), {
			handler: 'gallery',
			size: {x: 400, y: 600},
			url:'',
			onClose:function() {
				var gallery=document.id('images');
				document.id('images_gallery').grab(gallery);
				document.id('pika_anchor').addEvent('click',function() {
					show_gallery(this);
				});
			},
			onOpen:function() {
				document.id('pika_anchor').removeEvents('click');
			}
		});
	}
	
	jQuery(document).ready(function (){
	var a = function(self){
		document.id('pika_anchor').addEvent('click',function() {
			show_gallery(this);
		});
   };
   jQuery("#pikame").PikaChoose({buildFinished:a});
});
</script>
<div id="images_gallery">
	<div class="images" id="images">
			<div class="pikachoose">
				<ul id="pikame">
					<?php
					foreach($this->product->images as $image) {
						?>
						<li><?php echo JHTML::_('link',$image->file_url,JHTML::_('image',$image->file_url,$image->file_title)); ?><span><?php echo $image->file_meta; ?></span></li>
						<?php
					}
					?>
				</ul>
			</div>
	</div>
</div>
<div style="clear:both"></div>
