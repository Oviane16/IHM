<?php
Class LoginModel extends CI_Model
{
	    protected $table ='utilisateur';

    public function seconnecter($mail,$mdp)
    {
        return $this->db->select('*')
            ->from('utilisateur')
            ->where('mail',$mail)
            ->where('mdp',$mdp)
            ->get()
            ->result();
    }
}?>