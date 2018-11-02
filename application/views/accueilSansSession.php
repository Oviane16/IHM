<?php
  $this->load->view("headerSansSession");
?>

     <link href="<?php echo css_url("vendors/bootstrap/dist/css/bootstrap.min.css")?>" rel="stylesheet">
     <link href="<?php echo css_url("vendors/font-awesome/css/font-awesome.min.css")?>" rel="stylesheet">
       <link href="<?php echo css_url("build/css/custom.min.css")?>" rel="stylesheet">

<?php
  $this->load->view("headerSansSession2");
?>

 <!-- modal  donner Prix -->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Donnner prix</h4>
          </div>
          <div class="modal-body">
              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Prix en ar</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="title">
                  </div>
                </div>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger antoclose" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-success">Donner</button>
          </div>
        </div>
      </div>
    </div>
  <!-- Modal donner prix -->
          <div class="">
            <div class="page-title">
            </div>
            <div class="clearfix"></div>
            <?php
                if(isset($nom))
                {?>
                    <div class="alert alert-success">
                       Felicitation  <strong><?php echo $nom ?></strong> Votre compre a été bien créer! pour se connecter veuiller cliquer <a href="<?php echo site_url("LoginController") ?>">ici</a> pour pouvoir vendre ou acheter un produit
                    </div>
                <?php 
              }
              else
              {
               ?>
                    <div class="alert alert-success">
                       Si vous n'avez pas encore du compte vous pouvez en créer en cliquant <a href="<?php echo site_url("InscriptionController/index") ?>">ici</a>
                       ou si vous en avez, pour se connecter veuiller cliquer <a href="<?php echo site_url("LoginController") ?>">ici</a> pour pouvoir vendre ou acheter un produit
                    </div>
            <?php  } ?>
             
                    
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Liste des produits</h2>
                    
                    <ul class="nav navbar-right panel_toolbox">
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                <div class="row">                      
                        <?php if(isset($produits))
                      {
                        foreach ($produits as $produit) {
                        ?>
                        <div class="col-md-55">

                        <div class="thumbnail">
                          <div class="image view view-first">
                               <img style="width: 100%; display: block;" src="<?php echo img_url("uploads/$produit->image")?>" alt="image" />                            <div class="mask">
                              <div class="tools tools-bottom">                                  
                              </div>
                            </div>
                          </div>
                          <div class="caption">
                            <p><?php echo $produit->nomProduit;?>: <?php echo $produit->description; ?> </p>
                          </div>
                        </div>
                          <p>Prix actuel : <?php echo $produit->prixActuel ?>Ar </br>
                          
                          </p>
                      </div> 
                        <?php
                         }
                      } ?>
                     </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

  <!-- jQuery -->

    <script src="<?php echo js_url("vendors/jquery/dist/jquery.min.js")?>" type="text/javascript"></script>

     <script src="<?php echo js_url("vendors/bootstrap/dist/js/bootstrap.min.js")?>" type="text/javascript"></script>

      <script src="<?php echo js_url("vendors/fastclick/lib/fastclick.js")?>" type="text/javascript"></script>

       <script src="<?php echo js_url("vendors/nprogress/nprogress.js")?>" type="text/javascript"></script>

        <script src="<?php echo js_url("build/js/custom.min.js")?>" type="text/javascript"></script>

  </body>
</html>