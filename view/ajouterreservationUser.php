<?php
    include_once '../Model/reservation.php';
    include_once '../Controller/reservationC.php';

    $error = "";

    // create reservation
    $reservation = null;
    $message=null;
    // create an instance of the controller
    $reservationC = new reservationC();
    $currentDateTime = date('Y-m-d H:i:s');
            
            $reservation = new Reservation(
				$_GET['id'], 
				$_GET['dest'],
                $_POST['nbr'],
                $currentDateTime
            );
            $reservationC->ajouterreservation($reservation);
            header('Location:reserverUser.php');
        
       
            
          
    

    
?>