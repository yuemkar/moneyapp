<?php


function getday_income()
{
 include "libraries/db.php";
 $date = date_create();
 $day=date_format($date, 'Y-m-d');
 //(SUM(`amount`) as `total_amount`) 
 return $db->query("SELECT SUM(`amount`) as `total_amount` FROM `finance` WHERE (`statement`=1) AND (`isActive`=1) AND (`adate` BETWEEN '{$day}' AND '{$day}')")->fetch(PDO::FETCH_OBJ);
}

function getweek_income()
{
 include "libraries/db.php";
 //$day = date('w');
 //$week_start = date('Y-m-d', strtotime('-'.$day.' days'));
 //echo date("Y-m-d")." b<br>\n";
 $week_start=date("Y-m-d", strtotime('monday this week'));
 //echo $week_start." s<br>\n";
 $week_end = date('Y-m-d', strtotime('+6 days', strtotime($week_start)));
 //echo $week_end." e<br>\n";
 
 //(SUM(`amount`) as `total_amount`) 
 return $db->query("SELECT SUM(`amount`) as `total_amount` FROM `finance` WHERE (`statement`=1) AND (`isActive`=1) AND (`adate` BETWEEN '{$week_start}' AND '{$week_end}')")->fetch(PDO::FETCH_OBJ);
}

function getmoon_income()
{
 include "libraries/db.php";

 //$week_start = date('Y-m-d', strtotime('-'.$day.' days'));
 //echo date("Y-m-d")." b<br>\n";
 $m_start=date("Y-m-d", strtotime('first day of this month'));
 //echo $m_start." s<br>\n";
 $m_end = date('Y-m-d', strtotime('last day of this month'));
 //echo $m_end." e<br>\n";
 
 //(SUM(`amount`) as `total_amount`) 
 return $db->query("SELECT SUM(`amount`) as `total_amount` FROM `finance` WHERE (`statement`=1) AND (`isActive`=1) AND (`adate` BETWEEN '{$m_start}' AND '{$m_end}')")->fetch(PDO::FETCH_OBJ);
}

function getyear_income()
{
 include "libraries/db.php";

 //$week_start = date('Y-m-d', strtotime('-'.$day.' days'));
 //echo date("Y-m-d")." b<br>\n";
 $y_start=date("Y-m-d", strtotime('first day of january'));
 //echo $y_start." s<br>\n";
 $y_end = date('Y-m-d', strtotime('last day of december'));
 //echo $y_end." e<br>\n";
 
 //(SUM(`amount`) as `total_amount`) 
 return $db->query("SELECT SUM(`amount`) as `total_amount` FROM `finance` WHERE (`statement`=1) AND (`isActive`=1) AND (`adate` BETWEEN '{$y_start}' AND '{$y_end}')")->fetch(PDO::FETCH_OBJ);
}

function gettotal_income()
{
 include "libraries/db.php";

 return $db->query("SELECT SUM(`amount`) as `total_amount` FROM `finance` WHERE (`statement`=1) AND (`isActive`=1)")->fetch(PDO::FETCH_OBJ);
}

function getday_expense()
{
 include "libraries/db.php";
 $date = date_create();
 $day=date_format($date, 'Y-m-d');
 //AND adate BETWEEN '{$day}'"	
 return $db->query("SELECT SUM(`amount`) as `total_amount` FROM `finance` WHERE (`statement`=2) AND (`isActive`=1) AND (`adate` BETWEEN '{$day}' AND '{$day}')")->fetch(PDO::FETCH_OBJ);
}


function getweek_expense()
{
 include "libraries/db.php";
 //$day = date('w');
 //$week_start = date('Y-m-d', strtotime('-'.$day.' days'));
 //echo date("Y-m-d")." b<br>\n";
 $week_start=date("Y-m-d", strtotime('monday this week'));
 //echo $week_start." s<br>\n";
 $week_end = date('Y-m-d', strtotime('+6 days', strtotime($week_start)));
 //echo $week_end." e<br>\n";
 
 //(SUM(`amount`) as `total_amount`) 
 return $db->query("SELECT SUM(`amount`) as `total_amount` FROM `finance` WHERE (`statement`=2) AND (`isActive`=1) AND (`adate` BETWEEN '{$week_start}' AND '{$week_end}')")->fetch(PDO::FETCH_OBJ);
}

