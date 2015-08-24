<?php
session_start();

$squelette = "views/home.php";
$logo = "";
$libelle = "";
$entreprise = "";
/**
 * Vérification des différentes actions reçues 
 */
if(isset($_GET['action']))
{
	switch($_GET['action'])
	{
		case "offer-detail":			
			
			if(isset($_GET['company']) && $_GET['company']!="none")
			{
				$squelette = 'views/offer-description.php';
				
				switch($_GET['company'])
				{
					case "orange":
						$logo = '<a href="index.php?action=company-profile&cname=orange"><img alt="entp-img" src="img/entreprises/orange.jpg"/></a>';						
						$libelle = "Développeur web H/F (Symfony2)";
						$entreprise = "Orange";
						break;
					case "atos":
						$logo = '<a href="index.php?action=company-profile&cname=atos"><img alt="entp-img" src="img/entreprises/atos.jpg"/></a>';
						$libelle = "Développeur web H/F HTML5/CSS3";
						$entreprise = "Atos";
						break;
					case "laposte":
						$logo = '<a href="index.php?action=company-profile&cname=laposte"><img alt="entp-img" src="img/entreprises/laposte.png"/></a>';
						$libelle = "Développeur web H/F Frontend";
						$entreprise = "Laposte";
						break;
					case "free":
						$logo = '<a href="index.php?action=company-profile&cname=free"><img alt="entp-img" src="img/entreprises/free.jpg"/></a>';
						$libelle = "Développeur web H/F Backend";
						$entreprise = "Free";
						break;
					default:
						echo "No compagny matched";
						break;
				}
			}
			else 
				$squelette = 'views/empty-offer-description.html';
			
			break;
			
		case "add-offer":
			$squelette = 'views/add-offer.php';
			break;
			
		case "login":
			$squelette = 'views/login.php';
			break;
		
		case "signup":
			$squelette = 'views/signup.php';
			break;
			
		case "contact":
			$squelette = 'views/contact.php';
			break;
			
		case "about":
			$squelette = 'views/about.php';
			break;
			
		case "company-profile":
			
			if(isset($_GET['cname']))
			{
				$squelette = 'views/company-profile.php';
				
				switch($_GET['cname'])
				{
					case "orange":
						$logo = "img/entreprises/orange.jpg";
						$raison_sociale = "orange";
						$activite = "Télécommunications filaire";
						$categorie = "Telecom";
						$nationalite = "france";
						$siret = "38012986646850";
						break;
						
					case "atos":
						$logo = "img/entreprises/atos.jpg";
						$raison_sociale = "Atos";
						$activite = "Activités des sièges sociaux";
						$categorie = "Finance";
						$nationalite = "france";
						$siret = "32362360300442 ";
						break;
						
					case "laposte":
						$logo = "img/entreprises/laposte.png";
						$raison_sociale = "Laposte";
						$activite = "Activités de poste dans le cadre d'une obligation de service universel";
						$categorie = " Poste et courrier";
						$nationalite = "france";
						$siret = "35600000000048";
						break;
						
					case "free":
						$logo = "img/entreprises/free.jpg";
						$raison_sociale = "Free";
						$activite = "Télécommunications filaires";
						$categorie = "Telecom";
						$nationalite = "france";
						$siret = "42193886100034";
						break;
				}
			}			
			break;
			
		case "profile":
			 if(isset($_SESSION['auth']))
			 {
			 	$squelette = 'views/student-profile.php';
			 }
			 else 
			 {
			 	$_SESSION['login-error'] = '<p class="error-message first">Cette action nécessite que vous soyez connecté.</p>';
			 	header('Location: ../index.php?action=login');			 	
			 }
			 	
			 break;
			
		case "auth":
			if(isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['login-pw']) && !empty($_POST['login-pw']))
			{
				if($_POST['login']=="dupond14" && $_POST['login-pw']=="stage")
				{
					$_SESSION['auth'] = $_POST['login'];
					unset($_SESSION['login-error']);
					header('Location: ../index.php?action=profile');
				}
				else
				{
					$_SESSION['login-error'] = 'L\'identifiant ou le mot de passe est incorrect.';
					header('Location: ../index.php?action=login');
				}
					
			}
			break;
			
		case "logout":
			  unset($_SESSION['auth']);
			  header('Location: ../index.php');
			
		default:
			echo "No action matched !";
			break;
	}
}
else
	$codeAction = "home";
/**
 * Retour des données en fonction des critères de recherche envoyées depuis ajax
 */
if(isset($_POST['filter']) || isset($_POST['keyword']) || isset($_POST['location']))
{
	if(!empty($_POST['filter']))
	{
		switch($_POST['filter'])
		{
			case "dev-java":
				$return_data = 'views/ajax_request_views/developpeur_java_toutes_villes_confondues.html';
				break;
			case "dev-web":
				$return_data = 'views/ajax_request_views/developpeur_web_toutes_villes_confondues.html';
				break;
			case "finance":
				$return_data = 'views/ajax_request_views/finances_toutes_villes_confondues.html';
				break;
			case "ressource-humaine":
				$return_data = 'views/ajax_request_views/ressource_humaine_toutes_villes_confondues.html';
				break;
			case "sante":
				$return_data = 'views/ajax_request_views/sante_toutes_villes_confondues.html';
				break;
			case "caen":
				$return_data = 'views/ajax_request_views/developpeur_web_caen.html';
				break;
			case "paris":
				$return_data = 'views/ajax_request_views/developpeur_web_paris.html';
				break;
			default:
				$return_data ="";
				break;
		}
	}
	elseif(!empty($_POST['keyword']) && !empty($_POST['location']))
	{
		if($_POST['keyword']=="dev-web" && $_POST['location']=="caen")
		{
			$return_data = 'views/ajax_request_views/developpeur_web_caen.html';
		}
		elseif($_POST['keyword']=="dev-web" && $_POST['location']=="paris")
		{
			$return_data = 'views/ajax_request_views/developpeur_web_paris.html';
		}
	}
	else
		$return_data="";
	
	if(!empty($return_data))
	{
		ob_start();
		require_once($return_data);
		$html = ob_get_contents();
		ob_end_clean();
	
		echo $html;die;
	}
	else
		echo '<p class="no-result-text">Aucun résultat ne corresponds à vos recherches</p>';die;
}


ob_start();
require_once($squelette);
$html = ob_get_contents();
ob_end_clean();

require_once 'includes/header.php';
echo $html;
require_once 'includes/footer.php';
?>

		
	