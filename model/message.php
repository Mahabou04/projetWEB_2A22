<?php
	class Message{
		private $id_rec=null;
        private $email=null;
		private $message=null;
		
        

        
		
		function __construct( $id_rec, $message,$email){		
			$this->id_rec=$id_rec;
			$this->message=$message;
            $this->email=$email;
			
		
			
		}
		
		function getid_rec(){
			return $this->id_rec;
		}
		function getmessage(){
			return $this->message;
		}
        function getemail(){
			return $this->email;
		}
		
		
		function setid_rec(string $id_rec){
			$this->id_rec=$id_rec;
		}
		function setmessage(string $message){
			$this->message=$message;
		}
        function setemail(string $email){
			$this->email=$email;
		}
		
		
	}


?>