<?php

	namespace OnsiteUi\Controller;

	use OnsiteUi\Core\UIController;
	use OnsiteUi\Core\Template;
	
	/**
	 * UIController for Moderation View
	 * 
	 * @author https://about.me/bastian.kraus
	 */
	class SignupViewController extends UIController {
		
		public function save() {
			// don't forget to overwrite validate() ;-)
		}
		
		public function getHtml() {
			$templ = new Template();
			return $templ->fetch('moderation.tpl');
		}
		
		public function getName() {
			return 'Signup';
		}
		
	}
	
	// return new instance for require_once()
	return new SignupViewController();

?>