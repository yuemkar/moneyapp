<?php

// SQL İşlemlerinin yapıldığı Model dosyasının yüklenmesi
include "models/user_model.php";

function get_add_page(){
    include "views/user/add.php";
}
function get_list_page(){

    $users = get_all_users();

    include "views/user/list.php";
}
function get_update_page(){

    $user = get_user();

    include "views/user/update.php";
}

function get_logs_page(){
	$uid=isset($_GET['id'])?$_GET['id']:'0';
	$logs = get_logs($uid);
	include "views/user/log.php";
}


function save(){


    $insert = insert_user();

    if($insert){


        $_SESSION["alert"] = array(
            "title" => "Başarılı",
            "text"  => "İşlem başarılıdır",
            "type"  => "success"
        );


    } else {

        $_SESSION["alert"] = array(
            "title" => "Başarısız",
            "text"  => "İşlem başarısızdır",
            "type"  => "error"
        );

    }

    header("Location:user.php");


}
function update(){

    $update = update_user();

    if($update) {


        $_SESSION["alert"] = array(
            "title" => "Başarılı",
            "text"  => "İşlem başarılıdır",
            "type"  => "success"
        );


    } else {

        $_SESSION["alert"] = array(
            "title" => "Başarısız",
            "text"  => "İşlem başarısızdır",
            "type"  => "error"
        );
    }

    header("Location:user.php");

}
function delete(){

    if(isset($_GET["id"])){

        $delete = delete_user();

        if($delete) {

            $_SESSION["alert"] = array(
                "title" => "Başarılı",
                "text"  => "İşlem başarılıdır",
                "type"  => "success"
            );

        } else {

            $_SESSION["alert"] = array(
                "title" => "Başarısız",
                "text"  => "İşlem başarısızdır",
                "type"  => "error"
            );

        }

        header("Location:user.php");

    }

}