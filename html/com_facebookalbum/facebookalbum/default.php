<?php
/**
 * @version		$Id: Joomquery facebook album $
 * @package		Joomquery facebook album
 * @subpackage	Components
 * @copyright	Copyright (C) 2013 JoomQuery.com. All rights reserved.
 * @author		Lamvt lamvt19792003@gmail.com
 * @link		http://joomquery.com
 * @license		License GNU General Public License version 2 or later
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
$Itemid = JRequest::getInt('Itemid',104);
$id = JRequest::getInt('id',1);
$aid = JRequest::getVar('aid','');
if($aid){
	$count_albums = count($this->photos['data']);
}else{
	$count_albums = count($this->albums['data']);
}
$limitstart = JRequest::getInt('limitstart',0);
$next = $limitstart + 20;
if($count_albums < 20){$next = $limitstart;}
$prev = $next - 20;

$doc = JFactory::getDocument();
$albums_per_row = $this->item->params->get('albums_per_row',4);
if($aid){
	$uri = 'index.php?option=com_facebookalbum&view=facebookalbum&id='.$id.'&aid='.$aid.'&Itemid='.$Itemid;
}else{
	$uri = 'index.php?option=com_facebookalbum&view=facebookalbum&id='.$id.'&Itemid='.$Itemid;
}
//echo $uri;
//$uri= JFactory::getURI();
//$query_string=$uri->getQuery();
//echo $query_string;
?>
<div class="d4j_facebook_albums row-fluid">
<?php if(isset($this->photos)){ /*we dont want to place js on head*/ ?>
	<?php if($this->item->params->get('get_jquery')==1){?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<?php } ?>
	<script src="<?php echo JURI::root() ; ?>media/com_facebookalbum/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
	<!--<script src="<?php echo JURI::root() ; ?>media/com_facebookalbum/bootstrap/js/bootstrap-dropdown.js"></script>
	<script src="<?php echo JURI::root() ; ?>media/com_facebookalbum/bootstrap/js/bootstrap-tooltip.js"></script>-->
	<script type="text/javascript" charset="utf-8">
	jQuery.noConflict();
	jQuery(function () {
		jQuery("a[rel^='prettyPhoto']").prettyPhoto({theme: 'dark_rounded',deeplinking: false});
		jQuery("[rel=tooltip]").tooltip();
		jQuery(".collapse").collapse()

	});
	</script>
<?php } /*we dont want to place css on head */?>
	<link rel="stylesheet" href="<?php echo JURI::root() ; ?>media/com_facebookalbum/css/styles.css"/>
	<link rel="stylesheet" href="<?php echo JURI::root() ; ?>media/com_facebookalbum/css/prettyPhoto.css"/>
	<h1><?php  echo $this->item->params->get('page_title');?></h1>
	<?php if ($this->item->params->get('show_description')==1) { ?>
	<div>
		<?php echo $this->item->fbdescription ; ?>
	</div>	
	<?php } ?>
	<div class="facebook_gallery">
		<div class="thumbnails">
		<?php if(!$aid){?>
		<?php $countitem = 1;?>
			<?php foreach($this->albums['data'] as $album){				
						
			if($album['count']){						
			$size ='';					
			if($album['count'] > 100){$size =':'.$album['count'] ;}					
			$link = JRoute::_("index.php?option=com_facebookalbum&view=facebookalbum&id=".$id."&aid=".$album['id'].$size."&Itemid=".$Itemid);			
			
			}				
			?>								
			<div class="col-md-<?php echo 12/$albums_per_row ;?>">					
			<a class="thumbnail" href="<?php echo $link ;?>">						
			<img src="https://graph.facebook.com/<?php echo $album['cover_photo'] ;?>/picture?access_token=<?php echo $this->facebookapi->getAccessToken();?>" alt="<?php echo $album['name'] ?>">					
			</a>					
			<?php if($this->item->params->get('show_album_title')==1){?>					
			<span class="title"><a href="<?php echo $link ;?>"><?php echo $album['name'].' ('.$album['count'].')' ;?></a></span>					
			<?php }?>				
			</div>				
			<?php 				
			if($countitem%$albums_per_row == 0){					
			echo '<div class="spacer" style="width:100%;display:inline-block;"></div>';				
			}				
			$countitem++; 				
			?>			
			<?php } ?>
			
		<?php }else{ ?>
			<?php foreach($this->photos['data'] as $i=>$photo){?>
				<div class="col-md-<?php echo 12/$albums_per_row ;?> photo">
					<a class="thumbnail" href="<?php echo $photo['source'] ;?>" rel="prettyPhoto[joomquery]" title="" class="thumbnail">
						<img src="<?php echo $photo['source'] ;?>" alt="">
					</a>
					
				</div>
			<?php } ?>
		<?php } ?>
		</div>
	</div>
</div>
<div class="row-fluid">
<?php ?>
<div class=""><ul class="pager">  
<?php if($limitstart == 0){ ?>  
<li class="disabled"><a href="#">Previous</a></li>  
<?php }else{ ?>  
<li>
<a href="<?php echo $uri; ?>&limitstart=<?php echo $prev; ?>">Previous</a></li>  
<?php } ?>  
<?php if($count_albums < 20){ ?>  <li class="disabled"><a href="#">Next</a></li>  
<?php }else{ ?>  <li><a href="<?php echo $uri; ?>&limitstart=<?php echo $next; ?>">Next</a></li>  <?php } ?></ul></div>

</div>
<!-- Please dont remove it if you haven't licence - Ask Lamvt (lamvt19792003@gmail.com) before you want to edite line bellow-->
<div id="facebook_support" class="row-fluid"><a style="font-size:10px !important;" href="http://JoomQuery.com" title="Free Joomla responsive templates">Powered By JoomQuery</a></div>