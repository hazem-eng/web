   
                               

<!DOCTYPE html>
     <html>
     <form method="POST" action=""> 
     Rechercher un mot : <input type="text" name="recherche">
     <input type="SUBMIT" value="Search!"> 
     </form>
     </html>

     <?php
     include "../controller/reclamationC.php";
$reclamationC = new reclamationC();
   


     // Récupère la recherche
     $recherche = isset($_POST['recherche']) ? $_POST['recherche'] : '';

     // la requete mysql


     // affichage du résultat
     while( $r = mysqli_fetch_array($id)){
     echo 'Résultat de la recherche: '.$r['id'].', '.$r['nom'].' <br />'
;
     }
?>