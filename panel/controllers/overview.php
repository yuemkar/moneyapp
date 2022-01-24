<?php

// SQL ݾlemlerinin yap�ld��� Model dosyas�n�n y�klenmesi
include "models/overview_model.php";

function get_add_page()
{
	$cat_id=isset($_GET['c'])?$_GET['c']:1;
	$categories = get_categories($cat_id);
	$accounts=get_accounts();

	include "views/overview/add.php";
}

function get_list_page()
{

	$posts = get_all_posts();
	$getday_income =getday_income();
	$getweek_income = getweek_income();
	$getmoon_income = getmoon_income();
	$getyear_income= getyear_income();
	$gettotal_income = gettotal_income();
	
	
	$getday_expense = getday_expense();
	$getweek_expense = getweek_expense();
	$getmoon_expense = getmoon_expense();
	$getyear_expense= getyear_expense();
	$gettotal_expense = gettotal_expense();	

	include "views/overview/list.php";
}

function get_update_page()
{

	$cat_id=isset($_GET['c'])?$_GET['c']:1;
	$post = get_post();
	$accounts=get_accounts();
	$categories = get_categories($cat_id);

	include "views/overview/update.php";
}

function get_category_title($id)
{

	$category = get_category($id);

	return $category->title;
}


function save()
{


	$insert = insert_post();

	if ($insert) {

		$_SESSION["alert"] = array(
		"title" => "Başarılı",
		"text"  => "İşlem başarılıdır",
		"type"  => "success"
		);


	} else {

		$_SESSION["alert"] = array(
		"title" => "Başarısız",
		"text"  => "Kullanıcı Bulunamadı!!",
		"type"  => "error"
		);

	}

	header("Location:overview.php");
}

function update()
{

	$update = update_post();

	if ($update) {


		$_SESSION["alert"] = array(
		"title" => "Başarılı",
		"text"  => "İşlem başarılıdır",
		"type"  => "success"
		);


	} else {

		$_SESSION["alert"] = array(
		"title" => "Başarısız",
		"text"  => "Kullanıcı Bulunamadı!!",
		"type"  => "error"
		);

	}

	header("Location:overview.php");
}

function delete()
{

	if (isset($_GET["id"])) {

		$delete = delete_post();


		if ($delete) {

			$_SESSION["alert"] = array(
			"title" => "Başarılı",
			"text"  => "İşlem başarılıdır",
			"type"  => "success"
			);

		} else {

			$_SESSION["alert"] = array(
			"title" => "Başarısız",
			"text"  => "Kullanıcı Bulunamadı!!",
			"type"  => "error"
			);

		}

		header("Location:overview.php");

	}
}

function get_short_str($text, $len = 200)
{

	if (strlen(strip_tags($text)) > $len) {

		return mb_substr(strip_tags($text), 0, $len) . "...";

	} else {

		return strip_tags($text);
	}
}
