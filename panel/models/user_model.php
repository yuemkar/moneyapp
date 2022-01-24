<?php

// Tek Kayıt Getir
function get_user(){

    if(isset($_GET["id"])){

        $id = $_GET["id"];

        include "libraries/db.php";
        return $db->query("SELECT * FROM user WHERE id=$id")->fetch(PDO::FETCH_OBJ);

    }

}

// Tüm kayıtları getir
function get_all_users(){

    include "libraries/db.php";
    return $db->query("SELECT * FROM user")->fetchAll(PDO::FETCH_OBJ);
}

function get_logs($uid)
{
	include "libraries/db.php";
	return $db->query("SELECT * FROM user_log WHERE user_id={$uid}")->fetchAll(PDO::FETCH_OBJ);
}



// ekleme
function insert_user(){


    include "libraries/db.php";


    $prepare = $db->prepare("INSERT INTO user SET 
      full_name = :full_name,
      email = :email,
      password = :password,
      isActive = :isActive,
      sbox = :sbox,
      createdAt = :createdAt");

      $pp = $prepare->execute(
        array(
            "full_name"          => $_POST["full_name"],
            "email"              => $_POST["email"],
            "password"           => md5($_POST["password"]),
            "isActive"           => $_POST["isActive"],
            "sbox"           => $_POST["sbox"],
            "createdAt"          => date("Y-m-d H:i:s")
        )
    );
        $lastid=$db->lastInsertId();
        //echo $lastid;
    	$prepare2=$db->prepare("
    	DROP TEMPORARY TABLE IF EXISTS tmptable_1;
    	CREATE TEMPORARY TABLE tmptable_1 SELECT * FROM category WHERE user_id = 0;
		UPDATE tmptable_1 SET user_id = {$lastid},id=null;
		INSERT INTO category SELECT * FROM tmptable_1;
		DROP TEMPORARY TABLE IF EXISTS tmptable_1;
		DROP TEMPORARY TABLE IF EXISTS tmptable_2;
    	CREATE TEMPORARY TABLE tmptable_2 SELECT * FROM account WHERE user_id = 0;
		UPDATE tmptable_2 SET user_id = {$lastid},id=null;
		INSERT INTO account SELECT * FROM tmptable_2;
		DROP TEMPORARY TABLE IF EXISTS tmptable_2;"		
		);
		$pp2 = $prepare2->execute();				
					
	return $pp;
	
}

// silme
function delete_user(){

    include "libraries/db.php";
    $prepare = $db->prepare("DELETE FROM user WHERE id=:id");
	$prepare->execute(array("id"=> $_GET["id"] ));
	
	$prepare = $db->prepare("DELETE FROM category WHERE user_id=:id");
	$prepare->execute(array("id"=> $_GET["id"] ));

	$prepare = $db->prepare("DELETE FROM finance WHERE user_id=:id");
	$prepare->execute(array("id"=> $_GET["id"] ));
	
    return true;

}

// duzenleme
function update_user(){

    include "libraries/db.php";

    $password = $_POST["password"];

    if ($password) {

        $update_query = "UPDATE user SET 
        full_name = :full_name,
        email = :email,
        password = :password,
        isActive = :isActive,
        sbox = :sbox,
        WHERE id= :id";

        $data = array(
            "full_name"          => $_POST["full_name"],
            "email"              => $_POST["email"],
            "password"           => md5($_POST["password"]),
            "isActive"           => $_POST["isActive"],
            "sbox"           => $_POST["sbox"],
            "id"                 => $_GET["id"]
        );

    } else {

        $update_query = "UPDATE user SET 
        full_name = :full_name,
        email = :email,
        isActive = :isActive,
        sbox = :sbox
        WHERE id= :id";

        $data = array(
            "full_name"          => $_POST["full_name"],
            "email"              => $_POST["email"],
            "isActive"           => $_POST["isActive"],
            "sbox"           => $_POST["sbox"],
            "id"                 => $_GET["id"]
        );

    }

    $prepare = $db->prepare($update_query);

    return $prepare->execute($data);
}
