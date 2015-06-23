<?php

	use OnsiteUi\Core\Template;
	use OnsiteUi\Core\View;
	use OnsiteUi\Core\Context;
	
	/**
	 * index.php - Web Endpoint
	 * 
	 * @author https://about.me/bastian.kraus
	 */

	require_once('inc.php');

	global $context;

	// initialize view
	$view = Context::getInstance()->getView();

	// render view content into body and echo to output buffer
	$body_template = new Template();
	$body_template->assign('view', $view);
	$body_template->assign('body', $view->render());
	echo $body_template->fetch('body.tpl');

	// post apocalyptic output buffer explosion and debug logbrain dumping
	require_once(SYS_BASEPATH.'core/eof.php');

?>