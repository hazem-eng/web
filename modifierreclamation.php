<?php
	include "../controller/reclamationC.php";
	include_once '../Model/reclamation.php';

	$reclamationC = new reclamationC();

	$error = "";
    
	
	if (
		isset($_POST["nom"]) && 
        isset($_POST["prenom"]) &&
        isset($_POST["produit"]) &&
        
        isset($_POST["description"])
       
	){
		if ( 
            !empty($_POST["nom"]) && 
            !empty($_POST["prenom"]) && 
            !empty($_POST["produit"]) && 
            !empty($_POST["description"])
            
        ) {
            $user = new reclamation(
                
                $_POST['nom'],
                $_POST['prenom'], 
                $_POST['produit'],
                $_POST['description']
             
                
			);
			
            $reclamationC->modifierreclamation($user, $_GET['id']);
            header('refresh:5;url=afficherreclamations.php');
        }
        else
            $error = "Missing information";
	}

?>
<html>
	<head>
		<title>Modifier reclamation</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
          <style >
        body{

            background-color: whitesmoke;
        }
        input{
         width: 50%;
         height: 10%;
         border:1px;
         border-radius: 05px;
         padding: 8px 15px 8px 15px;
         margin: 10px 0px 15px 0px;
         box-shadow:1px 1px 2px 1px grey;

        }
         h1
            {
                font-weight: 600;
                text-align: center;
                background-color: #16a085;
                color:#fff;
                padding: 10px 0px;
            }
        

    </style>
	</head>
	<body>
		<button><a href="afficherreclamations.php">Retour à la liste</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
		<?php
            if (isset($_GET['id'])){
                $user = $reclamationC->recupererreclamation($_GET['id']);
                
        ?>
        <center>
            <h1>Modifier reclamation</h1>
            <fieldset>
		
		<form action="" method="POST">
            
						<input type="text" name="id" id="id"  value="<?php echo $user['id'];?>" disabled><br>
					
						<input type="text" name="nom" id="nom" value="<?php echo $user['nom'];?>"  ><br>

					    <input type="text" name="prenom" id="prenom"  value="<?php echo $user['prenom'];?>"><br>
                
                        <input type="text" name="produit" id="produit" value="<?php echo $user['produit'];?>" ><br>
                 
                        <input type="text" name="description" id="description" value="<?php echo $user['description'];?>"><br>

                  
                        <input type="submit" value="Modifier" " style="color:green"> <br>
                    
                        <input type="reset" value="Annuler" " style="color:red" >
            
        </form>
        </fieldset>
    </center>
		<?php
        }
        ?>
	</body>
</html>