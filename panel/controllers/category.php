<?php

// SQL İşlemlerinin yapıldığı Model dosyasının yüklenmesi
include "models/category_model.php";

function get_add_page(){
    include "views/category/add.php";
}
function get_list_page(){

    $categories = get_all_categories();

    include "views/category/list.php";
}

function get_ilist_page(){
	$date = isset($_GET["date"])?$_GET["date"]:'';
	
	if ($date =='buay'){
		$menuname='Bu Ay';
	}elseif ($date =='son7'){
		$menuname='Son 7 Gün';
	}elseif ($date =='gecay'){
		$menuname='Geçen Ay';
	}elseif ($date =='buyil'){
		$menuname='Bu Yıl';
	}elseif ($date =='gecyil'){
		$menuname='Geçen Yıl';		
	}else{
		$date ='buay';
		$menuname='Bu Ay';
	} 

	 $tarihara = isset($_GET["tarihara"])?$_GET["tarihara"]:'0';
	 $btarih = isset($_GET["btarih"])?$_GET["btarih"]:'';
	 $starih = isset($_GET["starih"])?$_GET["starih"]:'';
	 
	 if (!validateDate($btarih, $format = 'd/m/Y')){
	 	$btarih=date("d/m/Y", strtotime('first day of january'));	
	 }
 	 if (!validateDate($starih, $format = 'd/m/Y')){
 	 	$starih = date('d/m/Y', strtotime('last day of december'));
	 }
	 
	 if ($tarihara =='1'){
	 	$date=array($btarih,$starih);
	 	$menuname="{$btarih} - {$starih}";
	 }
	 	
    $categories = get_all_icategories();
    include "views/category/ilist.php";
}
function get_elist_page(){
	$date = isset($_GET["date"])?$_GET["date"]:'';
	
	if ($date =='buay'){
		$menuname='Bu Ay';
	}elseif ($date =='son7'){
		$menuname='Son 7 Gün';
	}elseif ($date =='gecay'){
		$menuname='Geçen Ay';
	}elseif ($date =='buyil'){
		$menuname='Bu Yıl';
	}elseif ($date =='gecyil'){
		$menuname='Geçen Yıl';		
	}else{
		$date ='buay';
		$menuname='Bu Ay';
	} 

	 $tarihara = isset($_GET["tarihara"])?$_GET["tarihara"]:'0';
	 $btarih = isset($_GET["btarih"])?$_GET["btarih"]:'';
	 $starih = isset($_GET["starih"])?$_GET["starih"]:'';
	 
	 if (!validateDate($btarih, $format = 'd/m/Y')){
	 	$btarih=date("d/m/Y", strtotime('first day of january'));	
	 }
 	 if (!validateDate($starih, $format = 'd/m/Y')){
 	 	$starih = date('d/m/Y', strtotime('last day of december'));
	 }
	 
	 if ($tarihara =='1'){
	 	$date=array($btarih,$starih);
	 	$menuname="{$btarih} - {$starih}";
	 }
    $categories = get_all_ecategories();
    include "views/category/elist.php";
}


function get_update_page(){

    $category = get_category();

    include "views/category/update.php";
}

function save(){


    $insert = insert_category();

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

    header("location:category.php");


}
function update(){

    $update = update_category();

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

    header("location:category.php");

}
function delete(){

    if(isset($_GET["id"])){

        $delete = delete_category();

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

        header("location:category.php");

    }

}

function validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
    return $d && $d->format($format) === $date;
}