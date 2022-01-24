<?php

// SQL ݾlemlerinin yap�ld��� Model dosyas�n�n y�klenmesi
include "models/account_model.php";

function get_add_page()
{
	include "views/account/add.php";
}
function get_list_page()
{

	$accounts = get_all_accounts();

	include "views/account/list.php";
}

function get_alist_page()
{
	$mtransfer=isset($_POST['mtransfer'])?$_POST['mtransfer']:false;
	$accfhr=isset($_POST['accfh'])?$_POST['accfh']:false;
	$acch=isset($_POST['acch'])?$_POST['acch']:false;
	if ($mtransfer && $accfhr && $acch){
		$textalert='İşlem Başarısız';
		if ($accfhr<>false&& $acch<>false && $accfhr ==$acch ){
			$update=false;
			$textalert='Hesaplar Aynı Olamaz';
		}else{
			$update = transfer_account();	
			$textalert='İşlem Başarılı';
		}
		
		
		if ($update) {

				$_SESSION["alert"] = array(
				"title" => "İşlem Başarılı",
				"text"  => $textalert,
				"type"  => "success"
				);

			} else {

				$_SESSION["alert"] = array(
				"title" => "İşlem Başarısız",
				"text"  => $textalert,
				"type"  => "error"
				);

			}		
		header("location:account.php?p=alist");
		exit(0);
	}
	$accounts = get_aall_accounts();
	$ftotal=array();
	$fetotal=array();
	foreach ($accounts as $account) {
		$financeg1=get_all_posts(1,$account->id);
		$financer1=$account->erate;
		//print_r($financeg1);
		//print_r($financer1);
		$finance1=$financeg1->total_amount / $financer1;
		
		$financeg2=get_all_posts(2,$account->id);
		$financer2=$account->erate;
		//print_r($financeg2);
		//print_r($financer2);
		$finance2=$financeg2->total_amount / $financer2;
		
		//echo $finance1.' '.$financeg1->total_amount."\n<br>";
		//echo $finance2.' '.$financeg2->total_amount."\n<br>";
		
		$ftotal[$account->id]=$finance1 - $finance2;
		$fetotal[$account->id]= $financeg1->total_amount - $financeg2->total_amount;
		//echo $ftotal[$account->id]."\n<br>";
		
	}
	include "views/account/alist.php";
}

function get_update_page()
{
	$account = get_account();
	include "views/account/update.php";
}

function save()
{


	$insert = insert_account();

	if ($insert) {

		$_SESSION["alert"] = array(
		"title" => "İşlem Başarılı",
		"text"  => "İşlem Başarılı",
		"type"  => "success"
		);

	} else {


		$_SESSION["alert"] = array(
		"title" => "İşlem Başarısız",
		"text"  => "İşlem Başarısız",
		"type"  => "error"
		);

	}

	header("location:account.php");
}
function update()
{

	$update = update_account();

	if ($update) {

		$_SESSION["alert"] = array(
		"title" => "İşlem Başarılı",
		"text"  => "İşlem Başarılı",
		"type"  => "success"
		);

	} else {

		$_SESSION["alert"] = array(
		"title" => "İşlem Başarısız",
		"text"  => "İşlem Başarısız",
		"type"  => "error"
		);

	}

	header("location:account.php");
}
function delete()
{

	if (isset($_GET["id"])) {

		$delete = delete_account();

		if ($delete) {

			$_SESSION["alert"] = array(
			"title" => "İşlem Başarılı",
			"text"  => "İşlem Başarılı",
			"type"  => "success"
			);

		} else {

			$_SESSION["alert"] = array(
			"title" => "İşlem Başarısız",
			"text"  => "İşlem Başarısız",
			"type"  => "error"
			);

		}

		header("location:account.php");

	}
}
