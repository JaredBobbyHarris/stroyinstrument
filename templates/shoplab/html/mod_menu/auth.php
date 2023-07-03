<?php
defined('_JEXEC') or die();

?>

<p class="head-reg">
<?php foreach($list as $item) :?>
	<a href="<?php echo $item->flink;?>"><?php echo $item->title;?></a> 
<?php endforeach;?>
</p>
