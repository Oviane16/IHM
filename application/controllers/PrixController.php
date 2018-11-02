<?php
Class PrixController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('assets_helper');
        $this->load->model('ProduitModel');
    }
    public function getProduit($id='')
    {
        $data['produits'] = $this->ProduitModel->getProduit($id);
        $this->load->view('formPrix', $data);

    }
    public function getDonneurPrix($id='')
    {
        $data['utilisateurs'] = $this->ProduitModel->getDonneurPrix($id);
        $this->load->view('donneurPrix', $data);

    }
    public function donnerPrix()
    {
        $prix = $_POST["prix"];
        $idProd = $_POST["idProd"];
        $idUtilsateur = $this->session->userdata('id');
        $this->ProduitModel->donnerPrix($prix,$idProd,$idUtilsateur);
        $this->ProduitModel->setPrixActuel($prix,$idProd);
        redirect(array('controller'=>'AccueilController','action'=>'index'));

    }



}
?>