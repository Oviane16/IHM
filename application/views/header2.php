
</head>
<body style="font-family:Comic Sans MS;" class="nav-md">
<div class="container body">
<div class="main_container">
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        
        <div class="clearfix"></div>

        <!-- menu profile quick info -->
             <div class="profile">
              <div class="profile_pic">
                <img src="<?php echo img_url("ariary.jpg")?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <h2>Ventes aux enchères</h2>
              </div>
            </div>
        <!-- /menu profile quick info -->


        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>&nbsp;</h3>
                <ul class="nav side-menu">
                    <li><a href="<?php echo site_url("AccueilController")?>"><i class="fa fa-hospital-o"></i> Accueil <span class="fa fa-chevron-down"></span></a>
                    </li>
                    <li><a href="<?php echo site_url("ProduitController/produitAjoute")?>"><i class="fa fa-hospital-o"></i> Produit <span class="fa fa-chevron-down"></span></a>
                    </li>
                   <li><a href="<?php echo site_url("ProduitController/mesProduit")?>"><i class="fa fa-hospital-o"></i> Produit obtenue <span class="fa fa-chevron-down"></span></a>
                    </li>

                </ul>
            </div>
            

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
 
        <!-- /menu footer buttons -->
    </div>
</div>

<!-- top navigation -->
<div class="top_nav navbar-fixed-top"  >
    <div class="nav_menu" >
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                         <?php
                            if($this->session->userdata("nom")!=null)
                            {
                                ?>
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="" alt=""><?php echo $this->session->userdata("nom"); ?>
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li><a href="javascript:;"> Voir mon profil</a></li>
                                        <li><a href="javascript:;"> Gerer les utilisateur</a></li>
                                        <li><a href="<?php echo site_url("LoginController/deconnecter") ?>"><i class="fa fa-sign-out pull-right"></i>Se deconnecter</a></li>
                                    </ul>
                           <?php }
                           else
                           {
                            ?>
                                     <a href="<?php echo site_url("LoginController") ?>" class="user-profile dropdown-toggle">
                                        Se connecter
                                    </a>
                                   
                            <?php
                           }
                         ?>
                    
                </li>

            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->
<!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main">





