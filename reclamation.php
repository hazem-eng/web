<?php
	class reclamation{
		private ?int $id = null;
		private ?string $nom = null;
		private ?string $prenom = null;
		private ?string $produit = null;
		private ?string $decription= null;
		
	
		
		function __construct(  string $nom, string $prenom, string $produit, string $description){
			
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->produit=$produit;
			$this->description=$description;
			
		}
		
		function getId(): int{
			return $this->id;
		}
		function getNom(): string{
			return $this->nom;
		}
		function getPrenom(): string{
			return $this->prenom;
		}
		function getproduit(): string{
			return $this->produit;
		}
		function getdescription(): string{
			return $this->description;
		}
		
		
        

		function setNom(string $nom): void{
			$this->nom=$nom;
		}
		function setPrenom(string $prenom): void{
			$this->prenom=$prenom;
		}
		function setProduit(string $produit): void{
			$this->prouit=$produit;
		}
		function setdescription(string $description): void{
			$this->description=$description;
		}
		
	}
?>