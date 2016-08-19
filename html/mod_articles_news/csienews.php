<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$item_heading = $params->get('item_heading', 'h4');
?>
<div id="scrollDiv">
	<div class="scrollText <?php echo $lang->getTag()?>">
	<ul>
	<?php for ($i = 0, $n = count($list); $i < $n; $i ++) : ?>
		<?php $item = $list[$i]; ?>
		<?php
			$a=explode('<div class="attachmentsContainer">',$item->introtext);
			//print_r($a[0]);
			$links=str_replace(array("<p>","</p>"),array("",""),$a[0]);
			//print_r($link);
			$item->links=$links;
		?>
		<li><i class="fa fa-bullhorn"></i> <a href="<?php echo $item->links; ?>"><?php echo $item->title; ?></a></li>
	<?php endfor; ?>
	</ul>
	</div>
</div>
