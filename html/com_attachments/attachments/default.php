<?php
/**
 * Attachments component
 *
 * @package Attachments
 * @subpackage Attachments_Component
 *
 * @copyright Copyright (C) 2007-2013 Jonathan M. Cameron, All Rights Reserved
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 * @link http://joomlacode.org/gf/project/attachments/frs/
 * @author Jonathan M. Cameron
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

// Load the Attachments helper
require_once(JPATH_SITE.'/components/com_attachments/helper.php'); /* ??? Needed? */
require_once(JPATH_SITE.'/components/com_attachments/javascript.php');

$user = JFactory::getUser();
$logged_in = $user->get('username') <> '';

$app = JFactory::getApplication();
$uri = JFactory::getURI();

// Set a few variables for convenience
$attachments = $this->list;
$parent_id = $this->parent_id;
$parent_type = $this->parent_type;
$parent_entity = $this->parent_entity;

$base_url = $this->base_url;

$format = JRequest::getWord('format', '');

/*echo "<pre>";
print_r($attachments);
echo "</pre>";*/

$icon=array(
	"archive.gif"    =>"fa-file-archive-o",
	"zip.gif"        =>"fa-file-archive-o",
	"audio.gif"      =>"fa-file-audio-o",
	"csv.gif"        =>"fa-file-excel-o",
	"excel.gif"      =>"fa-file-excel-o",
	"excelx.gif"     =>"fa-file-excel-o",
	"image.gif"      =>"fa-file-image-o",
	"link.gif"       =>"fa-external-link",
	"midi.gif"       =>"fa-file-video-o",
	"mov.gif"        =>"fa-file-video-o",
	"music.gif"      =>"fa-file-audio-o",
	"pdf.gif"        =>"fa-file-pdf-o",
	"ppt.gif"        =>"fa-file-powerpoint-o",
	"pptx.gif"       =>"fa-file-powerpoint-o",
	"text.gif"       =>"fa-file-code-o",
	"video.gif"      =>"fa-file-video-o",
	"word.gif"       =>"fa-file-word-o",
	"wordx.gif"      =>"fa-file-word-o",

	"oo-calc.gif"    =>"fa-file-text-o",
	"oo-draw.gif"    =>"fa-file-text-o",
	"oo-impress.gif" =>"fa-file-text-o",
	"oo-write.gif"   =>"fa-file-text-o",

	"c.gif"          =>"fa-file-code-o",
	"cpp.gif"        =>"fa-file-code-o",
	"css.gif"        =>"fa-file-code-o",
	"js.gif"         =>"fa-file-code-o",
	"php.gif"        =>"fa-file-code-o",
	"xml.gif"        =>"fa-file-code-o",
	"sql.gif"        =>"fa-file-code-o",

	"3d.gif"         =>"fa-file-text-o",
	"eps.gif"        =>"fa-file-text-o",
	"flash.gif"      =>"fa-file-text-o",
	"generic.gif"    =>"fa-file-text-o",
	"h.gif"          =>"fa-file-text-o",
	"ps.gif"         =>"fa-file-text-o",
	"rtf.gif"        =>"fa-file-text-o",
	"vcard.gif"      =>"fa-file-text-o",
);
$ll=$lang->getTag();
if($ll=="zh-TW"){
	$this->title="附件下載";
}else{
	$this->title="Attachments";
}
?>
<aside class="table-responsive">
<h4><?php echo $this->title?></h4>
<table class="table table-condensed" id="">
	<?php foreach ($attachments as $key => $attachment) {?>
	<?php
		if ( $this->secure ) {
				$url = JRoute::_("index.php?option=com_attachments&task=download&id=" . (int)$attachment->id);
		}else {
			$url = $base_url . $attachment->url;
			if (strtoupper(substr(PHP_OS,0,3) == 'WIN')) {
				$url = utf8_encode($url);
			}
		}

	?>
		<tr>
			<td style="width: 85%;">
				<i class="fa fa-2x <?php echo $icon[$attachment->icon_filename]?>" style="float: left; padding: 5px;"></i>
				<?php
				if ( JString::strlen($attachment->display_name) == 0 ){
					echo $filename = $attachment->filename;
				}else{
					echo $filename = htmlspecialchars(stripslashes($attachment->display_name));
				}
				?><br>
				<span class="text-muted"><?php echo $attachment->modified?></span>
			</td>
			<td style="width: 10%;">
				<?php
					if ( $this->secure ) {
						if($attachment->icon_filename=="pdf.gif"){
							$url = $attachment->url;
						}else{
							$url = JRoute::_("index.php?option=com_attachments&task=download&id=" . (int)$attachment->id);
						}
					}else{
						$url = $attachment->url;
					}
				?>
				<a href="<?php echo $url?>" class="btn btn-default">
				<?php if($attachment->icon_filename=="pdf.gif"){?>
				<i class="fa fa-eye"></i>
				<?php }else{?>
				<i class="fa fa-download"></i>
				<?php }?>
				</a>
			</td>
			<?php 
			$update_link = '';
			$delete_link = '';
			if ( JString::strlen($attachment->display_name) == 0 ){
				$filename = $attachment->filename;
			}else{
				$filename = htmlspecialchars(stripslashes($attachment->display_name));
			}
			$actual_filename = $attachment->filename;
			// Add the link to delete the parent, if requested
			if ( $this->some_attachments_modifiable && $attachment->user_may_edit && $this->allow_edit ) {

				// Create the edit link
				$update_url = str_replace('%d', (string)$attachment->id, $this->update_url);
				$tooltip = JText::_('ATTACH_UPDATE_THIS_FILE') . ' (' . $actual_filename . ')';
				$update_link = '<a class="btn modal-button" type="button" href="' . $update_url . '"';
				$update_link .= " rel=\"{handler: 'iframe', size: {x: 920, y: 600}}\" title=\"$tooltip\">";
				$update_link .= JHtml::image('com_attachments/pencil.gif', $tooltip, null, true);
				$update_link .= "</a>";
				}

			if ( $this->some_attachments_modifiable && $attachment->user_may_delete && $this->allow_edit ) {

				// Create the delete link
				$delete_url = str_replace('%d', (string)$attachment->id, $this->delete_url);
				$tooltip = JText::_('ATTACH_DELETE_THIS_FILE') . ' (' . $actual_filename . ')';
				$delete_link = '<a class="modal-button" type="button" href="' . $delete_url . '"';
				$delete_link .= " rel=\"{handler: 'iframe', size: {x: 600, y: 400}, iframeOptions: {scrolling: 'no'}}\" title=\"$tooltip\">";
				$delete_link .= JHtml::image('com_attachments/delete.gif', $tooltip, null, true);
				$delete_link .= "</a>";
			}
			
			if ( $this->some_attachments_modifiable && $this->allow_edit ) {?>
				<td class="at_edit" style="width: 5%;"><?php echo $update_link.$delete_link?></td>
			<?php }?>
		</tr>
	<?php }?>
</table>
</aside>
