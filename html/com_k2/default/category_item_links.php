<?php
/**
 * @version		2.7.x
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2014 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;

// Define default image size (do not change)
K2HelperUtilities::setDefaultImage($this->item, 'itemlist', $this->params);

?>
<div itemscope itemtype="http://schema.org/NewsArticle">
	<a itemprop="url" class="link<?php if( $this->item->featured ){?> highlight<?php }?>" href="<?php echo $this->item->link; ?>" title="<?php echo $this->item->title; ?>">
		<div itemprop="name" class="item-title"><?php echo $this->item->title; ?></div>
		<time itemprop="datePublished" datetime="<?php echo JText::sprintf(JHtml::_('date', $this->item->publish_up,"Y-m-d")); ?>" class="item-time">
			<?php echo JText::sprintf(JHtml::_('date', $this->item->publish_up,"Y-m-d")); ?>
		</time>
	</a>
	<div itemprop="author" class="hidden" itemscope itemtype="https://schema.org/Person">
		<span itemprop="name">亞洲大學資工系</span>
	</div>
	<div itemprop="dateModified" class="hidden">
		<?php echo JText::sprintf(JHtml::_('date', $this->item->publish_up,"Y-m-d")); ?>
	</div>
</div>

