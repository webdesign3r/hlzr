<?php

if (isset($_POST["checkin"]) && !empty($_POST["checkin"])) {
    $intro_checkin = $_POST['checkin'];
    $new_intro_checkin = date("d.m.Y", strtotime($intro_checkin));
}else{
    $intro_checkin = "tt.mm.jjjj";
}

if (isset($_POST["checkout"]) && !empty($_POST["checkout"])) {
    $intro_checkout = $_POST['checkout'];
    $new_intro_checkout = date("d.m.Y", strtotime($intro_checkout));
}else{
    $new_intro_checkout = "tt.mm.jjjj";
}

if (isset($_POST["personen"]) && !empty($_POST["personen"])) {
    $intro_personen = $_POST['personen'];
}else{
    $intro_personen = "1";
}

if (isset($_POST["wohnung_id"]) && !empty($_POST["wohnung_id"])) {
    $wohnung = $_POST['wohnung_id'];
}else{
    $wohnung = "1";
}

  // $intro_checkin = $_POST['checkin'];
  // $intro_checkout  = $_POST['checkout'];
  // $intro_personen = $_POST['personen'];

  // $new_intro_checkin = date("d.m.Y", strtotime($intro_checkin));
  // $new_intro_checkout = date("d.m.Y", strtotime($intro_checkout));

?>
