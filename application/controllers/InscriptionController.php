<?php
Class InscriptionController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('assets_helper');
        $this->load->model('InscriptionModel');
        $this->load->model('ProduitModel');

    }
    public function index()
    {
    	$this->load->view("inscription");
    }
    public function ajoutUtilisateur()
    {
    	    

    		if(isset($_POST["nom"]))
    		{
    		$nom =$_POST["nom"] ;
    		$prenom = $_POST["prenom"];
    		$adresse = $_POST["adresse"];
    		$genre = $_POST["genre"];
    		$tel = $_POST["tel"];
    		$mail = $_POST["email"];
    		$dateNaiss = $_POST["dateNaiss"];
    		$mdp = $_POST["mdp"];
    		$this->InscriptionModel->ajoutUtilisateur($nom,$prenom,$adresse,$genre,$tel,$mail,$dateNaiss,$mdp);
    		$data["nom"] = $nom;
    		//redirect(array('controller'=>'AccueilController','action'=>'index','nom'=>$nom));
                    $data['produits'] = $this->ProduitModel->findAll();
    		$this->load->view("accueilSansSession",$data);
    		}
    		else
    		{
                        $data['produits'] = $this->ProduitModel->findAll();
    			$this->load->view("accueil",$data);	
    		}
    }
    		
 }
 ?>