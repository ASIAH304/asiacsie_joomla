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
// https://docs.google.com/viewer?url=
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

<section class="attachment">
	<h3 class="list-title"><?php echo $this->title?></h3>
    <hr />
    <div class="attachment-list">
        <?php foreach ($attachments as $key => $attachment) {?>
        <?php
			if ( $this->secure ) {
				if($attachment->icon_filename=="pdf.gif"){
					$url = $attachment->url;
				}else{
					$url = JRoute::_("index.php?option=com_attachments&task=download&id=" . (int)$attachment->id);
				}
				if( $attachment->icon_filename=="word.gif" || $attachment->icon_filename=="wordx.gif"){
					$url = "https://docs.google.com/viewer?url=".JURI::base().$attachment->url;
				}else{
					$url = JRoute::_("index.php?option=com_attachments&task=download&id=" . (int)$attachment->id);
				}
			}else {
				$url = $base_url . $attachment->url;
				if (strtoupper(substr(PHP_OS,0,3) == 'WIN')) {
					$url = utf8_encode($url);
				}
				/*if( $attachment->icon_filename=="word.gif" || $attachment->icon_filename=="wordx.gif"){
					$url = "https://docs.google.com/viewer?url=".JURI::base().$url;
				}*/
			}
		?>
        <a class="link" href="<?php echo $url; ?>" target="_blank">
            <div class="item-title">
				<i class="item-icon fa fa-lg <?php echo $icon[$attachment->icon_filename]?>"></i>
				<?php
					if ( JString::strlen($attachment->display_name) == 0 ){
						echo $filename = $attachment->filename;
					}else{
						echo $filename = htmlspecialchars(stripslashes($attachment->display_name));
					}
				?>
            </div>
            <div class="item-time">
				<?php echo $attachment->modified?>
            </div>
        </a>
        <?php } ?>
    </div>
</section>
