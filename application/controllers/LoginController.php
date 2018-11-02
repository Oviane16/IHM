<?php
Class LoginController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('assets_helper');
		$this->load->model('LoginModel');
        $this->load->model('ProduitModel');

    }
    public function index()
    {
    	$this->load->view("login");
    }
    public function seconnecter()
    {
        if(isset($_POST["email"]))
        {
            $pseudo = $_POST["email"];
            $mdp = $_POST["mdp"];
            $res = $this->LoginModel->seconnecter($pseudo,$mdp);
            if($res!=null)
            {
                foreach($res as $utilisateur)
                {
                    $idUtil= $utilisateur->idUtilisateur;
                    $nomUtil =$utilisateur->nomUtilisateur;
                }
                $this->session->set_userdata('id',$idUtil);
                $this->session->set_userdata('nom',$nomUtil);
                $this->connexReuissit();
            }
            else
            {
                $this->erreurConnex();
            }
        }
        else
        {
            $this->load->view("login");
        }
        
    }
    public function connexReuissit()
    {
      // $data['listProduit'] = $this->ProduitModel->getAll();
        redirect(array('controller'=>'AccueilController','action'=>'index'));
       // $this->load->view("accueil");
    }
    public function erreurConnex()
    {
        $data["erreurLog"]="Adresse email ou mdp incorrect";
        $this->load->view("login",$data);
    }
    public function deconnecter()
    {
        $this->session->sess_destroy();
        redirect(array('controller'=>'AccueilController','action'=>'sansSession'));
    }

}
?>