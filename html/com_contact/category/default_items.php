<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JHtml::_('behavior.framework');

$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
$ll=$lang->getTag();
$langs=array();
if($ll=="zh-TW"){
	$langs= array(
		'edu' => "學歷",
		'lab'=>"辦公室",
		'ext'=>"分機",
		'web' => "網頁",
		'exp'=>"研究領域",
		'por'=>"教師歷程檔案",
	);
}else if($ll=="en-GB"){
	$langs= array(
		'edu' => "Educational",
		'lab'=>"Lab",
		'ext'=>"Extension",
		'web' => "Web page",
		'exp'=>"Expertise",
		'por'=>"T-portfolio",
	);
}
?>
<?php if (empty($this->items)) : ?>
	<p> <?php echo JText::_('COM_CONTACT_NO_CONTACTS'); ?> </p>
<?php else : ?>
	<?php foreach ($this->items as $i => $item) : ?>
	<div class="col-sm-12">
		<div class="bs-component">
			<div class="card">
				<div class="card-content">
                   	<img src="<?php echo $item->image?>" class="pull-right img-rounded img-thumbnail" style="width:160; height: 200px">
					<h2 class="card-header"><?php echo $item->name?></h2>
					<?php if (!empty($item->con_position)) : ?>
                    <p class="card-meta"><?php echo $item->con_position?></p>
                    <?php endif; ?>
					<?php if (!empty($item->sortname1)) : ?>
					<p class="card-description">
						<strong><?php echo $langs['edu']?>： </strong> <?php echo $item->sortname1?>
					</p>
					<?php endif; ?>
					<?php if (!empty($item->address)) : ?>
					<p class="card-description">
						<strong><?php echo $langs['lab']?>： </strong> <?php echo $item->address?>
					</p>
					<?php endif; ?>
					<?php if (!empty($item->telephone)) : ?>
					<p class="card-description">
						<strong><?php echo $langs['ext']?>： </strong> <?php echo $item->telephone?>
					</p>
					<?php endif; ?>
					<?php if (!empty($item->email_to)) : ?>
					<p class="card-description">
						<strong>E-mail： </strong> <?php echo $item->email_to?>
					</p>
					<?php endif; ?>
				</div>
				<div class="card-content">
                    <p><strong><?php echo $langs['exp']?>： </strong> </p>
                    <?php echo $item->misc?>
                </div>
                <?php if( !empty($item->webpage) || (!empty($item->address) && !empty($item->telephone)) ){?>
				<div class="card-extra card-content">
					<div class="row-fluid card-btn text-center">
                        <?php if (!empty($item->webpage)) { ?>
                        <a target="_blank" href="<?php echo $item->webpage?>" class="col-xs-6 btn btn-inverted btn-success">
                        	<i class="fa fa-home fa-2x"></i> <?php echo $langs['web']?>
                        </a>
                        <?php }?>
                        <?php if (!empty($item->address) && !empty($item->telephone)) { ?>
                        <a target="_blank" href="http://research.asia.edu.tw/TchEportfolio/index_1/<?php echo $item->alias?>" class="col-xs-6 btn btn-inverted btn-primary">
                        	<i class="fa fa-info-circle fa-2x"></i> <?php echo $langs['por']?>
                        </a>
                        <?php }?>
                    </div>
				</div>
				<?php }?>
			</div>
		</div>
	</div>
	<hr>
	<?php endforeach; ?>
<?php endif; ?>
