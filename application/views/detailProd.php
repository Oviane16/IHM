<?php
  $this->load->view("header1");
?>

<link href="<?php echo css_url("vendors/bootstrap/dist/css/bootstrap.min.css")?>" rel="stylesheet">
<link href="<?php echo css_url("vendors/font-awesome/css/font-awesome.min.css")?>" rel="stylesheet">
<link href="<?php echo css_url("vendors/font-awesome/css/font-awesome.min.css")?>" rel="stylesheet">
<link href="<?php echo css_url("vendors/normalize-css/normalize.css")?>" rel="stylesheet">
<link href="<?php echo css_url("vendors/ion.rangeSlider/css/ion.rangeSlider.css")?>" rel="stylesheet">
<link href="<?php echo css_url("vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css")?>" rel="stylesheet">
<link href="<?php echo css_url("vendors/cropper/dist/cropper.min.css")?>" rel="stylesheet">
<link href="<?php echo css_url("build/css/custom.min.css")?>" rel="stylesheet">
<!-- form validation -->
<link href="<?php echo css_url("bootstrapValidator.min.css")?>" rel="stylesheet">
    <!-- Datatable css -->
    <link href="<?php echo css_url("dataTables.bootstrap.min.css")?>" rel="stylesheet">
    <!-- /Datatable css -->     
  
  <!-- /form validation -->


<?php
  $this->load->view("header2");
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
              <div id="donneurPrix">
                
              </div>
              <div id="formPrix">
                
              </div>
            </div>
        </div>
      </div>
    </div>
  <!-- Modal donner prix -->
       <!-- modal de suppression-->

    <div id="suppression" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div id="formSupp" class="modal-content">

        </div>
      </div>
    </div>
    <!-- /modal de suppression-->
          <div class="">
           
            <div class="clearfix"></div>			
			
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detail du <?php if(isset($produits))
                    {
                      foreach ($produits as $produit) {
                        $nomUtilisateur = $produit->nomUtilisateur;
                        $idProd = $produit->idProd;
                        $prix = $produit->prixActuel;
                        echo $produit->nomProduit;
                    ?></small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                          
                    <div class="col-md-7 col-sm-7 col-xs-12">
                      <div class="product-image">
                        <img src="<?php echo img_url("uploads/$produit->image") ?>" alt="..." />
                      </div>
                      <div class="product_gallery">
                        
                      </div>
                    </div>

                        <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

                      <h3 class="prod_title"> <?php echo $produit->nomProduit; ?></h3>

                      <p>Desrctiption : </br>
                        <?php echo $produit->description; ?></p>
                      <br />
                      L'utilisateur qui a ajouté ce produit : 
                      <?php echo $produit->nomUtilisateur; ?><br/>
                  <?php
                      }
                    } ?>
                    <p>Les utilisateurs qui ont donné le prix :</p>
                        <table class="table">
                           <thead>
                              <tr>
                                <th>Nom</th>
                                <th>Prix donné</th>
                                <th>Date</th>
                                </tr>
                            </thead>
                         <tbody>
                        <?php 
                          if(isset($utilisateurs))
                          {
                              foreach ($utilisateurs as $utilisateur) {
                                ?>
                                  <tr>
                                    <td><?php echo $utilisateur->nomUtilisateur; ?></td>
                                    <td><?php echo $utilisateur->prix; ?></td>
                                    <td><?php echo $utilisateur->date; ?></td>
                                  </tr>
                                 
                              <?php
                              }
                          }
                          else
                          {
                            ?> 
                            <p>Auccun utilisateur</p>
                            <?php
                          }
                        ?>
                        </tbody>
                        </table>

                      <br />

                  
                      <br />
                      Prix actuel donné par : <?php 
                        if(isset($donneurPrixEleve))
                        {
                          foreach ($donneurPrixEleve as $donneurPrixElev) {
                            echo $donneurPrixElev->nomUtilisateur;
                          }
                        }
                      ?>
                      <div class="">
                        <div class="product_price">
                          <h1 class="price"><?php echo $prix; ?> Ar</h1>
                        </div>
                      </div>

                      <div class="">
                        <?php
                          if($nomUtilisateur!=$this->session->userdata("nom"))
                          {
                            ?>
                            <button type="button" id="prix" data-target="#myModal" value="<?php echo $idProd ?>" data-toggle="modal" class="btn btn-success">Augmenter Prix</button>
                            <?php
                          }
                         ?>
                        
                      </div>

                      <div class="product_social">
                        <ul class="list-inline">
                         
                        </ul>
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


	<script src="<?php echo js_url("vendors/jquery/dist/jquery.min.js")?>" type="text/javascript"></script>
     <script src="<?php echo js_url("vendors/bootstrap/dist/js/bootstrap.min.js")?>" type="text/javascript"></script>
      <script src="<?php echo js_url("vendors/fastclick/lib/fastclick.js")?>" type="text/javascript"></script>
       <script src="<?php echo js_url("vendors/nprogress/nprogress.js")?>" type="text/javascript"></script>

		   <!-- bootstrap-daterangepicker -->
	     <script src="<?php echo js_url("js/moment/moment.min.js")?>" type="text/javascript"></script>
       <script src="<?php echo js_url("build/js/custom.min.js")?>" type="text/javascript"></script>		
        <!-- form validation -->
       <script src="<?php echo js_url("bootstrapValidator.min.js")?>" type="text/javascript"></script>    
        <!-- /form validation -->

<script>
$("document").ready(function () {
    $("#prix").click(function () {
      var id = $(this).val();
                $.ajax({
                    url: "http://localhost/IHM/index.php/PrixController/getProduit/"+id,
                    type: "GET",
                    success:function(data)
                    {
                        $("#formPrix").empty().hide();
                        $("#formPrix").append(data);
                        $("#formPrix").fadeIn(100);
                    }
                });
                 $.ajax({
                    url: "http://localhost/IHM/index.php/PrixController/getDonneurPrix/"+id,
                    type: "GET",
                    success:function(data)
                    {
                      //donneurPrix
                        $("#donneurPrix").empty().hide();
                        $("#donneurPrix").append(data);
                        $("#donneurPrix").fadeIn(100);
                    }
                });


        });
    });
</script>s

  </body>
</html>