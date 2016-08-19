<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

//echo JURI::current();
if( JURI::base( true ) == "/csie" ){
  	$theNewURL = str_replace("http://210.60.30.186/csie/","http://csie.asia.edu.tw/",JURI::current());
  	header( "HTTP/1.1 301 Moved Permanently" ); 
	header('Location: ' . $theNewURL);
    exit();
}

if($task == "edit" || $layout == "form" )
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Logo file or site title param
if ($params->get('logoFile'))
{
	$logo = '<img src="' . JUri::root() . $params->get('logoFile') . '" alt="' . $sitename . '" />';
}
elseif ($params->get('sitetitle'))
{
	$logo = '<span class="site-title" title="' . $sitename . '">' . htmlspecialchars($params->get('sitetitle')) . '</span>';
}
else
{
	$logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
}
$lang = JFactory::getLanguage();
$now_lang=$lang->getTag();
$home_url="/";
$lang_flag="";
if($now_lang=="zh-TW"){
	$home_url.="zh-tw/";
	$lang_flag = "tw";
}else if($now_lang=="en-GB"){
	$home_url.="en/";
	$lang_flag = "us";
}
$home_url=$this->baseurl.$home_url;
$min_logo = 1;
$max_logo = 23;
$num_logo = 6;
$logo = array("18");
$llogo = 0;
while($llogo<$num_logo){
	$tmp_logo = rand($min_logo, $max_logo);
	if( !in_array($tmp_logo,$logo) ){
		array_push($logo,$tmp_logo);
		$llogo++;
	}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $this->title; ?> <?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link href='https://fonts.googleapis.com/css?family=Inconsolata' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/template.css" type="text/css" />
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css" type="text/css" />

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/responsiveslides.js" type="text/javascript"></script>
<script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/jquery.typetype.min.js" type="text/javascript"></script>
<script src="http://yandex.st/highlightjs/8.0/highlight.min.js"></script>
<script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/bootstrap.min.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
h1.code{
	font-family: 'Inconsolata';
	font-size: 28px;
	font-weight: bold;
}
</style>
</head>

<body>
<div class="header_fun">
	<div class="header_section">
		<?php echo $doc->getBuffer('modules', 'position-0'); ?>
	</div>
	<?php echo $doc->getBuffer('modules', 'position-1'); ?>
</div>
<header id="header" class="container">
	<div>
		<h1 id="logo">
			<ul class="rslides">
				<?php foreach($logo as $key => $v){?>
				<li><a href="<?php echo $this->baseurl; ?>/"><img src="<?php echo $this->baseurl; ?>/images/logo/<?php echo $v;?>.png"></a></li>
				<?php }?>
			</ul>
		</h1>
	</div>
</header><!-- end header -->
<?php echo $doc->getBuffer('modules', 'position-menu'); ?>
<div class="container" id="main">
	<div class="row">
		<div class="col-md-2">
			<?php echo $doc->getBuffer('modules', 'position-footerlink'); ?>
		</div>
		<div class="col-md-7">
			<div class="jumbotron">
				<h1 class="code" id="hdcode"></h1>
				<p><strong><?php echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></strong></p>
				<p><?php echo JText::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></p>
				<ul>
					<li><?php echo JText::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
					<li><?php echo JText::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?></li>
					<li><?php echo JText::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
					<li><?php echo JText::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
				</ul>
				<?php if (JModuleHelper::getModule('search')) : ?>
					<p><strong><?php echo JText::_('JERROR_LAYOUT_SEARCH'); ?></strong></p>
					<p><?php echo JText::_('JERROR_LAYOUT_SEARCH_PAGE'); ?></p>
					<?php echo $doc->getBuffer('module', 'search'); ?>
				<?php endif; ?>
				
			</div>
			<div class="alert alert-dark alert-danger">
				<p><?php echo JText::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?></p>
				<blockquote>
					<span class="label label-default"><?php echo $this->error->getCode(); ?></span> <?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8');?>
				</blockquote>
				<?php if ($this->debug) : ?>
					<?php echo $this->renderBacktrace(); ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="col-md-3">
			<?php echo $doc->getBuffer('modules', 'position-right'); ?>
			<?php echo $doc->getBuffer('modules', 'position-left2'); ?>
		</div>
	</div>
</div>
<footer id="footer">
	
	<a rel="nofollow" id="back-to-top" href="#" class="ui button olive circular huge icon back-to-top" role="button"><i class="fa icon fa-chevron-up"></i></a>
</footer>
<footer class="footer">
	<div class="container">
		<div class="footer-copyright text-center">
			<?php echo $doc->getBuffer('modules', 'position-footer'); ?>
          	<div><i class="fa fa-user"></i> Designed By Jingxun Lai</div>
		</div>
	</div>
	<a rel="nofollow" id="back-to-top" href="#" class="ui button olive circular huge icon back-to-top" role="button"><i class="fa icon fa-chevron-up"></i></a>
</footer>
<script>jQuery(document).ready(function(){jQuery(window).scroll(function(){if(jQuery(this).scrollTop()>50){jQuery('#back-to-top').fadeIn();}else{jQuery('#back-to-top').fadeOut();}});jQuery('#back-to-top').click(function(){jQuery('#back-to-top').tooltip('hide');jQuery('body,html').animate({scrollTop:0},500);return false;});jQuery(".rslides").responsiveSlides({auto:true,speed:2000,timeout:6000,pager:false,nav:false,random:true,pause:false,pauseControls:true,prevText:"Previous",nextText:"Next",maxwidth:"",navContainer:"",manualControls:"",namespace:"rslides",before:function(){},after:function(){}});jQuery('#hdcode').typetype('System.out.println("<?php echo $this->error->getCode(); ?> <?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8');?>");',{e:0.08,t:50,keypress:function(){},callback:function(){}});});</script>
<jdoc:include type="modules" name="debug" />
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v2.6&appId=779740455389966";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>
