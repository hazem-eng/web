<?php
	include "../controller/reclamationC.php";

	$reclamationC=new reclamationC();
	
	if (isset($_POST["id"])){
		$reclamationC->supprimerreclamation($_POST["id"]);
		header('Location:afficherreclamations.php');
	}

?>