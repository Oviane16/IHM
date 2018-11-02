<?php 
  if(isset($produits))
  {
      foreach ($produits as $produit) {
        ?>
          
              <form id="formDonnerPrix" method="POST" action="<?php echo site_url('PrixController/donnerPrix') ?>" data-parsley-validate class="form-horizontal form-label-left">
                <input type="hidden" value="<?php echo $produit->idProd ?>" name="idProd">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Prix Actuel</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?php echo $produit->prixActuel ?>" id="title" name="title" readonly> Ar
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Votre prix</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="prix" name="prix">Ar
                  </div>
                </div>
                <div class="form-group">
                          <div class="col-md-9 col-md-offset-3">
                          <div id="messages"></div>
                        </div>
              <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-success">Donner</button>
          </div>
              </form>
      <?php
      }
  }
?>

       <script>
$(document).ready(function() {
    $('#formDonnerPrix').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            prix: {
                validators: {
                    notEmpty: {
                        message: 'le prix doit être rempli'
                    },
                    <?php if($produit->prixActuel!=0)
                    { ?>
                       between: {
                        min: <?php echo $produit->prixActuel ?>,
                        max :10000000000,
                        message: 'vouz devez donner un prix superieur à <?php echo $produit->prixActuel?> Ar'
                      }
                    <?php
                    }else
                    { ?>
                        between: {
                        min: 0,
                        max :100000000000,
                        message: 'vouz devez donner un prix superieur à 0 10000000000'
                      },
                        <?php
                    }?>
                   
                }
            }

        }
    });
});
</script>