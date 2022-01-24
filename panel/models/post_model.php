<?php

// Tek Kayıt Getir
function get_post(){

    if(isset($_GET["id"])){

        $id = $_GET["id"];

        include "libraries/db.php";
        return $db->query("SELECT * FROM finance WHERE id=$id")->fetch(PDO::FETCH_OBJ);

    }

}

// Tüm kayıtları getir
function get_all_posts($date){
	$whereadd='';
	$uid=$_SESSION["user"]->id;
	
	if (is_array($date) ){
		$bDate = str_replace('/', '-',trim($date[0]));
		$bDate = date("Y-m-d", strtotime($bDate));
		$sDate = str_replace('/', '-',trim($date[1]));
		$sDate = date("Y-m-d", strtotime($sDate));
		$whereadd="WHERE (`adate` BETWEEN '{$bDate}' AND '{$sDate}')";
	}elseif ($date=='buay' || $date=='' ){
		 $m_start=date("Y-m-d", strtotime('first day of this month'));
 		 $m_end = date('Y-m-d', strtotime('last day of this month'));
 		 $whereadd="WHERE (`adate` BETWEEN '{$m_start}' AND '{$m_end}')";
 	}elseif ($date=='son7'){
 		 $week_start=date("Y-m-d", strtotime('monday this week'));
 		 //echo $week_start." s<br>\n";
 		 $week_end = date('Y-m-d', strtotime('+6 days', strtotime($week_start)));
  		 $whereadd="WHERE (`adate` BETWEEN '{$week_start}' AND '{$week_end}')";
 	}elseif ($date=='gecay'){
 		$m_laststart = date("Y-m-d",strtotime('first day of last month'));
		$m_lastend = date("Y-m-d",strtotime('last day of last month'));
 		$whereadd="WHERE (`adate` BETWEEN '{$m_laststart}' AND '{$m_lastend}')";
 	}elseif ($date=='buyil'){
 	 	$y_start=date("Y-m-d", strtotime('first day of january'));
 	 	$y_end = date('Y-m-d', strtotime('last day of december'));
 	 	$whereadd="WHERE (`adate` BETWEEN '{$y_start}' AND '{$y_end}')";
 	}elseif ($date=='gecyil'){
 	 	$ly_start=date("Y-m-d", strtotime('first day of january last year'));
 	 	//echo $ly_start." s<br>\n";
 	 	$ly_end = date('Y-m-d', strtotime('last day of december last year'));
 	 	//echo $ly_end." s<br>\n";
 	 $whereadd="WHERE (`adate` BETWEEN '{$ly_start}' AND '{$ly_end}')";
 	}
 	
 	 if ($whereadd<>''){
		$whereadd = "{$whereadd} AND (user_id={$uid})";	 	
	 }else{
	 	$whereadd = "WHERE user_id={$uid}";
	 }
 	 	
	include "libraries/db.php";
	return $db->query("SELECT * FROM finance $whereadd ORDER BY adate desc ,id desc")->fetchAll(PDO::FETCH_OBJ);
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

function get_category($id){
    include "libraries/db.php";
    return $db->query("SELECT * FROM category WHERE id = $id")->fetch(PDO::FETCH_OBJ);
}

function get_categories($cid){
    include "libraries/db.php";
    $sid=$_SESSION["user"]->id;
    return $db->query("SELECT * FROM category WHERE cat={$cid} AND isHidden=0 AND isActive = 1 AND user_id={$sid}")->fetchAll(PDO::FETCH_OBJ);
}

function get_account($id){
    include "libraries/db.php";
    return $db->query("SELECT * FROM account WHERE id = $id")->fetch(PDO::FETCH_OBJ);
}

function get_accounts(){
    include "libraries/db.php";
    $sid=$_SESSION["user"]->id;
    return $db->query("SELECT * FROM account WHERE isActive = 1 AND user_id={$sid}")->fetchAll(PDO::FETCH_OBJ);
}



// ekleme
function insert_post(){

    include "libraries/db.php";
	$sid=$_SESSION["user"]->id;
	
    $insert_query = "INSERT INTO finance SET 
        `amount` = :amount,
		`title` = :title,
		`statement` = :statement,
		`cat_id` = :cat_id,
		`adate` = :adate,
		`account_id` = :account_id,
		`user_id` = :user_id,
		`isActive` = :isActive
        ";
		//$_POST["adate"]
		
		$oDate = str_replace('/', '-',trim($_POST['adate']));
		$nDate = date("Y-m-d", strtotime($oDate));
		
        $data = array(
        "statement" => $_POST["statement"],
		"amount"		=> $_POST["amount"],
		"title"          => $_POST["title"],
		"cat_id"    => $_POST["cat_id"],
		"adate"      => $nDate,
		"account_id"      => $_POST["account_id"],
		"user_id"      => $sid,
		"isActive"      => $_POST["isActive"]
		);

	//$userid=$_SESSION["user"]->id;
	
	$prepare = $db->prepare($insert_query);
		
    return $prepare->execute($data);

}

// silme
function delete_post(){

    include "libraries/db.php";
    $prepare = $db->prepare("DELETE FROM finance WHERE id=:id");


    return $prepare->execute(
        array(
            "id"    => $_GET["id"]
           
        )
    );

}



// duzenleme
function update_post(){

    	include "libraries/db.php";

        $update_query = "UPDATE `finance` SET 
		`amount` = :amount,
		`title` = :title,
		`cat_id` = :cat_id,
		`adate` = :adate,
		`account_id` = :account_id,
		`isActive` = :isActive
        WHERE `id` = :id";
		//$_POST["adate"]
		
		$oDate = str_replace('/', '-',trim($_POST['adate']));
		$nDate = date("Y-m-d", strtotime($oDate));
		
        $data = array(
		"amount"		=> $_POST["amount"],
		"title"          => $_POST["title"],
		"cat_id"    => $_POST["cat_id"],
		"adate"      => $nDate,
		"account_id"      => $_POST["account_id"],
		"isActive"      => $_POST["isActive"], 
        "id"             => $_GET["id"]
        );
	
    
	$prepare = $db->prepare($update_query);
	$rdata=$prepare->execute($data);
    return $rdata;

}