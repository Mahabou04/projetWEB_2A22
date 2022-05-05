<?php
    include("../configPayment.php");

    $token = $_POST["stripeToken"];
    $token_card_type = $_POST["stripeTokenType"];
    $email           = $_POST["stripeEmail"];
    $amount          = $_POST["amount"]; 
    $desc            = $_POST["name"];
    $charge = \Stripe\Charge::create([
      "amount" => str_replace(",","",$amount)*100 ,
      "currency" => 'inr',
      "description"=>$desc,
      "source"=> $token,
    ]);

    if($charge){
      
      header("Location:ajouterreservationUser.php?nbr=".$_GET["nbr"]."&&arrive=".$_GET["arrive"]."&&dest=".$_GET["dest"]."&&id=".$_GET["id"]."&&payement=yes");
    }
  
  // else{
  //   header("Location:reserverUser.php");
  // }
    
?>
