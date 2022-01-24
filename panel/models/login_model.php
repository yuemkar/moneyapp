<?php

// Tek Kayıt Getir
function get_user(){

    if(isset($_POST["email"])){

        include "libraries/db.php";

        $prepare = $db->prepare("SELECT * FROM user WHERE email = :email AND password = :password");

        $prepare->execute(
            array(
                "email" => $_POST["email"],
                "password" => md5($_POST["password"]),
            )
        );
		
        return $prepare->fetch(PDO::FETCH_OBJ);

    }

}

function log_user($ses){
		include "libraries/db.php";
		
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		    $ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
		    $ip = $_SERVER['REMOTE_ADDR'];
		}
   
        $prepare = $db->prepare("INSERT INTO user_log SET
        `session_id` =:session_id,
        `user_id` =:user_id,
        `login_date` =:login_date,
        `ip` =:ip
        ");
        
        $sesid=session_id();
		$nDate = date("Y-m-d H:i:s");
        $prepare->execute(
            array(
                "session_id" => $sesid,
                "user_id" => $ses->id,
                "login_date" => $nDate,
                "ip" => $ip,
            )
        );
		
        return true;
}

function log_user_logout($ses){
		include "libraries/db.php";
		
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		    $ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
		    $ip = $_SERVER['REMOTE_ADDR'];
		}
   
        $prepare = $db->prepare("UPDATE user_log SET
        	`logout_date` =:logout_date
			WHERE `session_id`=:session_id;
        ");
        
        $sesid=session_id();
		$nDate = date("Y-m-d H:i:s");
        $prepare->execute(
            array(
                "session_id" => $sesid,
                "logout_date" => $nDate
            )
        );
		
        return true;

}
