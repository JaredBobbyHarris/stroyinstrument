<?php
defined('_JEXEC') or die; 
function modChrome_rest($module, &$params, &$attribs)
{
	$headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
	if (!empty ($module->content)) : ?>
	<div class="moduletable<?php echo htmlspecialchars($params->get('moduleclass_sfx')); ?> moduleblock"> 
		<?php if ($module->showtitle != 0) : ?>      
		<div class="resbg"><div class="reslab"><h<?php echo $headerLevel; ?> class="sidemodule"><?php echo $module->title; ?></h<?php echo $headerLevel; ?>></div></div>
		<?php endif; ?>
		<div class="res">
	    <div class="module-content">
	        <?php echo $module->content; ?>
        </div>
        </div><div class="modul"></div></div>
	<?php endif;    
}