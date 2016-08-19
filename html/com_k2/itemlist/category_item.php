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

// Define default image size (do not change)
K2HelperUtilities::setDefaultImage($this->item, 'itemlist', $this->params);

?>

<!-- Start K2 Item Layout -->
	
		<tr itemscope itemtype="http://schema.org/Article">
			<td style="width:85%">
				<a href="<?php echo $this->item->link; ?>" itemprop="url">
					<span itemprop="name"><?php echo $this->item->title; ?>1</span>
				</a>

	        </td> 
	      	<td style="width:15%">
				<span itemprop="startDate"><?php echo JText::sprintf(JHtml::_('date', $this->item->publish_up,"Y-m-d")); ?></span>
			</td>
	    </tr>


<!-- End K2 Item Layout -->
