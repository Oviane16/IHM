<?php
Class ProduitController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('assets_helper');
        $this->load->model('ProduitModel');
    }
    public function index()
    {
         $data['produits'] = $this->ProduitModel->findAll();
         $this->load->view('ajoutProduit', $data);
    }
    public function produitAjoute()
    {
         $data['produits'] = $this->ProduitModel->produitAjoute();
         $this->load->view('ajoutProduit', $data);
    }
    public function ajoutProduit()
    {
                $data['produits'] = $this->ProduitModel->findAll();
                $nom = $_POST['nom'];
                $description = $_POST['description'];
                $idUtils = $this->session->userdata('id');
                $extension = $this->get_file_extension($_FILES['image']['name']);
                $nomFichier = $idUtils.time().'.'.$extension;
                $config['file_name'] = $nomFichier;
                $config['upload_path'] = './assets/image/uploads';
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload',$config);
                if (!$this->upload->do_upload("image"))
                {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('ajoutProduit', $error);
                }
                else
                {
                        $this->ProduitModel->ajoutProduit($nom,$description,$idUtils,$nomFichier);
                        $data = array('upload_data' => $this->upload->data());
                        $data['produits'] = $this->ProduitModel->produitAjoute();
                        $this->load->view('ajoutProduit', $data);

                } 

            }
    function get_file_extension($file_name) {
    return substr(strrchr($file_name,'.'),1);
}
    public function getProduit($id='')
    {
        $data['produits'] = $this->ProduitModel->getProduit($id);
        $this->load->view('formModifProd', $data);

    }
    public function getProduitSupp($id='')
    {
          $data['produits'] = $this->ProduitModel->getProduit($id);
        $this->load->view('formSupp', $data);
    }
    public function suppProd()
    {
        $id = $_POST['id'];
         $this->ProduitModel->suppProd($id);
                        $data['produits'] = $this->ProduitModel->findAll();
        $this->load->view('ajoutProduit', $data);

    }
    public function modifierProd()
    {
       // die("ito".$_FILES['image']["name"]);
        if(($_FILES['image']['name'])=='')
        {
           // die('tsisy');
                $id = $_POST['id'];
                $nom = $_POST['nom'];
                $description = $_POST['description'];
                $idUtils = $this->session->userdata('id');
                $this->ProduitModel->modifierProd($nom,$description,$id);
                $data['produits'] = $this->ProduitModel->findAll();
                $this->load->view('ajoutProduit', $data);
        }
        else
        {
                $data['produits'] = $this->ProduitModel->findAll();
                $id = $_POST['id'];
                $nom = $_POST['nom'];
                $description = $_POST['description'];
                $idUtils = $this->session->userdata('id');
                $extension = $this->get_file_extension($_FILES['image']['name']);
                $nomFichier = $idUtils.time().'.'.$extension;
                $config['file_name'] = $nomFichier;
                $config['upload_path'] = './assets/image/uploads';
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload',$config);
                if (!$this->upload->do_upload("image"))
                {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('ajoutProduit', $error);
                }
                else
                {
                        $this->ProduitModel->modifierProdImage($nom,$description,$nomFichier,$id);
                        $data = array('upload_data' => $this->upload->data());
                        $data['produits'] = $this->ProduitModel->findAll();
                        $this->load->view('ajoutProduit', $data);

                } 
        }

    }
    public function detailProd($id='')
    {
        $data['utilisateurs'] = $this->ProduitModel->getDonneurPrix($id);
        $data['produits'] = $this->ProduitModel->getUtilsateurProduit($id);
        $data['donneurPrixEleve'] = $this->ProduitModel->donneurPrixEleve($id);
        $this->load->view('detailProd',$data);

    }
    public function rechercher()
    {
        $mocle = $_POST['mocle'];
        $data['produits'] = $this->ProduitModel->rechercher($mocle);
        $data['mocle']= $mocle;
        $this->load->view('resultRecherche',$data);
    }
     public function keyvide()
    {
        $data['produits'] = $this->ProduitModel->findAll();
        $this->load->view('resultRecherche',$data);
    }
    public function vendre($id='')
    {
        $data['produits'] = $this->ProduitModel->getUtilsateurProduit($id);
        $data['utilsateurs'] = $this->ProduitModel->donneurPrixEleve($id);
        $this->load->view('formVente',$data);

    }
    public function confirmeVendre()
    {
         $idProd = $_POST['id'];
         $prixActuel = $_POST['prixActuel'];
         $idAcheteur = $_POST['idAcheteur'];
         $idVendeur = $this->session->userdata("id");
         $prixActuel =  $_POST['prixActuel'];
         $this->ProduitModel->confirmeVendre($idProd,$prixActuel,$idAcheteur,$idVendeur,$prixActuel);
         $data['produits'] = $this->ProduitModel->findAll();
         $this->load->view('ajoutProduit', $data);

    }
    public function mesProduit()
    {
        $idAcheteur = $this->session->userdata("id");
        $data['produits']=$this->ProduitModel->mesProduit($idAcheteur);
                 $this->load->view('mesProduit', $data);

    }


}
?>