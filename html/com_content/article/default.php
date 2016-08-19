<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.beez3
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app = JFactory::getApplication();
$templateparams = $app->getTemplate(true)->params;
$images = json_decode($this->item->images);
$urls = json_decode($this->item->urls);
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
JHtml::_('behavior.caption');

// Create shortcut to parameters.
$params = $this->item->params;

?>
<article class="csie_content item-page<?php echo $this->pageclass_sfx?>">
<?php if ($this->params->get('show_page_heading')) : ?>

<?php if ($this->params->get('show_page_heading') and $params->get('show_title')) :?>
<div>
<?php endif; ?>
<?php endif; ?>
<?php
if (!empty($this->item->pagination) && $this->item->pagination && !$this->item->paginationposition && $this->item->paginationrelative){
	echo $this->item->pagination;
}

if ($params->get('show_title')) : ?>
<h2 class="post-title">
	<?php echo $this->escape($this->item->title); ?>
</h2>
<?php endif; ?>
<?php if ($this->params->get('show_page_heading') and $params->get('show_title')) :?>
</div>
<?php endif; ?>
<?php if ($params->get('access-edit') ||  $params->get('show_print_icon') || $params->get('show_email_icon')) : ?>
	<ul class="actions">
	<?php if (!$this->print) : ?>
		<?php if ($params->get('show_print_icon')) : ?>
		<li class="print-icon">
			<?php echo JHtml::_('icon.print_popup', $this->item, $params, array(), true); ?>
		</li>
		<?php endif; ?>
		<?php if ($params->get('show_email_icon')) : ?>
		<li class="email-icon">
			<?php echo JHtml::_('icon.email', $this->item, $params, array(), true); ?>
		</li>
		<?php endif; ?>
		<?php if ($this->user->authorise('core.edit', 'com_content.article.'.$this->item->id)) : ?>
		<li class="edit-icon">
			<?php echo JHtml::_('icon.edit', $this->item, $params, array(), true); ?>
		</li>
		<?php endif; ?>
	<?php else : ?>
		<li>
			<?php echo JHtml::_('icon.print_screen', $this->item, $params, array(), true); ?>
		</li>
	<?php endif; ?>
	</ul>
<?php endif; ?>

<?php  if (!$params->get('show_intro')) { echo $this->item->event->afterDisplayTitle;}?>
<?php echo $this->item->event->beforeDisplayContent; ?>
<div class="social">
	<div class="fb-quote"></div>
	<a href="http://line.me/R/msg/text/?<?php echo $this->escape($this->item->title); ?>%0D%0A<?php echo JURI::current(); ?>" class="label label-success">Line</a>
	<div class="fb-like" data-href="<?php echo JURI::current(); ?>" data-layout="button" data-action="like" data-show-faces="false" data-share="true"></div>
	<div class="fb-send" data-href="<?php echo JURI::current(); ?>"></div>
	<div class="fb-save" data-uri="<?php echo JURI::current(); ?>" data-size="small"></div>
</div>
<div class="clearfix"></div>	
<?php $useDefList = (($params->get('show_author')) or ($params->get('show_category')) or ($params->get('show_parent_category'))
	or ($params->get('show_create_date')) or ($params->get('show_modify_date')) or ($params->get('show_publish_date'))
	or ($params->get('show_hits'))); ?>

	<?php if (isset ($this->item->toc)) : ?>
		<?php echo $this->item->toc; ?>
	<?php endif; ?>

<?php if (isset($urls) AND ((!empty($urls->urls_position) AND ($urls->urls_position == '0')) OR ($params->get('urls_position') == '0' AND empty($urls->urls_position)))
		OR (empty($urls->urls_position) AND (!$params->get('urls_position')))) : ?>
	<?php echo $this->loadTemplate('links'); ?>
<?php endif; ?>
	<?php  if (isset($images->image_fulltext) and !empty($images->image_fulltext)) : ?>
	<?php $imgfloat = (empty($images->float_fulltext)) ? $params->get('float_fulltext') : $images->float_fulltext; ?>
	<div class="img-fulltext-<?php echo htmlspecialchars($imgfloat); ?>">
	<img
		<?php if ($images->image_fulltext_caption):
			echo 'class="caption"'.' title="' .htmlspecialchars($images->image_fulltext_caption) .'"';
		endif; ?>
		src="<?php echo htmlspecialchars($images->image_fulltext); ?>" alt="<?php echo htmlspecialchars($images->image_fulltext_alt); ?>"/>
	</div>
	<?php endif; ?>
<?php
if (!empty($this->item->pagination) AND $this->item->pagination AND !$this->item->paginationposition AND !$this->item->paginationrelative):
	echo $this->item->pagination;
endif;
?>
	<?php echo $this->item->text; ?>

<?php // TAGS ?>
<?php if ($params->get('show_tags', 1) && !empty($this->item->tags)) : ?>
	<?php $this->item->tagLayout = new JLayoutFile('joomla.content.tags'); ?>
	<?php echo $this->item->tagLayout->render($this->item->tags->itemTags); ?>
<?php endif; ?>

<?php
if (!empty($this->item->pagination) AND $this->item->pagination AND $this->item->paginationposition AND!$this->item->paginationrelative):
	echo $this->item->pagination;?>
<?php endif; ?>

	<?php if (isset($urls) AND ((!empty($urls->urls_position) AND ($urls->urls_position == '1')) OR ( $params->get('urls_position') == '1'))) : ?>

	<?php echo $this->loadTemplate('links'); ?>
	<?php endif; ?>
<?php
if (!empty($this->item->pagination) AND $this->item->pagination AND $this->item->paginationposition AND $this->item->paginationrelative):
	echo $this->item->pagination;?>
<?php endif; ?>
	<?php echo $this->item->event->afterDisplayContent; ?>
</article>


