<?php
Class AccueilCOntroller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('assets_helper');
        $this->load->model('ProduitModel');

    }
    public function index()
    {
	//	$this->load->view("exempleFormValidation");
      $data['produits'] = $this->ProduitModel->findAll();
    	$this->load->view("accueil",$data);
    }
    public function sansSession()
    {
           $data['produits'] = $this->ProduitModel->findAll();
    	  $this->load->view("accueilSansSession",$data);
    }
}
?>