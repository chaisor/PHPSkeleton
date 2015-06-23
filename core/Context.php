<?php 

	namespace OnsiteUi\Core;

	use Symfony\Component\Routing\Matcher\UrlMatcher;
	use Symfony\Component\Routing\RequestContext;
	use Symfony\Component\Routing\RouteCollection;
	use Symfony\Component\Routing\Route;
	
	use Symfony\Component\HttpFoundation\ApacheRequest;
	
	use OnsiteUi\Model\Client;
	
	/**
	 * Onsite Context Class
	 * 
	 * Despites the application context as a singleton class.
	 * 
	 * @author https://about.me/bastian.kraus
	 */
	class Context {
		
		/**
		 * Singleton instance store
		 * @var Context
		 */
		private static $_instance = null;
		public static function getInstance() {
			if(Context::$_instance === null) Context::$_instance = new Context();
			return Context::$_instance;
		}
		
		/**
		 * Request Context
		 * 
		 * @var Symfony\Component\Routing\RequestContext
		 */
		private $ctx = null;
		
		/**
		 * Current Request
		 * 
		 * @var Symfony\Component\HttpFoundation\Request
		 */
		private $request = null;
		
		/**
		 * Current view
		 * 
		 * @var str
		 */
		private $view = null;
		
		/**
		 * Current user
		 * 
		 * @var OnsiteUi\
		 */
		private $user = null;
		
		/**
		 * CTOR for creating application context
		 */
		private function __construct() {
			$this->__authenticate();
			
			$this->request = ApacheRequest::createFromGlobals();
			$this->ctx = (new RequestContext())->fromRequest($this->request);
			
			$this->__parseContextPath();
		}
		
		/**
		 * Helper: authenticate user
		 */
		private function __authenticate() {
			$this->user = new Client();
			
			// demo data
			$this->user->setId(123);
			$this->user->setName('admin');
			$this->user->setEmail('admin@test.de');
			$this->user->setPassword('coolpw');
			$this->user->setFirstname('Sepp');
			$this->user->setLastname('Hintermeier');
		}
		
		/**
		 * Helper: parse path info from Symfony\Component\HttpFoundation\Request
		 * and extract the current view
		 */
		private function __parseContextPath() {
			$matcher = new UrlMatcher($GLOBALS[SYS_VIEWS], $this->ctx);
			$params = $matcher->match($this->request->getPathInfo());
			$this->view = new View(require_once(SYS_BASEPATH.'controller/'.$params['controller'].'.php'));
			
			if(defined('__DEBUG__'))
				Logger::info('[Context] Current view: '.$this->view->getName());
		}
		

		/**
		 * Returns the view label of current context
		 * 
		 * @return string View label of current context
		 */
		public function getView() {
			return $this->view;
		}
		
		/**
		 * Returns the current authenticated User
		 * 
		 * @return Client current authenticated User
		 */
		public function getUser() {
			return $this->user;
		}
		
		/**
		 * Returns the current HTTP Request
		 * 
		 * @return Symfony\Component\HttpFoundation\ApacheRequest
		 */
		public function getRequest() {
			return $this->request;
		}
		
	}

?>