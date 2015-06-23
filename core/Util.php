<?php

	use OnsiteUi\Core\Logger;

	/*
	 * Utility Library
	 * 
	 * @author https://about.me/bastian.kraus
	 */

	/**
	 * Default error handler callback
	 * 
	 * @param int 		$i_errno
	 * @param string 	$s_errmsg
	 * @param string 	$s_errfile
	 * @param int		$i_err_lineno
	 * @return void
	 */
	function sys_error_handler($i_errno, $s_errmsg, $s_errfile, $i_err_lineno){
		$e = null;

		switch($i_errno){
			case E_ERROR:
				$s_errtype = 'Fatal Error';
				break;
			case E_WARNING:
				$s_errtype = 'Error';
				break;
			default:
				$s_errtype = $i_errno;
				break;
		}
		if($i_errno != E_NOTICE && $i_errno != E_STRICT){
			$s_exception_text = sprintf('%s in line %s of file %s.<br />Reason: %s', $s_errtype, $i_err_lineno, $s_errfile, $s_errmsg);
			$e = new Exception($s_exception_text);
		}
		
		if($e != null){
			if(array_key_exists('error_reporting', $_GET) && $_GET['error_reporting'] == 'die'){
				echo('<pre>');
				die($e->__toString());
			}else{
				if(defined('__DEBUG__'))
					echo $e->__toString();
				Logger::error($e->__toString());
			}
		}
	}
	
	/**
	 * Catch unhandled exceptions.
	 * 
	 * @param Exception $e
	 */
	function sys_exception_handler($e) {
		if($e != null){
			if(array_key_exists('error_reporting', $_GET) && $_GET['error_reporting'] == 'die'){
				echo('<pre>');
				die($e->__toString());
			}else{
				if(defined('__DEBUG__'))
					echo $e->__toString();
				Logger::error($e->__toString());
			}
		}
	}
	
	/**
	 * Get microtime as float
	 * 
	 * @return float
	 */
	function fGetMicrotime(){
		list($usec, $sec) = explode(' ', microtime());
		return ((float) $usec + (float) $sec);
	}
	
	/**
	 * Convert a str to dec
	 * @param str $sString
	 * @return number
	 */
	function strdec($s_str) {
		return intval(base_convert($s_str, 35, 10));
	}
	
	/**
	 * Convert a number to str
	 * @param str $nZahl
	 * @return string
	 */
	function decstr($nZahl) {
		return base_convert(intval($nZahl), 10, 35);
	}
	
	/**
	 * Escapes and clears given string
	 *
	 * Options:
	 * - filterHtml 	=> strip_tags(str)
	 * - notEscape 		=> dont escapes ' with \'
	 * - likeSearch		=> escapes % and _ for mysql LIKE wildcard '%'
	 * - htmlEncode		=> htmlentities(str)
	 * 
	 * @param 	string 		$s_text
	 * @param 	int 		$i_maxlength
	 * @param 	array		$a_options
	 * @return 	string		cleaned text
	 * 
	 */
	function escapeString($s_text, $i_maxlength=0, $a_options=array()) {
	
		$s_text = str_replace("\r", '', $s_text);
		$s_text = str_replace("\x00", '', $s_text);
		$s_text = str_replace("\x1a", '', $s_text);
	
		if(array_search('filterHtml', $a_options,true) !== false)
			$s_text = strip_tags($s_text);
		
		if(array_search('htmlEncode', $a_options,true) !== false)
			$s_text = htmlentities($s_text);
	
		$s_text = stripslashes(trim($s_text));

		if($i_maxlength > 0)
			$s_text = substr($s_text, 0, $i_maxlength);
		
		if(array_search('notEscape', $a_options,true) === false)
			$s_text = str_replace("'","\'",$s_text);

		if(array_search('likeSearch', $a_options,true) !== false) {
			$s_text = str_replace('%', '\%', $s_text);
			$s_text = str_replace('_', '\_', $s_text);
		}
	
		return $s_text;
	}
	
	function escapeStringForLikeSearch($sText, $nMaximalLaenge=0){
		return s_cleanText($sText, $nMaximalLaenge, array('likeSuche' => true));
	}

?>