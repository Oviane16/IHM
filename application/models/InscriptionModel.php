<?php
Class InscriptionModel extends CI_Model
{
	    protected $table ='utilisateur';

    public function ajoutUtilisateur($nom,$prenom,$adresse,$genre,$tel,$mail,$dateNaiss,$mdp)
    {
        $this->db->set('nomUtilisateur', $nom);
        $this->db->set('prenom', $prenom);
        $this->db->set('tel', $tel);
        $this->db->set('adresse', $adresse);
        $this->db->set('genre', $genre);
        $this->db->set('tel',$tel);
        $this->db->set('mail',$mail);
        $this->db->set('dateNaiss',$dateNaiss);
         $this->db->set('mdp',$mdp);
        return $this->db->insert($this->table);
    }
}?>