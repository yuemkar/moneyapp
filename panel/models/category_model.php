<?php
//KAYITLARRRRRR
// Tek Kayıt Getir
function get_category(){

    if(isset($_GET["id"])){

        $id = $_GET["id"];

        include "libraries/db.php";
        return $db->query("SELECT * FROM category WHERE id=$id")->fetch(PDO::FETCH_OBJ);

    }

}

// Tüm kayıtları getir
function get_all_categories(){

    include "libraries/db.php";
    $sid=$_SESSION["user"]->id;
    return $db->query("SELECT * FROM category WHERE isHidden=0 AND user_id={$sid}")->fetchAll(PDO::FETCH_OBJ);
}

function get_all_icategories(){
	
    include "libraries/db.php";
    $sid=$_SESSION["user"]->id;
    return $db->query("SELECT * FROM category WHERE isHidden=0 AND isActive=1 AND cat=1 AND user_id={$sid}")->fetchAll(PDO::FETCH_OBJ);
}

function get_all_posts($cid,$date){
	$whereadd='';
	$sid=$_SESSION["user"]->id;
	
	if (is_array($date) ){
		$bDate = str_replace('/', '-',trim($date[0]));
		$bDate = date("Y-m-d", strtotime($bDate));
		$sDate = str_replace('/', '-',trim($date[1]));
		$sDate = date("Y-m-d", strtotime($sDate));
		$whereadd="WHERE (`cat_id`={$cid}) AND (`isActive`=1) AND (`adate` BETWEEN '{$bDate}' AND '{$sDate}')";
	}elseif ($date=='buay'){
		 $m_start=date("Y-m-d", strtotime('first day of this month'));
 		 $m_end = date('Y-m-d', strtotime('last day of this month'));
 		 $whereadd="WHERE (`cat_id`={$cid}) AND (`isActive`=1) AND (`adate` BETWEEN '{$m_start}' AND '{$m_end}')";
 		 //print_r($whereadd);
 	}elseif ($date=='son7'){
 		 $week_start=date("Y-m-d", strtotime('monday this week'));
 		 //echo $week_start." s<br>\n";
 		 $week_end = date('Y-m-d', strtotime('+6 days', strtotime($week_start)));
  		 $whereadd="WHERE (`cat_id`={$cid}) AND (`isActive`=1) AND (`adate` BETWEEN '{$week_start}' AND '{$week_end}')";
 	}elseif ($date=='gecay'){
 		$m_laststart = date("Y-m-d",strtotime('first day of last month'));
		$m_lastend = date("Y-m-d",strtotime('last day of last month'));
 		$whereadd="WHERE (`cat_id`={$cid}) AND (`isActive`=1) AND (`adate` BETWEEN '{$m_laststart}' AND '{$m_lastend}')";
 	}elseif ($date=='buyil'){
 	 	$y_start=date("Y-m-d", strtotime('first day of january'));
 	 	$y_end = date('Y-m-d', strtotime('last day of december'));
 	 	$whereadd="WHERE (`cat_id`={$cid}) AND (`isActive`=1) AND (`adate` BETWEEN '{$y_start}' AND '{$y_end}')";
 	}elseif ($date=='gecyil'){
 	 	$ly_start=date("Y-m-d", strtotime('first day of january last year'));
 	 	//echo $ly_start." s<br>\n";
 	 	$ly_end = date('Y-m-d', strtotime('last day of december last year'));
 	 	//echo $ly_end." s<br>\n";
 	 $whereadd="WHERE (`cat_id`={$cid}) AND (`isActive`=1) AND (`adate` BETWEEN '{$ly_start}' AND '{$ly_end}')";
 	}
 	 if ($whereadd<>''){
		$whereadd = "{$whereadd} AND (user_id={$sid})";	 	
	 }else{
	 	$whereadd = "WHERE user_id={$sid}";
	 }
 	//echo '>'.$whereadd; 
	include "libraries/db.php";
	return $db->query("SELECT SUM(`amount`) as `total_amount` FROM finance $whereadd ORDER BY adate desc ,id desc")->fetch(PDO::FETCH_OBJ);
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

function get_all_ecategories(){
	$sid=$_SESSION["user"]->id;
    include "libraries/db.php";
    return $db->query("SELECT * FROM category WHERE isHidden=0 AND isActive=1 AND cat=2 AND user_id={$sid}" )->fetchAll(PDO::FETCH_OBJ);
}



// ekleme
function insert_category(){


    include "libraries/db.php";
	$sid=$_SESSION["user"]->id;
	
    $prepare = $db->prepare("INSERT INTO category SET 
      title = :title,
      isActive = :isActive,
      cat = :cat,
      user_id = :user_id,
      color= :color,
      createdAt = :createdAt");

    return $prepare->execute(
        array(
            "title"              => $_POST["title"],
            "isActive"           => $_POST["isActive"],
            "cat"           	 => $_POST["cat"],
			"color"           	 => $_POST["color"],
            "user_id"			 => $sid,
            "createdAt"          => date("Y-m-d H:i:s")
        )
    );

}

// silme
function delete_category(){

    include "libraries/db.php";
    $prepare = $db->prepare("DELETE FROM category WHERE id=:id");
	$prepare->execute( array( "id"    => $_GET["id"]) );

    $prepare = $db->prepare("DELETE FROM finance WHERE cat_id=:id");
	$prepare->execute( array( "id"    => $_GET["id"]) );
		
    return true;
}


// duzenleme
function update_category(){

    include "libraries/db.php";

    $prepare = $db->prepare("UPDATE category SET 
      `title` = :title,
      `isActive` = :isActive, 
	  `color` = :color 
      Where `id` = :id
      ");

    return $prepare->execute(
        array(
            "title"              => $_POST["title"],
            "isActive"           => $_POST["isActive"],
			"color"           => $_POST["color"],
            "id"                 => $_GET["id"],
        )
    );
}
