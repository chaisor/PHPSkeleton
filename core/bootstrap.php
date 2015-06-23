<?php 

	/**
	 * Bootstrap
	 * 
	 * @author https://about.me/bastian.kraus
	 */

	use OnsiteUi\Core\Logger;

	include_once('Util.php');
	
	set_error_handler('sys_error_handler');
	set_exception_handler('sys_exception_handler');

	date_default_timezone_set('Europe/Berlin');
	
	// Determine current server operating system
	define('SYS_OS_WIN',    1);
	define('SYS_OS_UNIX',   2);
	
	if(strpos(strtolower($_SERVER['SERVER_SOFTWARE']),'win32') !== false){
		define('SYS_OS', SYS_OS_WIN);
	}else{
		define('SYS_OS', SYS_OS_UNIX);
	}
	if(SYS_OS == SYS_OS_WIN){
		$_cwd = str_replace('\\','/', getcwd());
		$_a_cwd = explode('/',$_cwd);
	}else{
		$_a_cwd = explode('/',substr(getcwd(),1));
	}
	
	// Setup SYS_PATH, SYS_CONTEXT and SYS_URL
	$_b_loop = true;
	$_s_basepath = '';
	while($_b_loop){
		if(SYS_OS == SYS_OS_UNIX) $_s_checkPath = '/'.implode('/', $_a_cwd);
		else $_s_checkPath = implode('/', $_a_cwd);
		if(file_exists($_s_checkPath.'/root.php')){
			$_s_basepath = $_s_checkPath.'/';
			$_b_loop = false;
		}else{
			if(count($_a_cwd) > 0){
				$_a_cwd = array_slice($_a_cwd,0,count($_a_cwd)-1);
			}else{
				break;
			}
		}
	}
	define('SYS_BASEPATH',   			$_s_basepath);
	define('SYS_URL', 					$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["SERVER_NAME"]);
	
	define('SYS_VIEWS', 				'views');
	define('SYS_VIEWS_CACHE_BASE',		SYS_BASEPATH.'tmp/smarty/');
	define('SYS_VIEWS_TEMPLATE_BASE',	SYS_BASEPATH.'views/');
	define('SYS_VIEW_FILES', 			'view_files');
	define('SYS_CONTEXT',				'context');
	
	define('MODEL_REST_BASEPATH',		'http://localhost:8080/data/rest');
	
	// Setup dates and times
	define('TIME',						time());
	define('TIME_ONE_DAY',				86400);
	define('DATE_TODAY',				date('Y-m-d', TIME));
	define('DATETIME_NOW',				date('Y-m-d H:i:s', TIME));
	define('DATE_TOMORROW',				date('Y-m-d', (TIME+86400)));
	define('DATE_YESTERDAY',			date('Y-m-d', (TIME-86400)));
	define('DATE_DAYBEVOREYESTERDAY',	date('Y-m-d', (TIME-172800)));
	define('DATE_HOUR', 				date('G', TIME));
	
	// DEBUGGING
	define('COOKIE_DEBUG',				'cdbg');
	define('REQUEST_ENABLE_DEBUG',		'edbg');
	
	if(array_key_exists(REQUEST_ENABLE_DEBUG, $_GET) && $_GET[REQUEST_ENABLE_DEBUG] == '1'){
		echo setcookie(COOKIE_DEBUG, 1, time() + 86400 * 31,'/',($_SERVER["HTTP_HOST"] == 'localhost' ? null : $_SERVER["HTTP_HOST"]));
		$_COOKIE[COOKIE_DEBUG] = 1;
	}elseif(array_key_exists(REQUEST_ENABLE_DEBUG, $_GET) && $_GET[REQUEST_ENABLE_DEBUG] == '0'){
		echo setcookie(COOKIE_DEBUG, 1, time() - 3600,'/',($_SERVER["HTTP_HOST"] == 'localhost' ? null : $_SERVER["HTTP_HOST"]));
		$_COOKIE[COOKIE_DEBUG] = '';
	}
	if(array_key_exists(COOKIE_DEBUG, $_COOKIE) && $_COOKIE[COOKIE_DEBUG] == 1) define('__DEBUG__',1);
	
	// Request names
	define('REQUEST_USER',				'u');
	define('REQUEST_PASSWORD',			'p');
	
	// Cookie names
	define('COOKIE_AUTH',				'ca');
	
	// Start session
	session_start();
	
	// Start output buffer
	ob_start();
	
	// Include Logger
	include_once(SYS_BASEPATH."/core/Logger.php");
	
	if(defined('__DEBUG__')) {
		Logger::info('Onsite UI bootstrap:');
		
		Logger::info('DATETIME_NOW: '.DATETIME_NOW);
		Logger::info('DOCUMENT_ROOT: '.$_SERVER['DOCUMENT_ROOT']);
		Logger::info('SYS_BASEPATH: '.SYS_BASEPATH);
		Logger::info('SYS_URL: '.SYS_URL);
	
		if(SYS_OS == SYS_OS_UNIX)
			Logger::info('Current OS: Linux / Unix OS');
		else
			Logger::info('Current OS: Win32 based OS');
	}
	
?>