<?php defined('_JEXEC') or die;

/**
 * @author     Lukas Schneider
 * @license    GNU GENERAL PUBLIC LICENSE Version 3; see LICENSE
 * @link       https://github.com/Jokr97
 */

class modJIcalHelper {
    public static function getAjax(){
        include 'iCal.php';

		$module = JModuleHelper::getModule('j-ical');
        $params = new JRegistry();
        $params->loadString($module->params);
        
        $color = $params->get('calenderColor', '#ffb128');

        $url = $params->get('calenderUrl', '');
        $iCal = new iCal($url);

        $events = $iCal->events();

        $currentId = 1;

        $result = '<?xml version="1.0"?><monthly>';

        foreach ($events as $event)
        {
            $dateStart = new DateTime($event->dateStart);
            $formattedStartDate = $dateStart->format('Y-n-j');
            $formattedStartTime = $dateStart->format('H:i');

            $dateEnd = new DateTime($event->dateEnd);
            $formattedEndDate = $dateEnd->format('Y-n-j');
            $formattedEndTime = $dateEnd->format('H:i');

            if($formattedEndTime == '00:00'){
                $formattedEndDate = date('Y-n-j', strtotime('-1 day', strtotime($formattedEndDate)));
            }
            if($formattedStartDate == $formattedEndDate){
                $formattedEndDate = '';
            }
            if($formattedStartTime == $formattedEndTime){
                $formattedEndTime = '';
            }
            if($formattedStartTime == '00:00'){
                $formattedStartTime = '';
            }

            $result .= "<event><id>" . $currentId ."</id><name>" . $event->title() . "</name><startdate>" . $formattedStartDate  . "</startdate><enddate>" . $formattedEndDate . "</enddate><starttime>" . $formattedStartTime . "</starttime><endtime>" . $formattedEndTime . "</endtime><color>" . $color . "</color><url></url></event>";
            
            $currentId += 1;
        }

        $result .= "</monthly>";

        return $result;
    }
}