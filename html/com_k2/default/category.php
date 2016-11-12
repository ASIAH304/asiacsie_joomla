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

<div>
	<?php if(isset($this->category) || ( $this->params->get('subCategories') )): ?>
	<!-- Blocks for current category and subcategories -->
	<div>
		<?php if(isset($this->category) || $this->params->get('catTitle') || $this->params->get('catDescription') ): ?>
		<!-- Category block -->
		<div class="itemListCategory">

			<?php if(isset($this->addLink)): ?>
			<!-- Item add link -->
			<span class="catItemAddLink">
				<a class="modal" rel="{handler:'iframe',size:{x:990,y:650}}" href="<?php echo $this->addLink; ?>">
					<?php echo JText::_('K2_ADD_A_NEW_ITEM_IN_THIS_CATEGORY'); ?>
				</a>
			</span>
			<?php endif; ?>
			<?php if($this->params->get('catFeedIcon')): ?>
			<div class="pull-right">
				<a href="<?php echo $this->feed; ?>" title="<?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?>">
					<i class="fa fa-rss-square fa-lg text-warning"></i>
				</a>
			</div>
			<?php endif; ?>
			<?php if($this->params->get('catTitle')): ?>
			<!-- Category title -->
			<h2>
				<?php echo $this->category->name; ?><?php if($this->params->get('catTitleItemCounter')) echo ' ('.$this->pagination->total.')'; ?>
			</h2>
			<?php endif; ?>

			

			<?php if($this->params->get('catDescription')): ?>
			<!-- Category description -->
			<div><?php echo $this->category->description; ?></div>
			<?php endif; ?>
		</div>
		<?php endif; ?>
	</div>
	<?php endif; ?>
	<?php if((isset($this->leading) || isset($this->primary) || isset($this->secondary) || isset($this->links)) && (count($this->leading) || count($this->primary) || count($this->secondary) || count($this->links))): ?>
	<div class="announcement-list">
		<?php if(isset($this->leading) && count($this->leading)): ?>
			<?php foreach($this->leading as $key=>$item): ?>
				<?php
					// Load category_item.php by default
					$this->item=$item;
					echo $this->loadTemplate('item');
				?>
			<?php endforeach; ?>
		<?php endif; ?>
		<?php if(isset($this->primary) && count($this->primary)): ?>
			<?php foreach($this->primary as $key=>$item): ?>
				<?php
					// Load category_item.php by default
					$this->item=$item;
					echo $this->loadTemplate('item');
				?>
			<?php endforeach; ?>
		<?php endif; ?>
		<?php if(isset($this->secondary) && count($this->secondary)): ?>
			<?php foreach($this->secondary as $key=>$item): ?>
				<?php
					// Load category_item.php by default
					$this->item=$item;
					echo $this->loadTemplate('item');
				?>
			<?php endforeach; ?>
		<?php endif; ?>
		<?php if(isset($this->links) && count($this->links)): ?>
			<?php foreach($this->links as $key=>$item): ?>
				<?php
					// Load category_item_links.php by default
					$this->item=$item;
					echo $this->loadTemplate('item_links');
				?>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>

	<!-- Pagination -->
	<?php if($this->pagination->getPagesLinks()): ?>
	<nav class="text-center">
		<?php if($this->params->get('catPagination')) echo $this->pagination->getPagesLinks(); ?>
	</nav>
	<?php endif; ?>

	<?php endif; ?>
</div>
