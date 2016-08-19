<?php
/**
 * @version     1.7
 * @package     mod_bootstrapnav
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @author      Brad Traversy <support@bootstrapjoomla.com> - http://www.bootstrapjoomla.com
 */
//No Direct Access
defined('_JEXEC') or die;
?>
<?php foreach ($list as $i => &$item) : ?>
<?php 
	$class = $item->id;
	if($item->id == $active_id){/*$class .= ' current';*/}
	if (in_array($item->id, $path)){$class .= ' active';}
?>
	<?php if(!$item->parent) : ?>
		<?php if($item->level == 1) : ?>
			<li class="<?php echo $class; ?>">
				<a href="<?php echo $item->flink; ?>"><?php echo $item->title; ?></a>
			</li>
		<?php endif; ?>
	<?php elseif($item->parent) : ?>
		<button type="button" class="btn btn-info btn-blank dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<?php echo $item->title; ?> <span class="caret"></span> 
		</button>
		<ul class="dropdown-menu">
			<?php foreach ($list as $i => &$subitem) : ?>
				<?php if($subitem->parent_id == $item->id) : ?>
				<li><a href="<?php echo $subitem->flink; ?>"><?php echo $subitem->title; ?></a></li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
<?php endforeach; ?>
