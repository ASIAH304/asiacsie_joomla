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
		<div class="col-md-12">
		<div class="well profile">
		    <div class="col-sm-12">
		        <div class="col-xs-12 col-sm-8">
		            <h2 class="profile_name"><?php echo $item->name?></h2>
					<?php if (!empty($item->con_position)) : ?>
						<p><strong class="profile_title"><?php echo $item->con_position?></strong></p>
					<?php endif; ?>
					<?php if (!empty($item->sortname1)) : ?>
						<p><strong><?php echo $langs['edu']?>： </strong> <?php echo $item->sortname1?> </p>
					<?php endif; ?>
					<?php if (!empty($item->address)) : ?>
						<p><strong><?php echo $langs['lab']?>： </strong> <?php echo $item->address?> </p>
					<?php endif; ?>
					<?php if (!empty($item->telephone)) : ?>
						<p><strong><?php echo $langs['ext']?>： </strong> <?php echo $item->telephone?> </p>
					<?php endif; ?>
					<?php if (!empty($item->email_to)) : ?>
						<p><strong>E-mail： </strong> <?php echo $item->email_to?> </p>
					<?php endif; ?>
		        </div>
		        <div class="col-xs-12 col-sm-4 text-center">
		            <figure>
		                <img src="<?php echo $item->image?>" alt="" class="img-circle img-responsive">
		            </figure>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 emphasis">
		        <h2><strong><?php echo $langs['exp']?></strong></h2>
		        <p><?php echo $item->misc?></p>
		    </div>
			<?php if ((!empty($item->address) && !empty($item->telephone))) : ?>
			<div class="col-xs-12 divider text-center">
				<div class="col-xs-12 col-sm-4 emphasis">		
				<?php if (!empty($item->webpage)) { ?>
					<a href="<?php echo $item->webpage?>" class="btn btn-success btn-block" target="_blank"><i class="fa fa-home fa-2x"></i> <?php echo $langs['web']?></a>
				<?php }else{?>
					<a href="#" class="btn btn-success btn-block disabled"><i class="fa fa-home fa-2x"></i> <?php echo $langs['web']?></a>
				<?php } ?>
				</div>
				<div class="col-xs-12 col-sm-4 emphasis">
				<?php if (!empty($item->address) && !empty($item->telephone)) { ?>
					<a href="http://research.asia.edu.tw/TchEportfolio/index_1/<?php echo $item->alias?>" class="btn btn-info btn-block" target="_blank"><i class="fa fa-info-circle fa-2x"></i> <?php echo $langs['por']?></a>
				<?php }else{?>
					<a href="#" class="btn btn-info btn-block disabled"><i class="fa fa-info-circle fa-2x"></i> <?php echo $langs['por']?></a>
				<?php } ?>
                </div>
				<div class="col-xs-12 col-sm-4 emphasis"> </div>
			</div>
			<?php endif; ?>
		</div>
	</div>
		
	<?php endforeach; ?>
<?php endif; ?>
