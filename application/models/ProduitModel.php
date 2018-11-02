<?php
Class ProduitModel extends CI_Model
{
	    protected $table ='produit';
	 public function ajoutProduit($nom,$description,$idUtils,$nomFichier)
    {
    	$date = date('Y-m-d H:i:s');
        $this->db->set('nomProduit', $nom);
        $this->db->set('description', $description);
        $this->db->set('utilisateuridUtilisateur', $idUtils);
        $this->db->set('dateAjout', $date);
        $this->db->set('image', $nomFichier);
        return $this->db->insert($this->table);
    }
    public function produitAjoute()
    {
        $idUtils = $this->session->userdata('id');
        $sql = "select * from produit left join utilisateur on utilisateur.idUtilisateur=produit.utilisateuridUtilisateur where produit.etat='dispo' and utilisateur.idUtilisateur='".$idUtils."' order by produit.idProd desc";
        $query = $this->db->query($sql);
        $produit = array();
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                $produit[] = $row;
            }
            return $produit;
        }
    }
     public function findAll()
    {
        $idUtils = $this->session->userdata('id');
        $sql = "select * from produit left join utilisateur on utilisateur.idUtilisateur=produit.utilisateuridUtilisateur where produit.etat='dispo' order by produit.idProd desc";
        $query = $this->db->query($sql);
        $produit = array();
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                $produit[] = $row;
            }
            return $produit;
        }
    }
    public function getProduit($id)
    {
          $sql = "select * from produit where idProd='".$id."'";
        $query = $this->db->query($sql);
        $produit = array();
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                $produit[] = $row;
            }
            return $produit;
        }
    }
    public function getUtilsateurProduit($id)
    {
        $sql = "select * from produit left join utilisateur on utilisateur.idUtilisateur=produit.utilisateuridUtilisateur where produit.idProd='".$id."' and produit.etat='dispo'";
       // die($sql);
        $query = $this->db->query($sql);
        $produit = array();
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                $produit[] = $row;
            }
            return $produit;
        }
    }
    public function modifierProd($nom,$description,$id)
    {
        $this->db->set('nomProduit', $nom);
        $this->db->set('description', $description);
        $this->db->where('idProd', $id);
        return $this->db->update($this->table);
    }
    public function modifierProdImage($nom,$description,$nomFichier,$id)
    {
        $this->db->set('nomProduit', $nom);
        $this->db->set('description', $description);
         $this->db->set('image', $nomFichier);
        $this->db->where('idProd', $id);
        return $this->db->update($this->table);
    }
    public function suppProd($id)
    {
        $this->db->where('idProd',$id);
        $this->db->delete('produit');
    }
    public function findAllPrix()
    {
         $sql = "select * from produit left join prix on produit.idProd = prix.produitidProd  where produit.etat=''";
        $query = $this->db->query($sql);
        $produit = array();
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                $produit[] = $row;
            }
            return $produit;
        }
    }
    public function getDonneurPrix($id)
    {
        $sql = "select * from utilisateur left join prix on prix.utilisateuridUtilisateur = utilisateur.idUtilisateur where prix.produitidProd='".$id."'";
        $query = $this->db->query($sql);
        $produit = array();
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                $produit[] = $row;
            }
            return $produit;
        }
    }
    public function donnerPrix($prix,$idProd,$idUtilsateur)
    {
        $date = date('Y-m-d H:i:s');
        $this->db->set('prix', $prix);
        $this->db->set('produitidProd', $idProd);
        $this->db->set('date', $date);
        $this->db->set('utilisateuridUtilisateur', $idUtilsateur);
        return $this->db->insert('prix');
    }
    public function setPrixActuel($prix,$idProd)
    {
         $this->db->set('prixActuel', $prix);
        $this->db->where('idProd', $idProd);
        return $this->db->update($this->table);
    }
    public function donneurPrixEleve($id)
    {
        $sql = "select * from utilisateur left join prix on prix.utilisateuridUtilisateur = utilisateur.idUtilisateur where prix.produitidProd='".$id."' order by prix.prix desc limit 0,1";
        $query = $this->db->query($sql);
        $produit = array();
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                $produit[] = $row;
            }
            return $produit;
        }
    }
    public function rechercher($mocle)
    {
        $sql = "select * from produit left join utilisateur on utilisateur.idUtilisateur=produit.utilisateuridUtilisateur where nomProduit ='".$mocle."' and produit.etat='dispo' order by produit.idProd desc";
        $query = $this->db->query($sql);
        $produit = array();
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                $produit[] = $row;
            }
            return $produit;
        }
    }
    public function confirmeVendre($idProd,$prixActuel,$idAcheteur,$idVendeur,$prixActuel)
    {
        $this->updateEtat($idProd);
        $date = date('Y-m-d H:i:s');
        $this->db->set('produitidProd', $idProd);
        $this->db->set('prixVendu', $prixActuel);
        $this->db->set('idVendeur', $idVendeur);
        $this->db->set('idAcheteur', $idAcheteur);
        $this->db->set('date', $date);
        return $this->db->insert("produitVendu");
    }
    public function updateEtat($idProd)
    {
         $this->db->set('etat',"vendu");
        $this->db->where('idProd', $idProd);
        return $this->db->update($this->table);
    }
    public function mesProduit($idAcheteur)
    {
          $sql = "select * from produit inner join produitVendu on produit.idProd=produitVendu.produitidProd where produitVendu.idAcheteur ='".$idAcheteur."' ";
        $query = $this->db->query($sql);
        $produit = array();
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                $produit[] = $row;
            }
            return $produit;
        }
    }
}
?>