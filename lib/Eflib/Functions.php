<?php
/**
 *
 * Collection of various PHP functions.  
 * 
 * @Author Janar Jürisson 
 * 
 */


/**
 * Simple function which outputs variable content in print_r style with
 * <pre> tag surrounding it, so in browser it will be in more readable form. 
 * 
 * @param mixed $data
 * @param string $title
 * 
 * @return void
 */
function pre($data, $title = '') {
	echo '<b>' . $title . '</b>';
	echo '<pre>' . print_r($data, true) . '</pre>';
}


/**
 * Returns object with timeparts in "estimated time of arrival" fashion
 * For example 3727 seconds will return object containing
 * fallowing variables and values
 * ESTIMATED TIME OF ARRIVAL
 * years => 0
 * months => 0
 * days => 0
 * hours => 1
 * minutes => 2
 * seconds => 7
 * 
 * AFAIK there is a simpler PHP5 solution also with DateInterval class
 * This functions handles months as 30 days long
 * might be interested also in fallowing topic
 * http://stackoverflow.com/questions/7379543/hhmm-to-seconds
 * 
 * @param Integer $time Parsable seconds
 * 
 * @return Object
 */
function secondsToEta($time){
	
	$keys    = array("years", "months", "days", "hours", "minutes", "seconds");
	$lengths = array(31104000, 2592000, 86400, 3600, 60, 1);
	
	$obj = new stdClass();
	
	for($i = 0; count($lengths) > $i; $i++) {
		$key = $keys[$i];
		$obj->$key = 0;
		if($time > $lengths[$i]){
			$cnt = floor($time / $lengths[$i]);
			$time = $time - ($cnt * $lengths[$i]);
			$obj->$key = $cnt;
		}
	}
	
	return $obj;
	
}


/**
 * Returns string in "estimated time of arrival" fashion from seconds
 * For example 3727 seconds would return fallowing string
 * 
 * 1h 2min 7s 
 * 
 * This functions handles months as 30 days long
 * 
 * @param Integer $time Parsable seconds
 * @param Integer $newTrans Overrides default "translations"
 * 
 * @return String
 */
function secondsToEtaString($time, $newTrans = array()){
	$obj = secondsToEta($time);
	
	$trans = array(
		'years' => ' years ',
		'months' => ' months ',
		'days' => ' days ',
		'hours' => 'h ',
		'minutes' => 'min ',
		'seconds' => 's',
	);
	
	$trans = array_merge($trans, $newTrans);
	
	//TODO: this part should be simplified little more
	if($obj->years > 0){
		return $obj->years . $trans['years'] . 
			$obj->months . $trans['months'] .  
			$obj->days . $trans['days'] . 
			$obj->hours . $trans['hours'] . 
			$obj->minutes . $trans['minutes'] . 
			$obj->seconds . $trans['seconds'];
	} else if($obj->months > 0){
			return $obj->months . $trans['months'] .  
			$obj->days . $trans['days'] . 
			$obj->hours . $trans['hours'] . 
			$obj->minutes . $trans['minutes'] . 
			$obj->seconds . $trans['seconds'];
	} else if($obj->days > 0){
		return $obj->days . ' days ' . 
			$obj->hours . $trans['hours'] . 
			$obj->minutes . $trans['minutes'] . 
			$obj->seconds . $trans['seconds'];
	} else if($obj->hours > 0){
		return $obj->hours . $trans['hours'] . 
			$obj->minutes . $trans['minutes'] . 
			$obj->seconds . $trans['seconds'];
	} else if ($obj->minutes > 0) {
		return $obj->minutes . $trans['minutes'] . 
			$obj->seconds . $trans['seconds'];
	} else {
		return $obj->seconds . $trans['seconds'];
	}
}

