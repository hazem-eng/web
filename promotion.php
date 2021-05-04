<?php
	class promotion{
		private ?int $id_pr = null;
		private ?int $pourcentage = null;
		private ?int $prix_actuelle = null;
		private ?string $prix_solder = null;

                
                	
		
		
		function __construct(  int $pourcentage, int $prix_actuelle, string $prix_solder){
			
			$this->pourcentage=$pourcentage;
			$this->prix_actuelle=$prix_actuelle;
			$this->prix_solder=$prix_solder;
                  
			
		}
		
		function getId_pr(): int{
			return $this->id_pr;
		}
		function getPourcentage(): int{
			return $this->pourcentage;
		}
		function getPrix_actuelle(): int{
			return $this->prix_actuelle;
		}
		function getPrix_solder(): string{
			return $this->prix_solder;
		}
      
		
		
        

		function setPourcentage(int $pourcentage): void{
			$this->pourcentage=$pourcentage;
		}
		function setPrix_actuelle(int $prix_actuelle): void{
			$this->prix_actuelle=$prix_actuelle;
		}
		function setPrix_solder(string $prix_solder): void{
			$this->prix_solder=$prix_solder;
		}
	
		
	}
?>