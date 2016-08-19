<?php
/**
 * @version     1.7
 * @package     mod_bootstrapnav
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @author      Brad Traversy <support@bootstrapjoomla.com> - http://www.bootstrapjoomla.com
 */
//No Direct Access
defined('_JEXEC') or die;
?>

<div class="btn-group">
    <?php foreach ($list as $i => &$item) : ?>
    <?php 
        $class = $item->id; 
        $class .= ' list-group-item';
    ?>
         <a href="<?php echo $item->flink; ?>" class="btn btn-default"><?php echo $item->title; ?></a>                     
    <?php endforeach; ?>
</div>
