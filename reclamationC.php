<?PHP
	include "../config.php";
	require_once '../Model/reclamation.php';

	class reclamationC {
		
		function ajouterreclamation($reclamation){
			$sql="INSERT INTO reclamation ( nom, prenom, produit, description) 
			VALUES ( :nom,:prenom, :produit, :description)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					
					'nom' => $reclamation->getnom(),
					'prenom' => $reclamation->getprenom(),
					'produit' => $reclamation->getproduit(),
					'description' => $reclamation->getdescription()
					
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		   
            
		
		function afficherreclamations(){
			
			$sql="SELECT * FROM reclamation";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function searchreclamation(){
		 $sql = "SELECT id, nom FROM reclamation
      WHERE id LIKE '%$recherche%'
      OR nom LIKE '%$recherche%'
      LIMIT 10";
		 $db = config::getConnexion();
try {
$query = $db->prepare($sql);
$query->execute([
'nom' => $reclamation->getnom(),
'prenom' => $reclamation->getprenom(),
'produit' => $reclamation->getproduit(),
'description' => $reclamation->getdescription(),

'id' => $id
]);
}

catch (Exception $e) {
echo 'erreur : '.$e->getMessage();
}

     }
		

		function supprimerreclamation($id){
			$sql="DELETE FROM reclamation WHERE id= :id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierreclamation($reclamation, $id){
			
			$sql="UPDATE reclamation SET nom=:nom, prenom=:prenom, produit=:produit, description=:description WHERE id=:id";
$db = config::getConnexion();
try {
$query = $db->prepare($sql);
$query->execute([
'nom' => $reclamation->getnom(),
'prenom' => $reclamation->getprenom(),
'produit' => $reclamation->getproduit(),
'description' => $reclamation->getdescription(),

'id' => $id
]);
}

catch (Exception $e) {
echo 'erreur : '.$e->getMessage();
}



}
		
		function recupererreclamation($id){
			$sql="SELECT * from reclamation where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$event=$query->fetch();
				return $event;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		
		
	}

?>

		