<?php
//KAYITLARRRRRR
// Tek Kay�t Getir
function get_account()
{

	if (isset($_GET["id"])) {

		$id = $_GET["id"];

		include "libraries/db.php";
		return $db->query("SELECT * FROM account WHERE id=$id")->fetch(PDO::FETCH_OBJ);

	}
}

// T�m kay�tlar� getir
function get_all_accounts()
{
	$sid=$_SESSION["user"]->id;
	include "libraries/db.php";
	return $db->query("SELECT * FROM account WHERE user_id={$sid}")->fetchAll(PDO::FETCH_OBJ);
}

function get_aall_accounts()
{
	$sid=$_SESSION["user"]->id;
	include "libraries/db.php";
	return $db->query("SELECT * FROM account WHERE isActive=1 AND user_id={$sid}")->fetchAll(PDO::FETCH_OBJ);
}

function get_all_posts($sid,$aid){
	include "libraries/db.php";	
	$uid=$_SESSION["user"]->id;
	$sql="SELECT SUM(`amount`) as `total_amount` FROM finance WHERE  (`statement`={$sid}) AND (`account_id`={$aid}) AND (`isActive`=1) AND (user_id={$uid}) ORDER BY adate desc ,id desc";
	//print_r($sql);
	return $db->query($sql)->fetch(PDO::FETCH_OBJ);
/*

    include "libraries/db.php";
    if ($_SESSION["user"]->sbox=='Admin'){
		return $db->query("SELECT * FROM finance")->fetchAll(PDO::FETCH_OBJ);	
	}else{
		$userid=$_SESSION["user"]->id;
		return $db->query("SELECT * FROM finance WHERE user_id=$userid")->fetchAll(PDO::FETCH_OBJ);	
	}
*/    
}

// ekleme
function transfer_account()
{
   $sid=$_SESSION["user"]->id;	
   include "libraries/db.php";
   $cat_id= $db->query("SELECT * FROM category WHERE user_id={$sid} AND isHidden=2")->fetch(PDO::FETCH_OBJ);
   $insert_query = "INSERT INTO finance SET 
        `amount` = :amount,
		`title` = :title,
		`statement` = :statement,
		`cat_id` = :cat_id,
		`adate` = :adate,
		`account_id` = :account_id,
		`user_id`= :user_id,
		`isActive` = :isActive
        ";
		//$_POST["adate"]
		
		$nDate = date("Y-m-d");
		
        $data = array(
        "statement" => 2,
		"amount"		=> $_POST["amounth"],
		"title"          => $_POST["title"],
		"cat_id"    => $cat_id->id,
		"adate"      => $nDate,
		"account_id"      => $_POST["accfh"],
		"user_id"		=> $sid,
		"isActive"      => 1
		);

	//$userid=$_SESSION["user"]->id;
	
   $prepare = $db->prepare($insert_query);
   $rdata=$prepare->execute($data);
   
   $cat_id= $db->query("SELECT * FROM category WHERE user_id={$sid} AND isHidden=1")->fetch(PDO::FETCH_OBJ);	
   
   $insert_query = "INSERT INTO finance SET 
        `amount` = :amount,
		`title` = :title,
		`statement` = :statement,
		`cat_id` = :cat_id,
		`adate` = :adate,
		`account_id` = :account_id,
		`user_id`= :user_id,
		`isActive` = :isActive
        ";
		//$_POST["adate"]
		
		$nDate = date("Y-m-d");
		
        $data = array(
        "statement" => 1,
		"amount"		=> $_POST["amounth"],
		"title"          => $_POST["title"],
		"cat_id"    => $cat_id->id,
		"adate"      => $nDate,
		"account_id"      => $_POST["acch"],
		"user_id"		=> $sid,
		"isActive"      => 1
		);

	//$userid=$_SESSION["user"]->id;
	
	$prepare = $db->prepare($insert_query);
	$rdatb=$prepare->execute($data);
	
	if ($rdata && $rdatb){
		return true;	
	}else{
		return false;
	}
    
}

// ekleme
function insert_account()
{


	include "libraries/db.php";

	//name
	//rate
	//erate
	//isActive
	$sid=$_SESSION["user"]->id;
	
	$prepare = $db->prepare("INSERT INTO account SET
      `name` = :name,
      `rate` = :rate,
	  `erate` = :erate, 
	  `isActive` = :isActive,
	  `user_id` =:user_id,
	  `adate` = :adate"
	  );

	return $prepare->execute(
	array(
	"name"              => $_POST["name"],
	"rate"           	 => $_POST["rate"],
	"erate"           	 => $_POST["erate"],
	"isActive"           => $_POST["isActive"],
	"user_id"           => $sid,
	"adate"          => date("Y-m-d H:i:s")
	)
	);
}

// silme
function delete_account()
{

	include "libraries/db.php";
	$prepare = $db->prepare("DELETE FROM account WHERE id=:id");

	return $prepare->execute(
	array(
	"id"    => $_GET["id"]
	)
	);
}


// duzenleme
function update_account()
{

	//name
	//rate
	//erate
	//isActive
	
	include "libraries/db.php";

	$prepare = $db->prepare("UPDATE `account` SET
	`name` = :name,
	`rate` = :rate,
	`erate` = :erate,
	`isActive` = :isActive 
	 Where `id` = :id
    ");

	return $prepare->execute(
	array(
	"name"              => $_POST["name"],
	"rate"           	 => $_POST["rate"],
	"erate"           	 => $_POST["erate"],
	"isActive"           => $_POST["isActive"],
	"id"                 => $_GET["id"]
	)
	);
}
