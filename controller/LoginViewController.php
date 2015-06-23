<?php

	namespace OnsiteUi\Controller;

	use OnsiteUi\Core\UIController;
	use OnsiteUi\Core\Template;
	
	/**
	 * UIController for Login View
	 * 
	 * @author https://about.me/bastian.kraus
	 */
	class LoginViewController extends UIController {
		
		public function save() {
			// don't forget to overwrite validate() ;-)
		}
		
		public function getHtml() {
			$templ = new Template();
			return $templ->fetch('login.tpl');
		}
		
		public function getName() {
			return 'Login';
		}
		
	}
	
	// return new instance for require_once()
	return new LoginViewController();

?>