<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<?php if (!$grouped) : ?>
<ul class="nav nav-tabs tabs-material">
	<?php foreach ($list as $item) : ?>
    <li class="<?php echo $item->active; ?>">
    	<a href="<?php echo $item->link; ?>">
    		<?php echo $item->title; ?>
    	</a>
    </li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>