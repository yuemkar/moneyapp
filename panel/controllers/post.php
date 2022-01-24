<?php

// SQL İşlemlerinin yapıldığı Model dosyasının yüklenmesi
include "models/post_model.php";

function get_add_page(){
	$cat_id=isset($_GET['c'])?$_GET['c']:1;
	$cats=isset($_GET['cid'])?$_GET['cid']:0;
		
    $categories = get_categories($cat_id);
    $accounts=get_accounts();

    include "views/post/add.php";
}

function get_list_page(){
	
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
	 
    $posts = get_all_posts($date);
    

    include "views/post/list.php";
}

function get_update_page(){

	$cat_id=isset($_GET['c'])?$_GET['c']:1;
    $post = get_post();
    $accounts=get_accounts();
    $categories = get_categories($cat_id);

    include "views/post/update.php";

}

function get_category_title($id){

    $category = get_category($id);

    return $category->title;

}


function save(){


        $insert = insert_post();

        if($insert){

            $_SESSION["alert"] = array(
                "title" => "Başarılı",
                "text"  => "İşlem başarılıdır",
                "type"  => "success"
            );


        } else {

            $_SESSION["alert"] = array(
                "title" => "Başarısız",
                "text"  => "İşlem başarısız",
                "type"  => "error"
            );

        }

        header("Location:post.php");


}

function update(){
	
         $update = update_post();

        if($update){


            $_SESSION["alert"] = array(
                "title" => "Başarılı",
                "text"  => "İşlem başarılıdır",
                "type"  => "success"
            );


        } else {

            $_SESSION["alert"] = array(
                "title" => "Başarısız",
                "text"  => "Dosya yüklenirken bir hata oluştu...",
                "type"  => "error"
            );

        }

        header("Location:post.php");
		
}

function delete(){

    if(isset($_GET["id"])){

        $delete = delete_post();
       

        if($delete) {

            $_SESSION["alert"] = array(
                "title" => "Başarılı",
                "text"  => "İşlem başarılıdır Post Ve Yorumlar Silindi",
                "type"  => "success"
            );

        } else {

            $_SESSION["alert"] = array(
                "title" => "Başarısız",
                "text"  => "İşlem başarısızdır",
                "type"  => "error"
            );

        }

        header("Location:post.php");

    }

}

function get_short_str($text, $len = 200){

    if(strlen(strip_tags($text)) > $len){

        return mb_substr(strip_tags($text), 0, $len) . "...";

    } else {

        return strip_tags($text);
    }

}

function validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
    return $d && $d->format($format) === $date;
}
