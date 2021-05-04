<?PHP
	include "../config.php";
	require_once '../Model/promotion.php';

	class promotionC {
		
		function ajouterpromotion($promotion){
			$sql="INSERT INTO promotion ( pourcentage, prix_actuelle,  prix_solder) 
			VALUES ( :pourcentage,:prix_actuelle, :prix_solder)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					
					'pourcentage' => $promotion->getpourcentage(),
					'prix_actuelle' => $promotion->getprix_actuelle(),
					'prix_solder' => $promotion->getprix_solder(),
                                      //   'produit' => $promotion->getproduit()		
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		   
            
		
		function afficherpromotions(){
			
			$sql="SELECT * FROM promotion";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}
		  public function rechercherpromotion($id_pr) {            
            $sql = "SELECT * from promotion where id_pr=:id_pr"; 
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute([
                    'promotion' => $promotion->getTitre(),
                ]); 
                $result = $query->fetchAll(); 
                return $result;
            }
            catch (PDOException $e) {
                $e->getMessage();
            }
        }
		

		function supprimerpromotion($id_pr){
			$sql="DELETE FROM promotion WHERE id_pr= :id_pr";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_pr',$id_pr);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierpromotion($promotion, $id_pr){
			
			$sql="UPDATE promotion SET pourcentage=:pourcentage, prix_actuelle=:prix_actuelle, prix_solder=:prix_solder  WHERE id_pr=:id_pr";
$db = config::getConnexion();
try {
$query = $db->prepare($sql);
$query->execute([
'pourcentage' => $promotion->getpourcentage(),
'prix_actuelle' => $promotion->getprix_actuelle(),
'prix_solder' => $promotion->getprix_solder(),

'id_pr' => $id_pr
]);
}

catch (Exception $e) {
echo 'erreur : '.$e->getMessage();
}



}
		
		function recupererpromotion($id_pr){
			$sql="SELECT * from promotion where id_pr=$id_pr";
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

		