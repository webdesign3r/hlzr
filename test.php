<?php
 
  $checkin = $_POST['checkin'];
  $checkout  = $_POST['checkout'];
  $personen = $_POST['personen'];

  $newcheckin = date("d.m.Y", strtotime($checkin));
  $newcheckout = date("d.m.Y", strtotime($checkout));

?>

<?= $newcheckin ?><br><?= $newcheckout ?><br><?= $personen ?>

