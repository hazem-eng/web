<?PHP
	include "../controller/reclamationC.php";

	$reclamationC=new reclamationC();
	$listeUsers=$reclamationC->afficherreclamations();

?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Add Liste reclamations </title>
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
            h2
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
		<button><a href="connexion1.php">Add un reclamation</a></button>
		<hr>
		<div class="container">
	<div class="row">
		<div class="col-xs-12">
		
			<h2>Afficher Reclamations </h2><br>
			<center>
		 

<label><h3>recherche multicritére</h3></label>
<input type="text" name="search" id="search"  width="45" >

		<table class="table" id="myTable" border="1" >
			<thead>
				<th>Id</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>produit</th>
				<th>description</th>
        <th>Voiting System</th> 
				<th>supprimer</th>
				<th>modifier</th>
				
			</thead>
			<tbody>

			<?PHP
				foreach($listeUsers as $user){
			?>
				<tr>
					<td ><?PHP echo $user['id']; ?></td>
					<td><?PHP echo $user['nom']; ?></td>
					<td><?PHP echo $user['prenom']; ?></td>
					<td><?PHP echo $user['produit']; ?></td>
					<td><?PHP echo $user['description']; ?></td>
          <td><button><a href="Voting2.html">Voting Systeme</button> </td>
					
					<td>
						<form method="POST" action="supprimerreclamation.php" >
						<input type="submit" name="supprimer" value="supprimer" >
						<input type="hidden" name="id" value=<?PHP echo $user['id']; ?>  >
						</form>
					</td>
					<td>
						<a href="modifierreclamation.php?id=<?PHP echo $user['id']; ?>"> Modifier </a>
					</td>
					</tr>

							
			


		
                    
                 
					

				
			<?PHP
				}
			?>
			</tbody>

		
		</table>
	</div>
</div>
</div>
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
