<?php
	include "../controller/promotionC.php";

	$promotionC=new promotionC();
	
	if (isset($_POST["id_pr"])){
		$promotionC->supprimerpromotion($_POST["id_pr"]);
		header('Location:afficherpromotions.php');
	}

?>