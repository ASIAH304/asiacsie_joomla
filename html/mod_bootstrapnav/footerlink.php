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
<aside>
	<?php foreach ($list as $i => &$item) : ?>
	<li class="nav-item">
		<a href="<?php echo $item->flink; ?>"><?php echo $item->title; ?></a>
	</li>
	<?php endforeach; ?>
</aside>
