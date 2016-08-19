<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_languages
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('stylesheet', 'mod_languages/template.css', array(), true);
?>
<div class="pull-right" id="site_lang">
<?php foreach ($list as $language) : ?>
	<?php if ($params->get('show_active', 0) || !$language->active):?>
	<a href="<?php echo $language->link;?>" class="<?php echo $language->active ? 'active' : '';?>">
		<?php echo $params->get('full_name', 1) ? $language->title_native : strtoupper($language->sef);?>
	</a>
	<?php endif;?>
<?php endforeach;?>
</div>
