<?php
/**
 * @author     Lukas Schneider
 * @license    GNU GENERAL PUBLIC LICENSE Version 3; see LICENSE
 * @link       https://github.com/Jokr97
 */

use Joomla\CMS\Helper\ModuleHelper;

defined('_JEXEC') or die;

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require ModuleHelper::getLayoutPath('mod_j-ical', $params->get('layout', 'default'));
