<?php

	namespace OnsiteUi\Core;

	/**
	 * Interface: UI Controller
	 * 
	 * @author https://about.me/bastian.kraus
	 */
	abstract class UIController {
		
		/**
		 * Validates request params before save()
		 * 
		 * @return boolean
		 */
		public function validate() {
			return true;
		}
		
		/**
		 * Handles HTTP Post Request
		 * 
		 * @return void
		 */
		abstract public function save();
		
		/**
		 * Render view
		 */
		abstract public function getHtml();
		
		/**
		 * Get Name of Current View
		 */
		abstract public function getName();
		
	}

?>