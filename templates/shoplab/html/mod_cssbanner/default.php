<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_cssbanner
 * @copyright   Copyright (C) 2014 CSSJoomla.com. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JFactory::getDocument()->addScript(JFactory::getUri()->base(true).'/modules/mod_cssbanner/media/js/cssbanner.js');
JFactory::getDocument()->addStyleSheet(JFactory::getUri()->base(true).'/modules/mod_cssbanner/media/css/cssbanner.css');
?><div class="hidden-xs hidden-sm">
<style type="text/css">.bannerfix {height: <?php echo $params->def('height',500); ?>px;}</style> 
<div class="<?php echo $moduleclass_sfx ?>bannerfix">
<a href="<?php echo $params->get('csslink'); ?>" target="_<?php echo $params->def('target',blank); ?>" title="">
<div class="imagebg imagebg-blurred" <?php if ($params->get('backgroundimage1')) : ?> style="background:url(<?php echo $params->get('backgroundimage1');?>) no-repeat center bottom fixed;"<?php endif;?> ></div>
<div class="imagebg imagebg-regular" <?php if ($params->get('backgroundimage2')) : ?> style="background:url(<?php echo $params->get('backgroundimage2');?>) no-repeat center bottom fixed;"<?php endif;?> ></div>
</a>
</div>
<div style="clear: both;"></div> 
</div>
<script>
jQuery(document).bind('scroll', blurBottomImage);
</script>
