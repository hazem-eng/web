<?php
    include_once '../Model/reclamation.php';
    include_once '../Controller/reclamationC.php';

    $error = "";

     //create user
    $user = null;

     //create an instance of the controller
    $userC = new reclamationC();
   if(
        isset($_POST['nom']) && 
        isset($_POST['prenom']) &&
        isset($_POST['produit'])&& 
isset($_POST['description']) 
    ) {
        if(
            !empty($_POST['nom']) && 
            !empty($_POST['prenom']) && 
            !empty($_POST['produit']) &&
            !empty($_POST['description'])
        ) {
            $user = new reclamation(
               
                $_POST['nom'],
                $_POST['prenom'], 
                $_POST['produit'],
$_POST['description'],
            );
            $userC->ajouterreclamation($user);
            header('Location:afficherreclamations.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reclamation</title>
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
         <button><a href="acceuil.html">Retour à la liste</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        <center>
            <h1> Ajouter une reclamation:</h1>
            <fieldset>
        <form action="" name="form" method="POST">
           
                   

                  <input type="text" name="nom" id="nom" placeholder="votre nom" ><br>

                  <input type="text" name="prenom" id="prenom" placeholder="votre prenom" ><br>

                  <input type="text" name="produit" placeholder="produit" id="le produit" ><br>
<input type="text" name="description" placeholder="cause de reclamation" id="description" ><br>
<div class="g-recaptcha"name="g-recaptcha"id="g-recaptcha" data-sitekey="6Lc-EP4ZAAAAABLB6PneVYk0RWUIVHglRo8Ay9K6" ></div>

                  

                  <input type="submit" value="Envoyer" onclick="return verif();"  " style="color:green"> <br>
                  <input type="reset" value="Annuler"   " style="color:red"> 
                  
        </form>
      </fieldset>
    </center>
    <script language="javascript">
      

           
            function verif()
{
       
        //
        var ch = form.nom.value;
        ch = ch.toUpperCase();
        if(ch.length == 0 ) {alert("saisir votre nom"); return false;}
for(i =0 ; i < ch.length ;i++)
{
  if(ch.charAt(i)<'A' || ch.charAt(i) >'Z')
alert(" Nom Incorrect")
}
        

        //
        var ch = form.prenom.value;
        ch = ch.toUpperCase();
        if(ch.length == 0 ) {alert("saisir votre prenom"); return false;}
      
         
         //
         var ch = form.produit.value;
        ch = ch.toUpperCase();
        if(ch.length == 0 ) {alert("saisir votre produit"); return false;}
        

        
}











    </script>
      
    </body>
</html>