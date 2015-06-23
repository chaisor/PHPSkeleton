<?php

	namespace OnsiteUi\Controller;
	
	use OnsiteUi\Core\UIController;
	use OnsiteUi\Core\Template;

	/**
	 * UIController for Account View
	 * 
	 * @author https://about.me/bastian.kraus
	 */
	class AccountViewController extends UIController {

		public function save() {
			// don't forget to overwrite validate() ;-)
		}
		
		public function getHtml() {
			$templ = new Template();
			return $templ->fetch('account.tpl');
		}
		
		public function getName() {
			return 'Account';
		}
		
	}
	
	// return new instance for require_once()
	return new AccountViewController();

?>