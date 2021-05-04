<?php
	include "../controller/promotionC.php";
	include_once '../Model/promotion.php';

	$promotionC = new promotionC();

	$error = "";
    
	
	if (
		isset($_POST["pourcentage"]) && 
        isset($_POST["prix_actuelle"]) &&
        isset($_POST["prix_solder"]) 
	){
		if ( 
            !empty($_POST["pourcentage"]) && 
            !empty($_POST["prix_actuelle"]) && 
            !empty($_POST["prix_solder"]) 
        ) {
            $user = new promotion(
                
                $_POST['pourcentage'],
                $_POST['prix_actuelle'], 
                $_POST['prix_solder']
                
			);
			
            $promotionC->modifierpromotion($user, $_GET['id_pr']);
            header('refresh:5;url=afficherpromotions.php');
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
		<button><a href="afficherpromotions.php">Retour à la liste</a></button>
        <hr>
        
        <div id_pr="error">
            <?php echo $error; ?>
        </div>
		<?php
            if (isset($_GET['id_pr'])){
                $user = $promotionC->recupererpromotion($_GET['id_pr']);
                
        ?>
        <?php
        }
        ?>
        <center>
            <h1>Modifier reclamation</h1>
            <fieldset>
		
		<form name="form" action="" method="POST">
            
						<input type="text" name="id_pr" id="id_pr"  value="<?php echo $user['id_pr'];?>" disabled><br>
					
						<input type="text" name="pourcentage" id="n1" value="<?php echo $user['pourcentage'];?>"  ><br>

					    <input type="text" name="prix_actuelle" id="n2"  value="<?php echo $user['prix_actuelle'];?>"><br>
                
                        <input type="text" name="prix_solder" id="prix_solder" value="<?php echo $user['prix_solder'];?>" ><br>
                         <select name="Choisissez Calculer" id="operators">
                            <option value="calculer">calculer</option>
                         </select><br>
                  
                        <input type="submit" value="Modifier" onclick="return verif();" " style="color:green"> <br>
                    
                        <input type="reset" value="Annuler" " style="color:red" >
            
        </form>
        </fieldset>
    </center>
<script type="text/javascript">
    




                function verif()
{
     
var n1 =parseInt(document.getElementById('n1').value);

var n2 =parseInt(document.getElementById('n2').value);
  
var oper =document.getElementById('operators').value;

if(oper==='calculer')
{
  a=document.getElementById('prix_solder').value = ((n1/100)*n2);
  document.getElementById('prix_solder').value = n2-a +"dt";
}


              

       
        //
        var ch = form.pourcentage.value;
        ch = ch.toUpperCase();
        if(ch.length == 0 ) {alert("saisir votre pourcentage"); return false;}
        

        //
        var ch = form.prix_actuelle.value;
        ch = ch.toUpperCase();
        if(ch.length == 0 ) {alert("saisir votre prix_actuelle"); return false;}
      
         
         //
         var ch = form.prix_solder.value;
        ch = ch.toUpperCase();
        if(ch.length == 0 ) {alert("saisir votre prix_solder"); return false;}
        

        
}

</script>
		
	</body>
</html>