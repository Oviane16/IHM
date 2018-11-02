                   
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
                      }
                      else {
                         ?>
                         Auccun produit trouvé pour <?php if(isset($mocle))
                         {
                            echo $mocle;
                         } ?>
                         <?php
                       } ?>