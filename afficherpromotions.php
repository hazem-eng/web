<?PHP
	include "../controller/promotionC.php";

	$promotionC=new promotionC();
	$listeUsers=$promotionC->afficherpromotions();

?>

<html>
	<head>

       
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Add Liste promotions </title>
         
    </head>
    <style >
    	body
    	{
       padding: 0;
       margin: 0;
       font-family: verdana, Geneva, tahoma, sans-serif;


    	}
    	table{

    		
    		left: 50%;
    		top:50%;
    		transform: translate(-50%,-50);
    		border-collapse: collapse;
    		width:80px;
    		height: 20px;
    		border:1px solid #bdc3c7;
    		}
    		tr
    		{
             
             transition: all .2s ease-in;
             cursor:pointer;
    		}
            th,td
            {
             
             padding:12px;
             text-align:left;
             border-botton:1px solid #dddd; 
            }
            th{
            	background-color:#16a085;
            	color:#fff; 
            }
            h1
            {
            	font-weight: 600;
            	text-align: center;
            	background-color: #16a085;
            	color:#fff;
            	padding: 10px 0px;
            }
            tr:hover{
            	background-color:#f5f5f5;
            	transform:scale(1.02);
            	box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);

            }

    </style>
    <body>
		<button><a href="connexion.php">Add un promotion</a></button>
		<hr>
		<center>
			<h1>Afficher promotions </h1>
         

 <label><h3>recherche multicritére</h3></label>
<input type="text" name="search" id="search"  width="45" >

        <table class="table" id="myTable" border="1" >
		
            
			<tr>
				<th>Id</th>
				<th>pourcentage(%)</th>
				<th>Prix_actuelle(DT)</th>
				<th>prix_solder(DT)</th>
               <th>Voiting System</th> 
				<th>supprimer</th>
				<th>modifier</th>
              

				
			</tr>

			<?PHP
				foreach($listeUsers as $user){
			?>
				<tr>
					<td><?PHP echo $user['id_pr']; ?></td>
					<td><?PHP echo $user['pourcentage']; ?></td>
					<td><?PHP echo $user['prix_actuelle']; ?></td>
					<td><?PHP echo $user['prix_solder']; ?></td>
                    <td><button><a href="Voting.html">Voting Systeme</button> </td>
					<td>
						<form method="POST" action="supprimerpromotion.php" >
						<input type="submit" name="supprimer" value="supprimer" >
						<input type="hidden" name="id_pr" value=<?PHP echo $user['id_pr']; ?>  >
						</form>
					</td>
					<td>
					<a href="modifierpromotion.php?id_pr=<?PHP echo $user['id_pr']; ?>"> Modifier </a>
					</td>
                  <td>



				</tr>

			<?PHP
				}
			?>
            </tbody>
		</table>
    					
		</center>
       
     <script  src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript">
            
                 $(document).ready(function(){
             $('#search').keyup(function(){
              search_table($(this).val());
              });
             function search_table(value){
          $('#myTable tr').each(function(){
            var found ='false'
            $(this).each(function(){
            if($(this).text().toLowerCase().indexOf(value.toLowerCase())>=0)
            {
                found='true';
            }
        });




             
              if(found=='true'){
                $(this).show();
              }
              else{
                $(this).hide();
              }




             });
}

                 });





               











        </script>
	</body>
</html>
