<?php
/**
 * @author     Lukas Schneider
 * @license    GNU GENERAL PUBLIC LICENSE Version 3; see LICENSE
 * @link       https://github.com/Jokr97
 */

defined('_JEXEC') or die;

$app = JFactory::getApplication();
$document = JFactory::getDocument();

$script = "
    $(window).load( function() {
        $('#mycalendar').monthly({
            mode: 'event',
            dataType: 'xml',
            disablePast: false,
            eventList: true,
            events: '',
            linkCalendarToEventUrl: false,
            maxWidth: false,
            setWidth: false,
            showTrigger: '',
            startHidden: false,
            stylePast: false,
            target: '',
            useIsoDateFormat: true,
            weekStart: 1,
            xmlUrl: 'http://localhost/ical-test/'
        });
	});
";

$document->addStyleSheet(Juri::base() . 'media/mod_j-ical/css/monthly.css');
$document->addScript(Juri::base() . 'media/mod_j-ical/js/jquery.js');
$document->addScript(Juri::base() . 'media/mod_j-ical/js/monthly.js');
$document->addScriptDeclaration($script);
?>

<div style="width:100%; max-width:600px; display:inline-block;">
    <div class="monthly" id="mycalendar"></div>
</div>