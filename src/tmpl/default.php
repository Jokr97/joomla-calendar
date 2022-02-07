<?php
/**
 * @author     Lukas Schneider
 * @license    GNU GENERAL PUBLIC LICENSE Version 3; see LICENSE
 * @link       https://github.com/Jokr97
 */

defined('_JEXEC') or die;

$domain = $params->get('domain', 'https://www.joomla.org');
?>

<a href="<?php echo $domain; ?>">
	<?php echo '[PROJECT_NAME]'; ?>
</a>