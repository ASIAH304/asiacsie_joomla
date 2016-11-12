<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Output as HTML5
$doc->setHtml5(true);
$dontInclude = array(
	JURI::root(true).'/media/jui/js/jquery-migrate.js',
	JURI::root(true).'/media/jui/js/jquery-migrate.min.js',
	JURI::root(true).'/media/jui/js/bootstrap.js',
	JURI::root(true).'/media/jui/js/bootstrap.min.js',
	JURI::root(true).'/media/system/js/core-uncompressed.js',
	JURI::root(true).'/media/system/js/tabs-state.js',
	JURI::root(true).'/media/system/js/core.js',
	JURI::root(true).'/media/system/js/mootools-core.js',
	JURI::root(true).'/media/system/js/mootools-core-uncompressed.js',
	JURI::root(true).'/media/system/js/mootools-more-uncompressed.js',
	JURI::root(true).'/media/system/js/modal-uncompressed.js',
	JURI::root(true).'/media/system/js/caption.js',
	JURI::root(true).'/media/system/js/caption-uncompressed.js',
	JURI::root(true).'/media/k2/assets/js/jquery.magnific-popup.min.js?v2.7.1',
	JURI::root(true).'/media/k2/assets/js/k2.frontend.js?v2.7.1&amp;sitepath='.JURI::root(true).'/'
);
foreach($doc->_scripts as $key => $script){
	if(in_array($key, $dontInclude)){unset($doc->_scripts[$key]);}
}
unset($this->_styleSheets[$this->baseurl .'/media/k2/assets/css/magnific-popup.css?v2.7.1']);
unset($this->_script['text/javascript']);
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/bootstrap.min.js', 'text/javascript');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/bootstrap.min.css');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/style.css');
$doc->addStyleSheet('//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', $type = 'text/css', $media = 'screen,projection');
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="HandheldFriendly" content="true" />
	<jdoc:include type="head" />
	<link rel="stylesheet" href="<?php echo $this->baseurl . '/templates/' . $this->template . '/assets/css/main.css'?>" />
</head>
<body class="contentpane modal">
	<jdoc:include type="message" />
	<jdoc:include type="component" />
</body>
</html>
