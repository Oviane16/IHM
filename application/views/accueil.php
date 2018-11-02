<?php
  $this->load->view("header1");
?>

     <link href="<?php echo css_url("vendors/bootstrap/dist/css/bootstrap.min.css")?>" rel="stylesheet">
     <link href="<?php echo css_url("vendors/font-awesome/css/font-awesome.min.css")?>" rel="stylesheet">
       <link href="<?php echo css_url("build/css/custom.min.css")?>" rel="stylesheet">
        <link href="<?php echo css_url("bootstrapValidator.min.css")?>" rel="stylesheet">

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

          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Contacts Design</h3>
              </div>
              <br/><br/>
              <div class="title_right">
                <div class="col-md-9 col-sm-9 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" id="mocle" placeholder="tapez ici le nom de produit">
                    <span class="input-group-btn">
                      <button class="btn btn-default" id="rechercher" type="button">Rechercher</button>
                    </span>
                  </div>
                </div>
              </div>

            </div>
            <div class="clearfix"></div>
              <?php
                if(isset($nom))
                {?>
                    <div class="alert alert-success">
                       Felicitation  <strong><?php echo $nom ?></strong> Votre compre a été bien créer!
                    </div>
                <?php 
              }
               ?>
                    
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

                    <div class="row" id="listProd">                      
                        <?php if(isset($produits))
                      {
                        foreach ($produits as $produit) 
                        {
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
                            <?php
                              if($this->session->userdata("id") != $produit->utilisateuridUtilisateur)
                              {
                                ?>
                                 <button data-target="#myModal" id="prix" value="<?php echo $produit->idProd ?>"  data-toggle="modal" class="btn btn-success dropdown-toggle btn-xs" type="button" >prix</button>
                                <?php
                              }
                             ?>
                           <a href="<?php echo site_url("ProduitController/detailProd/$produit->idProd") ?>">
                             <button class="btn btn-default dropdown-toggle btn-xs" type="button" >detail</button>
                           </a>
                            
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

             <script src="<?php echo js_url("js/moment/moment.min.js")?>" type="text/javascript"></script>


        <script src="<?php echo js_url("build/js/custom.min.js")?>" type="text/javascript"></script>
          <!-- form validation -->
    <script src="<?php echo js_url("bootstrapValidator.min.js")?>" type="text/javascript"></script>    
  <!-- /form validation -->

<script>
$("document").ready(function () {
    $(".col-md-55 #prix").click(function () {
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
    $("#mocle").keyup(function () {
      var mocle1 = $("#mocle").val();
      if(mocle1=='')
      {
           $.ajax({
                    url: "http://localhost/IHM/index.php/ProduitController/keyvide",
                    type: 'POST',
                    data: form_data,
                    success:function(data)
                    {
                        $("#listProd").empty().hide();
                        $("#listProd").append(data);
                        $("#listProd").fadeIn(100);
                    }
                });
      }
      else
      {
         var form_data = {
                      mocle : mocle1
                    };
                 $.ajax({
                    url: "http://localhost/IHM/index.php/ProduitController/rechercher",
                    type: 'POST',
                    data: form_data,
                    success:function(data)
                    {
                        $("#listProd").empty().hide();
                        $("#listProd").append(data);
                        $("#listProd").fadeIn(100);
                    }
                });
        }
        });
      
  
    });
</script>
  </body>
</html>