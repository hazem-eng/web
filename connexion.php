<?php
    
    include_once '../Model/promotion.php';
    include_once '../Controller/promotionC.php';
   




    
    $error = "";

     //create user
    $user = null;

     //create an instance of the controller
    

    $userC = new promotionC();
    
   if(
                 isset($_POST['pourcentage']) && 
        isset($_POST['prix_actuelle']) &&
        isset($_POST['prix_solder']) 
    ) {
        if(  
            !empty($_POST['pourcentage']) && 
            !empty($_POST['prix_actuelle']) && 
            !empty($_POST['prix_solder']) 
        ) {
            $user = new promotion(
                
                $_POST['pourcentage'],
                $_POST['prix_actuelle'], 
                $_POST['prix_solder'],
            );

            $userC->ajouterpromotion($user);
            header('Location:afficherpromotions.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promotion</title>
   
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
         select{
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
         <button><a href="acceuil.html">Retour à la liste</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        <center>
            <h1> Ajouter une promotion:</h1>
            <fieldset>
        <form action="" name="form" id="" method="POST">






    
                   

                  <input type="text" name="pourcentage" id="n1" placeholder="pourcentage" ><br>

                  <input type="text" name="prix_actuelle" id="n2" placeholder="prix_actuelle" ><br>

                   <select  id="operators">

                    <option  >Choisissez la Méthoe Calculer</option>
                    <option  value="calculer">calculer</option>
                    
                     
                   


                   </select><br>



                  
                     

                  <input type="text" name="prix_solder" placeholder="prix_solder" id="prix_solder" ><br>

                  
                 
                  <input type="submit" value="Envoyer" onclick="return verif();"  " style="color:green"> <br>

                  <input type="reset" value="Annuler"   " style="color:red"> 
                  
        </form>
      </fieldset>
    </center>
    <script language="javascript">
      

           
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