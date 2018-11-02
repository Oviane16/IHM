<p>Les utilisateurs qui ont donné le prix</p>
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