function getmoon_expense()
{
 include "libraries/db.php";

 //$week_start = date('Y-m-d', strtotime('-'.$day.' days'));
 //echo date("Y-m-d")." b<br>\n";
 $m_start=date("Y-m-d", strtotime('first day of this month'));
 //echo $m_start." s<br>\n";
 $m_end = date('Y-m-d', strtotime('last day of this month'));
 //echo $m_end." e<br>\n";
 
 //(SUM(`amount`) as `total_amount`) 
 return $db->query("SELECT SUM(`amount`) as `total_amount` FROM `finance` WHERE (`statement`=2) AND (`isActive`=1) AND (`adate` BETWEEN '{$m_start}' AND '{$m_end}')")->fetch(PDO::FETCH_OBJ);
}

function getyear_expense()
{
 include "libraries/db.php";

 //$week_start = date('Y-m-d', strtotime('-'.$day.' days'));
 //echo date("Y-m-d")." b<br>\n";
 $y_start=date("Y-m-d", strtotime('first day of january'));
 //echo $y_start." s<br>\n";
 $y_end = date('Y-m-d', strtotime('last day of december'));
 //echo $y_end." e<br>\n";
 
 //(SUM(`amount`) as `total_amount`) 
 return $db->query("SELECT SUM(`amount`) as `total_amount` FROM `finance` WHERE (`statement`=2) AND (`isActive`=1) AND (`adate` BETWEEN '{$y_start}' AND '{$y_end}')")->fetch(PDO::FETCH_OBJ);
}

function gettotal_expense()
{
 include "libraries/db.php";

 return $db->query("SELECT SUM(`amount`) as `total_amount` FROM `finance` WHERE (`statement`=2) AND (`isActive`=1)")->fetch(PDO::FETCH_OBJ);
}


function get_post()
{

	if (isset($_GET["id"])) {

		$id = $_GET["id"];

		include "libraries/db.php";
		return $db->query("SELECT * FROM finance WHERE id=$id")->fetch(PDO::FETCH_OBJ);

	}
}

// T�m kay�tlar� getir
function get_all_posts()
{

	include "libraries/db.php";
	if ($_SESSION["user"]->sbox=='Admin') {
		return $db->query("SELECT * FROM finance")->fetchAll(PDO::FETCH_OBJ);
	} else {
		$userid=$_SESSION["user"]->id;
		return $db->query("SELECT * FROM finance WHERE user_id=$userid")->fetchAll(PDO::FETCH_OBJ);
	}
}

function get_category($id)
{
	include "libraries/db.php";
	return $db->query("SELECT * FROM category WHERE id = $id")->fetch(PDO::FETCH_OBJ);
}

function get_categories($cid)
{
	include "libraries/db.php";
	return $db->query("SELECT * FROM category WHERE cat={$cid} AND isActive = 1")->fetchAll(PDO::FETCH_OBJ);
}



function get_account($id)
{
	include "libraries/db.php";
	return $db->query("SELECT * FROM account WHERE id = $id")->fetch(PDO::FETCH_OBJ);
}

function get_accounts()
{
	include "libraries/db.php";
	return $db->query("SELECT * FROM account WHERE isActive = 1")->fetchAll(PDO::FETCH_OBJ);
}



// ekleme
function insert_post()
{

	include "libraries/db.php";

	$insert_query = "INSERT INTO finance SET
        `amount` = :amount,
		`title` = :title,
		`statement` = :statement,
		`cat_id` = :cat_id,
		`adate` = :adate,
		`account_id` = :account_id,
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
	"isActive"      => $_POST["isActive"]
	);

	//$userid=$_SESSION["user"]->id;

	$prepare = $db->prepare($insert_query);

	return $prepare->execute($data);
}

// silme
function delete_post()
{

	include "libraries/db.php";
	$prepare = $db->prepare("DELETE FROM finance WHERE id=:id");


	return $prepare->execute(
	array(
	"id"    => $_GET["id"]

	)
	);
}



// duzenleme
function update_post()
{

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