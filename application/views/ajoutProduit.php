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
  <!-- modal de vente-->
   <div id="modalvente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div id="modalventeContenue" class="modal-content">
        </div>
      </div>
    </div>
      <!-- /modal de vente-->
        <!-- modal de modifcation-->
   <div id="modification" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div id="formModif" class="modal-content">
        </div>
      </div>
    </div>
      <!-- /modal de modifcation-->
       <!-- modal de suppression-->

    <div id="suppression" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div id="formSupp" class="modal-content">

        </div>
      </div>
    </div>
    <!-- /modal de suppression-->

          <div class="">
            <div class="page-title">
            </div>
            <div class="clearfix"></div>			
			
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Formulaire d'ajout de produit</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  
                    <!-- End SmartWizard Content -->
				<div class="x_content">
                    <br />
                    <?php 
                    if(isset($error)){
                      echo $error;
                    } 
                    ?>
                    <form id="ajoutProduit" method="POST" action="<?php echo site_url("ProduitController/ajoutProduit") ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nom">Nom de produit <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nom" name="nom" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
						 <div class="col-xs-5 messageContainer"></div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="description" name="description" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                 
					           <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="prenom">Image  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						            <span class="btn btn-default btn-file">
                          <input type="file" id="image" name="image" required="required" >
						              </span>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                       
                        <div class="form-group">
                          <div class="col-md-9 col-md-offset-3">
                          <div id="messages"></div>
                        </div>

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Ajouter</button>
                        </div>
                      </div>

                    </form>
                    </div>
                  </div>
                  <div class="x_title">
                    <h2>Liste de mes produits</small></h2>
                  
                    <div class="clearfix"></div>


                          <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Apercue</th>
                                <th>Date d'ajout</th>
                                <th></th>
                              </tr>
                            </thead>


                            <tbody>

                               <?php
                                    if(isset($produits))
                                      {
                                          foreach ($produits as $produit) {
                                          ?>
                                             <tr>
                                                <td><?php echo $produit->nomProduit; ?></td>
                                                <td><?php echo $produit->description ?></td>
                                                <td>
                                                     <img style="width:60px;" class="img-responsive" src="<?php echo img_url("uploads/$produit->image")?>" alt="image" />
                                                </td>
                                                <td><?php echo $produit->dateAjout ?>
                                                </td>
                                                <td>
                                                  <div class="btn-group">
                                                      <button  type="button" class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                      <span class="caret"></span>
                                                      </button>
                                                      <ul  class="dropdown-menu" role="menu">
                                                         <li id="modifier" value="<?php echo $produit->idProd ?>"> <a href="" data-target="#modification"  data-toggle="modal">  Modifier</a></li>
                                                         <li id="supprimmer" value="<?php echo $produit->idProd ?>"> <a href="" data-target="#suppression"  data-toggle="modal">Supprimmer</li>
                                                         <li><a href="<?php echo site_url("ProduitController/detailProd/$produit->idProd") ?>">Detail</li>
                                                          <?php
                                                            if($produit->prixActuel!=0)
                                                            {
                                                              ?>
                                                              <li id="vendre" value="<?php echo $produit->idProd  ?>"><a data-target="#modalvente"  data-toggle="modal">vendre</li>
                                                              <?php
                                                            }
                                                           ?>
                                                          
                                                      </ul>
                                                   </div>
                                                </td>
                                              </tr>
                                          <?php
                                          }
                                      }
                               ?>
                            </tbody>
                          </table>  
                  </div>
                    <!-- End SmartWizard Content -->
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
           <!-- Datatable js -->
        <script src="<?php echo js_url("jquery.dataTables.min.js")?>" type="text/javascript"></script> 
                <script src="<?php echo js_url("dataTables.bootstrap.min.js")?>" type="text/javascript"></script>    
                <script src="<?php echo js_url("dataTables.buttons.min.js")?>" type="text/javascript"></script>    
                    <!-- /Datatable js -->
<script>

    $(document).ready(function() {

        $('.table').dataTable( {
            "language": {
                "sProcessing":     "Traitement en cours...",
                "sSearch":         "Rechercher&nbsp;:",
                "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
                "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                "sInfoPostFix":    "",
                "sLoadingRecords": "Chargement en cours...",
                "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
                "oPaginate": {
                    "sFirst":      "Premier",
                    "sPrevious":   "Pr&eacute;c&eacute;dent",
                    "sNext":       "Suivant",
                    "sLast":       "Dernier"
                },
                "oAria": {
                    "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                }
            }
        } );
    });
</script>
<script>
$(document).ready(function() {
    $('#ajoutProduit').bootstrapValidator({
 //       container: '#messages',
		   err: {
            container: function($field, validator) {
                // Look at the markup
                //  <div class="col-xs-4">
                //      <field>
                //  </div>
                //  <div class="col-xs-5 messageContainer"></div>
                return $field.parent().next('.messageContainer');
            } },
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
          image: {
                validators: {
                    notEmpty: {
                        message: 'Vous devez choisir une image'
                    }
                }
            },
 
        }
    });
});
</script>
<script>
$("document").ready(function () {
    $("table tbody tr td div ul #supprimmer").click(function () {
      var id = $(this).val();
                $.ajax({
                    url: "http://localhost/IHM/index.php/ProduitController/getProduitSupp/"+id,
                    type: "GET",
                    success:function(data)
                    {
                        $("#formSupp").empty().hide();
                        $("#formSupp").append(data);
                        $("#formSupp").fadeIn(500);
                    }
                });


        });
     $("table tbody tr td div ul #modifier").click(function () {
      var id = $(this).val();
                $.ajax({
                    url: "http://localhost/IHM/index.php/ProduitController/getProduit/"+id,
                    type: "GET",
                    success:function(data)
                    {
                        $("#formModif").empty().hide();
                        $("#formModif").append(data);
                        $("#formModif").fadeIn(500);
                    }
                });


        });
     $("table tbody tr td div ul #vendre").click(function () {
      var id = $(this).val();
                $.ajax({
                    url: "http://localhost/IHM/index.php/ProduitController/vendre/"+id,
                    type: "GET",
                    success:function(data)
                    {
                        $("#modalventeContenue").empty().hide();
                        $("#modalventeContenue").append(data);
                        $("#modalventeContenue").fadeIn(500);
                    }
                });


        });
    });
</script>
  </body>
</html>