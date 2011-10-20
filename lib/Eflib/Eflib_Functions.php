<?php
/**
 *
 * Collection of various functions.
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