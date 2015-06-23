<?php 

	use Symfony\Component\Routing\RouteCollection;
	use Symfony\Component\Routing\Route;

	/**
	 * Available Views Mapping / Routing
	 * 
	 * @author https://about.me/bastian.kraus
	 */

	global $views;
	
	define('VIEW_HOME',				'home');
	define('VIEW_LOGIN',			'login');
	define('VIEW_SIGNUP',			'signup');
	define('VIEW_FORGOTPASSWORD',	'forgot-password');
	define('VIEW_ACCOUNT',			'account');
	define('VIEW_BILLING',			'billing');
	define('VIEW_CHANNELS',			'channels');
	define('VIEW_MODERATION',		'moderation');

	define('VIEW_PATH_HOME',			'/');
	define('VIEW_PATH_LOGIN',			'/'.VIEW_LOGIN);
	define('VIEW_PATH_SIGNUP',			'/'.VIEW_SIGNUP);
	define('VIEW_PATH_FORGOTPASSWORD',	'/'.VIEW_FORGOTPASSWORD);
	define('VIEW_PATH_ACCOUNT',			'/'.VIEW_ACCOUNT);
	define('VIEW_PATH_BILLING',			'/'.VIEW_BILLING);
	define('VIEW_PATH_CHANNELS',		'/'.VIEW_CHANNELS);
	define('VIEW_PATH_MODERATION',		'/'.VIEW_MODERATION);
	
	// symfony based view routing
	$GLOBALS[SYS_VIEWS] = new RouteCollection();
	$GLOBALS[SYS_VIEWS]->add(VIEW_HOME, new Route(VIEW_PATH_HOME,array('controller' => 'AccountViewController')));
	$GLOBALS[SYS_VIEWS]->add(VIEW_LOGIN, new Route(VIEW_PATH_LOGIN,array('controller' => 'LoginViewController')));
	$GLOBALS[SYS_VIEWS]->add(VIEW_SIGNUP, new Route(VIEW_PATH_SIGNUP,array('controller' => 'SignupViewController')));
	$GLOBALS[SYS_VIEWS]->add(VIEW_FORGOTPASSWORD, new Route(VIEW_PATH_FORGOTPASSWORD,array('controller' => 'SignupViewController')));
	$GLOBALS[SYS_VIEWS]->add(VIEW_ACCOUNT, new Route(VIEW_PATH_ACCOUNT,array('controller' => 'AccountViewController')));
	$GLOBALS[SYS_VIEWS]->add(VIEW_BILLING, new Route(VIEW_PATH_BILLING,array('controller' => 'BillingViewController')));
	$GLOBALS[SYS_VIEWS]->add(VIEW_CHANNELS, new Route(VIEW_PATH_CHANNELS,array('controller' => 'ChannelsViewController')));
	$GLOBALS[SYS_VIEWS]->add(VIEW_MODERATION, new Route(VIEW_PATH_MODERATION,array('controller' => 'ModerationViewController')));

?>