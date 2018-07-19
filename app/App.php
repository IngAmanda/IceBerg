<?php

	namespace App;

		class App
		{

			//une variable pour stocker une instance de App
			public $title ="Sante Plus Plus";

			private static $_instance;

			private $_db;




			//function static pour generer une seule instance de notre classe 
			//durant tout le temps de notre connection
			public function getInstance()
			{

				if(is_null(self::$_instance))
				{

					self::$_instance = new App();
				}

				return self::$_instance;

			}

			public static function load()
			{
				require ROOT.'/app/Autoloader.php';
				Autoloader::register();

			}

			public function getDatabase()
			{

				$config = Config::getInstance();
				

				if(is_null($this->_db))
				{

					$this->_db = new Database($config->get('db_name'),$config->get('db_user'),$config->get('db_pass'),$config->get('db_host'));

				}

				return $this->_db;			

			}

		}
