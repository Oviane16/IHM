<?php if(isset($produits))
{
  foreach ($produits as $produit) {
    ?>
   <form id="suppProduit" method="POST" action="<?php echo site_url("ProduitController/confirmeVendre") ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Voulez-vous sûre?</h4>
          </div>
          <div  class="modal-body">
            <p><h4>Voulez-vous vraiment vendre ce produit à <?php if(isset($utilsateurs))
            {
              foreach ($utilsateurs as $utilsateur) {
                echo $utilsateur->nomUtilisateur;
                ?>
                 <input type="hidden" value="<?php echo $utilsateur->idUtilisateur ?>" name="idAcheteur">

                <?php
              }
            } ?></h4></p>
            <input type="hidden" value="<?php echo $produit->idProd ?>" name="id">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nom">Nom de produit <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  value="<?php echo $produit->nomProduit; ?>" id="nom" class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="description" value="<?php echo $produit->description; ?>"  class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Prix <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="description" name="prixActuel" value="<?php echo $produit->prixActuel; ?>"  class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>
                       <div class="row">
                          <div class="col-sm-4"></div>
                          <div class="col-sm-4">
                              Image</br>
                            <img src="<?php echo img_url("uploads/$produit->image") ?>" class="img-thumbnail" alt="Cinque Terre" width="100" height="100">
                              
                             </div>
                          <div class="col-sm-4"></div>
                        
                        </div>
                         

                        
                  </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
            <button type="submit" class="btn btn-danger">Oui</button>
          </div>
        </div>
      </form>


    <?php
  }
} ?>

