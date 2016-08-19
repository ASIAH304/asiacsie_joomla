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

?>
<article class="news">
	<h2 class="news_title"><?php echo $this->item->title; ?></h2>
	<div class="news_meta">
		<div class="news_category">
			<a href="<?php echo $this->item->category->link; ?>"><?php echo $this->item->category->name; ?></a>
		</div>
		<div class="news_date">
			<?php echo JHTML::_('date', $this->item->created , JText::_('K2_DATE_FORMAT_LC2')); ?>
		</div>
		<?php if($this->item->params->get('itemPrintButton') && !JRequest::getInt('print')): ?>
		<div class="news_print hidden-print pull-right">
			<a rel="nofollow" href="<?php echo $this->item->printLink; ?>" onclick="window.open(this.href,'printWindow','width=900,height=600,location=no,menubar=no,resizable=yes,scrollbars=yes'); return false;">
				<i class="fa fa-print"></i> <?php echo JText::_('K2_PRINT'); ?>
			</a>
		</div>
		<?php endif; ?>
		<?php if($this->item->params->get('itemHits')): ?>
		<div class="news_view hidden-print pull-right text-success">
			<i class="fa fa-eye"></i> <?php echo $this->item->hits; ?>
		</div>
		<?php endif; ?>
		<div class="fb-like" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>	
		<div class="fb-send"></div>
	</div>
	<div class="news_content">
		<?php echo $this->item->introtext; ?>
	</div>
</article>
<?php if($this->item->params->get('itemAttachments') && count($this->item->attachments)): ?>
<section class="attachment">
	<h3 class="list-title"><?php echo JText::_('K2_DOWNLOAD_ATTACHMENTS'); ?></h3>
	<hr />
	<div class="attachment-list">
		<?php foreach ($this->item->attachments as $attachment): ?>
		<a class="link" href="<?php echo $attachment->link; ?>">
            <div class="item-title">
				<i class="item-icon fa fa-lg fa-download"></i> 
				<?php echo $attachment->title; ?>
            </div>
            <?php if($this->item->params->get('itemAttachmentsCounter')): ?>
            <div class="item-time">
				<i class="fa fa-arrow-circle-o-down"></i> <?php echo $attachment->hits; ?>
            </div>
            <?php endif; ?>
        </a>
        <?php endforeach; ?>
	</div>
</section>
<?php endif; ?>