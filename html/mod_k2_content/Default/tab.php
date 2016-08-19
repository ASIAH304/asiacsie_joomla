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
?>
<div>
    <div class="announcement-list">
        <?php foreach ($items as $key=>$item) :  ?>
        <a class="link" href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>">
            <div class="item-title"><?php echo $item->title; ?></div>
            <div class="item-time"><?php echo JText::sprintf(JHtml::_('date', $item->publish_up,"Y-m-d")); ?></div>
        </a>
        <?php endforeach; ?>
    </div>
    <a href="component/k2/p/<?php echo $module_params->category_id[0]; ?>" title="更多" class="ui button blue circular btn-more">更多</a>
</div>
