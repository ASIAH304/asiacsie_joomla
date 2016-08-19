<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_latest
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
<div class="csie_panel table-responsive latestnews<?php echo $moduleclass_sfx; ?>">
    <h3><?php echo $module->title;?></h3>
    <table>
    <?php foreach ($list as $item) :  ?>
      <?php //print_r($item);?>
        <tr itemscope itemtype="http://schema.org/Article">
            <td style="width:85%">
              <a href="<?php echo JURI::base(); ?>index.php/<?php echo $item->category_alias; ?>/<?php echo $item->id; ?>" itemprop="url">
                <span itemprop="name"><?php echo $item->title; ?></span>
              </a>
            </td> 
          	<td style="width:15%">
              <span itemprop="startDate"><?php echo JText::sprintf(JHtml::_('date', $item->publish_up,"Y-m-d")); ?></span></td>
        </tr>
    <?php endforeach; ?>
  </table>
</div>

