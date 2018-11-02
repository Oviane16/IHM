<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Longin au vente aux enchères </title>

      <link href="<?php echo css_url("vendors/bootstrap/dist/css/bootstrap.min.css")?>" rel="stylesheet">
        <link href="<?php echo css_url("vendors/font-awesome/css/font-awesome.min.css")?>" rel="stylesheet">
          <link href="<?php echo css_url("vendors/bootstrap/dist/css/bootstrap.min.css")?>" rel="stylesheet">
            <link href="<?php echo css_url("build/css/custom.min.css")?>" rel="stylesheet">
              <script src="<?php echo js_url("vendors/jquery/dist/jquery.min.js")?>" type="text/javascript"></script>

              <!-- form validation -->
<link href="<?php echo css_url("bootstrapValidator.min.css")?>" rel="stylesheet">
  <!-- /form validation -->
    <!-- form validation -->
    <script src="<?php echo js_url("bootstrapValidator.min.js")?>" type="text/javascript"></script>    
  <!-- /form validation -->
  

  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="fomConnexion" method="POST" action="<?php echo site_url("LoginController/seconnecter") ?>">
              <h1>Authentification</h1>
              <?php if(isset($erreurLog))
              {
                ?>
                <div class="alert alert-danger">
                  Atention! adresse email ou mot de passe incorrecte!
              </div>

              <?php
              } ?>
              <div>
                <input type="text" id="email" name="email" class="form-control" placeholder="Adresse Email" required="required"/>
              </div>
              <div>
                <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe" required="" />
              </div>
              <div>
              <div class="form-group">
                 
              <div id="messages"></div>
              </div>
               

                <button type="submit" class="btn btn-success">Se connecter</button>

                <a class="reset_pass" href="#">Mot de passe oublié</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Vous êtes nouveau?
                  <a href="<?php echo site_url("InscriptionController")?>" class="to_register"> Créer nouveau compte </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h2></i> Authentification à la site de vente aux enchères</h2>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1>Site de vente au enchère</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>

    <script>
$(document).ready(function() {
    $('#fomConnexion').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'l\'email doit être rempli'
                    },
                    emailAddress: {
                        message: 'Veuiller entre un email valide'
                    }
                }
            },
            mdp: {
                validators: {
                    notEmpty: {
                        message: 'Le mot de passe doit être rempli'
                    },
                    
                }
            },
 
        }
    });
});
</script>
  </body>
</html>