<?php 

	use OnsiteUi\Core\Logger;

	/**
	 * Request finalizer
	 * 
	 * @author https://about.me/bastian.kraus
	 */

	// finalize output buffer and flush to STDOUT
	ob_end_flush();
	
	if(defined('__DEBUG__')) {
		$a_logs = Logger::getLogContainer();
		echo '<pre id="debug">';
		print_r($a_logs);
		echo '</pre>';
	}
	
?>