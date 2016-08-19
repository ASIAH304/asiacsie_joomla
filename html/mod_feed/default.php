<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_feed
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<?php
if ( !empty($feed) && is_string($feed) ){
	echo $feed;
}else{
	if ($feed != false){
		// Image handling
		$iUrl	= isset($feed->image) ? $feed->image : null;
		$iTitle = isset($feed->imagetitle) ? $feed->imagetitle : null;
		?>
		<div class="rss_news <?php echo $moduleclass_sfx; ?>">
		<?php
		if ( $params->get('rsstitle', 1) ){?>
			<div style="overflow: hidden;">
				<h3 class="list-title"><?php echo $feed->description; ?></h3>
			</div>
			<hr />
		<?php } ?>
	<!-- Show items -->
	<?php if (!empty($feed)){ ?>
		<div class="rss_news_list">
		<?php for ($i = 0; $i < $params->get('rssitems', 5); $i++){
			if (!$feed->offsetExists($i)){
				break;
			}
			$uri  = (!empty($feed[$i]->uri) || !is_null($feed[$i]->uri)) ? $feed[$i]->uri : $feed[$i]->guid;
			$uri  = substr($uri, 0, 4) != 'http' ? $params->get('rsslink') : $uri;
			$text = !empty($feed[$i]->content) ||  !is_null($feed[$i]->content) ? $feed[$i]->content : $feed[$i]->description;
			?>
			<a class="link" href="<?php echo htmlspecialchars($uri); ?>" target="_blank">
				<div class="item-title"><?php echo $feed[$i]->title; ?></div>
			</a>
		<?php } ?>
		</div>
	<?php } ?>
	</div>
	<?php }
}?>
