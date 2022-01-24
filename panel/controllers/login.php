<?php

session_start();

// SQL İşlemlerinin yapıldığı Model dosyasının yüklenmesi
include "models/login_model.php";

function login(){

    if(isset($_SESSION['user'])){
        header("location:post.php");
    } else {
        include "views/login/login.php";
    }

}



function do_login(){

    $user = get_user();

    if($user) {
		session_regenerate_id();
        $_SESSION["user"] = $user;
		
		
        $_SESSION["alert"] = array(
            "title" => "Başarılı",
            "text"  => "İşlem başarılıdır",
            "type"  => "success"
        );
		$userlog=log_user($_SESSION["user"]);
		
        header("location:post.php");

    } else {

        $_SESSION["alert"] = array(
            "title" => "Başarısız",
            "text"  => "Kullanıcı Bulunamadı!!",
			"type"  => "error"
        );

        header("location:index.php");
    }

}

function logout(){
	$userlog=log_user_logout($_SESSION["user"]);
	unset($_SESSION["user"]);
    session_destroy();
    
	
    header("location:index.php");

}
