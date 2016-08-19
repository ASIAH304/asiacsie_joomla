<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * This is a file to add template specific chrome to module rendering.  To use it you would
 * set the style attribute for the given module(s) include in your template to use the style
 * for each given modChrome function.
 *
 * eg. To render a module mod_test in the submenu style, you would use the following include:
 * <jdoc:include type="module" name="test" style="submenu" />
 *
 * This gives template designers ultimate control over how modules are rendered.
 *
 * NOTICE: All chrome wrapping methods should be named: modChrome_{STYLE} and take the same
 * two arguments.
 */

/*
 * Module chrome for rendering the module in a submenu
 */
function modChrome_no($module, &$params, &$attribs)
{
	if ($module->content)
	{
		echo $module->content;
	}
}

function modChrome_well($module, &$params, &$attribs)
{
	$moduleTag     = $params->get('module_tag', 'div');
	$bootstrapSize = (int) $params->get('bootstrap_size', 0);
	$moduleClass   = $bootstrapSize != 0 ? ' span' . $bootstrapSize : '';
	$headerTag     = htmlspecialchars($params->get('header_tag', 'h3'));
	$headerClass   = htmlspecialchars($params->get('header_class', 'page-header'));

	if ($module->content)
	{
		echo '<' . $moduleTag . ' class="well ' . htmlspecialchars($params->get('moduleclass_sfx')) . $moduleClass . '">';

			if ($module->showtitle)
			{
				echo '<' . $headerTag . ' class="' . $headerClass . '">' . $module->title . '</' . $headerTag . '>';
			}

			echo $module->content;
		echo '</' . $moduleTag . '>';
	}
}

function modChrome_tabs($module, $params, $attribs){
	$area = isset($attribs['id']) ? (int) $attribs['id'] :'1';
	$area = 'area-'.$area;

	static $modulecount;
	static $modules;

	if ($modulecount < 1)
	{
		$modulecount = count(JModuleHelper::getModules($module->position));
		$modules = array();
	}

	if ($modulecount == 1)
	{
		$temp = new stdClass;
		$temp->content = $module->content;
		$temp->title = $module->title;
		$temp->params = $module->params;
		$temp->id = $module->id;
		$modules[] = $temp;
		// list of moduletitles
		// list of moduletitles
		echo '<div class="announcement">'."\n";
		echo '<ul class="nav nav-tabs tabs-material">'."\n";
		$i = 0;
		foreach ($modules as $rendermodule){
			$class="";
			if( $i == 0){
				$class=' class="active"';
			}
			echo '<li'.$class.'><a href="#tab'.$rendermodule->id.'" data-toggle="tab">'.$rendermodule->title.'</a></li>'."\n";
			$i++;
		}
		echo '</ul>'."\n";
		$counter = 0;
		echo '<div class="tab-content">'."\n";
		// modulecontent
		foreach ($modules as $rendermodule){
			$class="";
			if( $counter == 0){
				$class=' active in';
			}
			echo '<div id="tab'.$rendermodule->id.'" class="tab-pane fade'.$class.'">'."\n";
			echo $rendermodule->content;
			echo '</div>'."\n";
			$counter ++;
		}
		$modulecount--;
		echo '</div>'."\n";
		echo '</div>'."\n";
	} else {
		$temp = new stdClass;
		$temp->content = $module->content;
		$temp->params = $module->params;
		$temp->title = $module->title;
		$temp->id = $module->id;
		$modules[] = $temp;
		$modulecount--;
	}
}
function modChrome_announcement($module, &$params, &$attribs){
	$lang = JFactory::getLanguage();
	$module_params=json_decode($module->params);
    $home_url = "";
  	
    switch($lang->getTag()){
        case "en-GB":
            $home_url = "en/";
        break;

    }
 
	echo '<div class="announcement news_show">';
	echo '<div style="overflow: hidden;">';
	echo '<h3 class="list-title">'.$module->title.'</h3>';
	echo '<a href="'.$home_url.'component/k2/p/'.$module_params->category_id[0].'" class="ui button blue circular btn-more">'.$module_params->itemCustomLinkTitle.'</a>';
	echo '</div><hr />';
	echo $module->content;
	echo '</div>';
	
}

function modChrome_footerlink($module, &$params, &$attribs){
	echo '<div class="otherlink">';
	if ( $module->showtitle ){
		echo '<h2>'.$module->title.'</h2>';
	}
	echo $module->content;
	echo '</div>';
}

function modChrome_welcome($module, &$params, &$attribs){
	echo '<div class="welcome">';
	if ( $module->showtitle ){
		echo '<h2>'.$module->title.'</h2>';
	}
	echo $module->content;
	echo '</div>';
}