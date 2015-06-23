<?php

	namespace OnsiteUi\Controller;

	use OnsiteUi\Core\UIController;
	use OnsiteUi\Core\Template;
	
	/**
	 * UIController for Billing View
	 * 
	 * @author https://about.me/bastian.kraus
	 */
	class BillingViewController extends UIController {
		
		public function save() {
			// don't forget to overwrite validate() ;-)
		}
		
		public function getHtml() {
			$templ = new Template();
			return $templ->fetch('billing.tpl');
		}
		
		public function getName() {
			return 'Billing';
		}
		
	}
	
	// return new instance for require_once()
	return new BillingViewController();

?>