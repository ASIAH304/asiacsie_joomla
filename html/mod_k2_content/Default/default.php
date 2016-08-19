<?php
/**
 * @version		2.6.x
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2014 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;
$module_params=json_decode($module->params);
$home_url = "";
switch($module->language){
    case "en-GB":
    	$home_url = "en/";
	break;
    
}
?>
<div class="announcement-list">
    <?php foreach ($items as $key=>$item) :  ?>
    	<div itemscope itemtype="http://schema.org/NewsArticle">
		    <a itemprop="url" class="link<?php if( $item->featured ){?> highlight<?php }?>" href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>">
		        <div itemprop="name" class="item-title"><?php echo $item->title; ?></div>
		        <time itemprop="datePublished" datetime="<?php echo JText::sprintf(JHtml::_('date', $item->publish_up,"Y-m-d")); ?>" class="item-time">
		        	<?php echo JText::sprintf(JHtml::_('date', $item->publish_up,"Y-m-d")); ?>
		        </time>
		    </a>
		    <div itemprop="author" class="hidden" itemscope itemtype="https://schema.org/Person">
		    	<span itemprop="name">亞洲大學資工系</span>
		    </div>
		    <div itemprop="dateModified" class="hidden">
		    	<?php echo JText::sprintf(JHtml::_('date', $item->publish_up,"Y-m-d")); ?>
		    </div>
		</div>
    <?php endforeach; ?>
</div>
<?php if( $module->position == "position-tab" ){?>
<div class="announcement-more">
<a href="<?php echo $home_url?>component/k2/p/<?php echo $module_params->category_id[0]?>" class="ui green button btn-more">
    <?php echo $module_params->itemCustomLinkTitle;?>
</a>
</div>
<?php }?>
