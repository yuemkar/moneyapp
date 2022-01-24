<?php

require_once "controllers/blank.php";

if(isset($_GET)){
    if(isset($_GET["p"])){

        switch ($_GET["p"]){
            case "add":
                get_add_page();
                break;
            case "list":
                get_list_page();
                break;
            case "update":
                get_update_page();
                break;
            default:
                get_list_page();
                break;
        }

    } else {
        get_list_page();
    }
}

?>