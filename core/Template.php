<?php

	namespace OnsiteUi\Core;
	
	use \Smarty as Smarty;

	/**
	 * Smarty Template Wrapper
	 * 
	 * @author https://about.me/bastian.kraus
	 */

	class Template extends Smarty {
		
		/**
		 * CTOR for Template Initialization
		 */
		public function __construct() {
			parent::__construct();
			
			$this->template_dir = SYS_BASEPATH.'views';
			$this->compile_dir = SYS_VIEWS_CACHE_BASE.'templates_c';
			$this->config_dir = SYS_VIEWS_CACHE_BASE.'configs';
			$this->cache_dir = SYS_VIEWS_CACHE_BASE.'cache';
			
			// POST CTOR
			$this->__init();
			$this->__context();
		}
		
		/**
		 * Post CTOR for directory initialization
		 */
		private function __init() {
			if(defined('__DEBUG__')) Logger::info('[Template] Checking compile_dir: '.$this->compile_dir);
			if(!file_exists($this->compile_dir))
				if (!mkdir($this->compile_dir, 0777, true))
					throw new Exception("Smarty compile dir '$this->compile_dir' could not be created.");
				
			if(defined('__DEBUG__')) Logger::info('[Template] Checking config_dir: '.$this->config_dir);
			if(!file_exists($this->config_dir[0]))
				if (!mkdir($this->config_dir[0], 0777, true))
					throw new Exception("Smarty config_dir dir '$this->config_dir[0]' could not be created.");
				
			if(defined('__DEBUG__')) Logger::info('[Template] Checking cache_dir: '.$this->cache_dir);
			if(!file_exists($this->cache_dir[0]))
				if (!mkdir($this->cache_dir[0], 0777, true))
					throw new Exception("Smarty cache_dir dir '$this->cache_dir[0]' could not be created.");
		}
		
		/**
		 * Post CTOR for building a templates default context
		 */
		private function __context() {
			$this->assign('ctx', Context::getInstance());
		}
		
		/**
		 * (non-PHPdoc)
		 * @see Smarty::fetch()
		 */
		public function fetch($s_template, $s_templatePath = '') {
			if($s_templatePath != '')
				$s_template = SYS_VIEWS_TEMPLATE_BASE.$s_templatePath.'/'.$s_template;
			else
				$s_template = SYS_VIEWS_TEMPLATE_BASE.$s_template;
				
			if(defined('__DEBUG__'))
				Logger::info('Fetched template: '. $s_template);
			return parent::fetch($s_template);
		}
		
	}

?>