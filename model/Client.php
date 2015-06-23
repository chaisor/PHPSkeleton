<?php

	namespace OnsiteUi\Model;

	/**
	 * Model: Client
	 * 
	 * @author https://about.me/bastian.kraus
	 */

	class Client {

		private $id;
		private $name;
		private $password;
		private $firstname;
		private $lastname;
		private $email;

		public function getId() {
			return $this->id;
		}
		public function setId($id) {
			$this->id = $id;
		}

		public function getName() {
			return $this->name;
		}
		public function setName($name) {
			$this->name = $name;
		}
		
		public function getPassword() {
			return $this->password;
		}
		public function setPassword($password) {
			$this->password = $password;
		}
		
		public function getEmail() {
			return $this->email;
		}
		public function setEmail($email) {
			$this->email = $email;
		}
		
		public function getFirstname() {
			return $this->firstname;
		}
		public function setFirstname($firstname) {
			$this->firstname = $firstname;
		}
		
		public function getLastname() {
			return $this->lastname;
		}
		public function setLastname($lastname) {
			$this->lastname = $lastname;
		}
		
		/**
		 * Reads all available Clients from RESTful Persistence API
		 *
		 * @return array(Client)
		 */
		public static function getAllClients() {
			$pest = new PestJSON(MODEL_REST_BASEPATH);
			return $pest->get('/client/all');
		}
		
	}

?>