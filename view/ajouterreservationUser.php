<?php
    include_once '../Model/reservation.php';
    include_once '../Controller/reservationC.php';
    session_start();
    $error = "";

    // create reservation
    $reservation = null;
    $message=null;
    // create an instance of the controller
    $reservationC = new reservationC();
    $currentDateTime = date('Y-m-d H:i');
    $nbr="";
    if(isset($_POST['nbr'])){
        $nbr=$_POST['nbr'];
    }
    else{
        $nbr=$_GET['nbr']; 
    }
            $reservation = new Reservation(
				$_GET['id'], 
				$_GET['dest'],
                $nbr,
                $currentDateTime
            );
            if(isset($_GET['payement'])){
                $reservationC->ajouterreservationPay($reservation);
            }   else{
                $reservationC->ajouterreservation($reservation);
            }
           
            $session=gzinflate($_SESSION['key']);
            $res=json_decode($session,true);
            $to      = $res['email'];
    $subject = 'reservation';
    $message = 'vous avez reserve pour la destination '.$_GET['arrive'].' pour '.$nbr.' personnes ';
    $headers = array(
    'From' => 'mohamedaziz.jellazi@esprit.com',
    'Reply-To' => 'mohamedaziz.jellazi@esprit.com',
    'X-Mailer' => 'PHP/' . phpversion()
);
mail($to, $subject, $message, $headers);
header('Location:reserverUser.php');
        
           
              
                
            
            
          
    

    
?>
