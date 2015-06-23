<?php

	namespace OnsiteUi\Core;

	/**
	 * Logger facility<br/>
	 *
	 * @author https://about.me/bastian.kraus
	 */
	class Logger {
		
		/**
		 * Logger Counter
		 * 
		 * @var 
		 */
		private static $_logc = 0;
		
		/**
		 * Log Store
		 */
		private static $_logs = array();
		
		/**
		 * Log given $msg into log container defined by $type
		 * 
		 * @param $type
		 * @param $msg
		 * @return void
		 */
		private static function log($type, $msg) {
			switch($type) {
				case LOG_WARNING: $logtype = 'WARN'; break;
				case LOG_ERR: $logtype = 'ERROR'; break;
				case LOG_INFO: 
				default:
					$logtype = 'INFO'; 
				break;
			}
			
			Logger::$_logs[] = '['.DATETIME_NOW.']['.++Logger::$_logc.']['.$logtype.'] '.$msg;
		}
		
		/**
		 * Log given $msg into info log container
		 *
		 * @param $msg
		 * @return void
		 */		
		public static function info($msg) {
			Logger::log(LOG_INFO, $msg);
		}
		
		/**
		 * Log given $msg into warn log container
		 *
		 * @param $msg
		 * @return void
		 */
		public static function warn($msg) {
			Logger::log(LOG_WARNING, $msg);
		}
		
		/**
		 * Log given $msg into warn log container
		 *
		 * @param $msg
		 * @return void
		 */
		public static function error($msg) {
			Logger::log(LOG_ERR, $msg);
		}
		
		/**
		 * Get log container
		 * @return array
		 */
		public static function getLogContainer() {
			return Logger::$_logs;
		}
		
	}

?>