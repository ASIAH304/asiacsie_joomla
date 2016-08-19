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
$this->language  = $doc->language;
$this->direction = $doc->direction;
$this->_script = $this->_scripts = array();
// Add JavaScript Frameworks
// JHtml::_('bootstrap.framework');

// Add Stylesheets
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/bootstrap.min.css');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/template.css');
$doc->addStyleSheet('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', $type = 'text/css', $media = 'screen,projection');
// Load optional RTL Bootstrap CSS
// JHtml::_('bootstrap.loadCss', false, $this->direction);
$doc->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', 'text/javascript');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/bootstrap.min.js', 'text/javascript');
unset($doc->_scripts[JURI::root(true).'/media/jui/js/bootstrap.min.js']);
// // Load optional rtl Bootstrap css and Bootstrap bugfixes
// JHtmlBootstrap::loadCss($includeMaincss = false, $this->direction);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<jdoc:include type="head" />
<!--[if lt IE 9]>
	<script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script>
<![endif]-->
</head>
<body class="container">
	<jdoc:include type="message" />
	<jdoc:include type="component" />
</body>
</html>
