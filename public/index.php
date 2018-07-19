<?php
	session_start();
	//chargement de l'autoloader pour la gestion automatique des classes

	define('ROOT', dirname(__DIR__));
	require ROOT.'/app/App.php';


	\App\App::load();
	//definition d'une variable pour stocker la base de donner
	$bd = \App\App::getInstance()->getDatabase();

	//definition d'une instancce de la classe manager
	$usM = new App\UserManager($bd);

	$user;



	/*
	*
	*la gestion de la variable $p
	*pour gerer plusieurs pages
	*ainsi la gestion en php est
	*100 plus pratique que jamais
	*/

	if(isset($_GET['p']))
	{
		//si notre variable est definie on la met dans une autre
		$p = $_GET['p'];
	}
	else
	{
		//dans le cas contraire on initialise la page d'accueil par defaut
		$p = 'home';
	}


	//ob_start pour executer la page comme dans la variable
	ob_start();

	//un switch pour tout controle dans notre index.php
	switch($p){
    case 'home':
		require '../pages/home.php';
		break;
	case "inscription":
		require '../pages/register.php';
		break;
	case "connexion":
		require '../pages/login.php';		
		break;
	case 'services':
		require '../pages/profil.php';
		break;
	case 'hopital':
		require '../pages/mail.php';
			break;
	case 'pharmacie':
		require '../pages/pseudo.php';
			break;
	case 'clinique':
		require '../pages/mdp.php';
			break;	
	case "medecin":
		require '../pages/about.php';
		break;
	case 'formation':
		require '../pages/login.php';


	//ob_clean pour terminer le processus dans la variable
	$content = ob_get_clean();

	//defini le template pour executer la page courrante
	require('../pages/template/default.php');