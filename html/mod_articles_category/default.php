<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
/*if(JRequest::getVar('REMOTE_ADDR', '', 'SERVER') == "10.91.1.218"){?>
    <pre><?php print_r($list)?></pre>
<?php }*/
?>
<div class="text-center">
<div class="btn-group category-module<?php echo $moduleclass_sfx; ?>">
	<?php if (!$grouped) : ?>
		<?php foreach ($list as $item) : ?>
		<a class="btn btn-info <?php //echo $item->active; ?>" href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
		<?php endforeach; ?>
	<?php endif; ?>
</div>
</div>