<?php

	namespace OnsiteUi\Controller;

	use OnsiteUi\Core\UIController;
	use OnsiteUi\Core\Template;
	
	/**
	 * UIController for Channels View
	 * 
	 * @author https://about.me/bastian.kraus
	 */
	class ChannelsViewController extends UIController {
		
		public function save() {
			// don't forget to overwrite validate() ;-)
		}
		
		public function getHtml() {
			$templ = new Template();
			return $templ->fetch('channels.tpl');
		}
		
		public function getName() {
			return 'Channels';
		}
		
	}
	
	// return new instance for require_once()
	return new ChannelsViewController();

?>