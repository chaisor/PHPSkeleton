<?php

	namespace OnsiteUi\Core;

	use Symfony\Component\Routing\RouteCollection;
	use Symfony\Component\Routing\Route;
	
	/**
	 * Generic view
	 * 
	 * @author https://about.me/bastian.kraus
	 */

	class View {
		
		
		/**
		 * View Controller for current view
		 * @var UIController
		 */
		private $controller = null;
		
		/**
		 * CTOR
		 * 
		 * @param OnsiteUi\Core\UIController $controller
		 */
		public function __construct($controller) {
			$this->controller = $controller;
			$this->__init();
		}
		
		/**
		 * Post CTOR
		 * 
		 * Initialize controller and triggering POST requests if required.
		 */
		private function __init() {
			// handle POST requests
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				Logger::info('[View] Handling POST Request...');
				if($this->controller->validate()) {
					Logger::info('[View] Validation successful. Triggering UIController::save() method...');
					$this->controller->save();
				}
			}
		}
		
		/**
		 * Get keywords for <meta/> tag
		 */
		public function getMetaKeywords() {
			return "TODO: keywords";
		}

		/**
		 * Get keywords for <meta/> tag
		 */
		public function getMetaDescription() {
			return "TODO: description";
		}
		
		/**
		 * Render current view
		 * 
		 * @return string rendered html
		 */
		public function render() {
			return $this->controller->getHtml();
		}
		
		/**
		 * Gets the name of the current view
		 * 
		 * @return string name of view
		 */
		public function getName() {
			return $this->controller->getName();
		}
		
	}


?>