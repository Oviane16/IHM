<?php if(isset($produits))
{
  foreach ($produits as $produit) {
    ?>
   <form id="modifProduit" method="POST" action="<?php echo site_url("ProduitController/modifierProd") ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Donnner prix</h4>
          </div>
          <div  class="modal-body">
            <input type="hidden" value="<?php echo $produit->idProd ?>" name="id">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nom">Nom de produit <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" value="<?php echo $produit->nomProduit; ?>" id="nom" name="nom" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="description" value="<?php echo $produit->description; ?>" name="description" required="required" class="form-control col-md-7 col-xs-12">
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
                         

                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Selectionner un nouvelle image pour le remplacer
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">
                               image <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <span class="btn btn-default btn-file">
                          <input type="file" id="image" name="image" >
                          </span>
                        </div>
                      </div>
                       
                        <div class="form-group">
                          <div class="col-md-9 col-md-offset-3">
                          <div id="messages"></div>
                        </div>

                      
                  </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-success">Enregistrer</button>
          </div>
        </div>
      </form>


    <?php
  }
} ?>
<script>
$(document).ready(function() {
    $('#modifProduit').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nom: {
                validators: {
                    notEmpty: {
                        message: 'Le nom du produit doit être rempli'
                    }
                }
            },
          description: {
                validators: {
                    notEmpty: {
                        message: 'La description doit être remplie'
                    }
                }
            },

        }
    });
});
</script>
