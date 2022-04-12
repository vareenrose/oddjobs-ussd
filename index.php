<?php
    include_once 'menu.php';

    // Read the data sent via POST from our AT API
    $sessionId   = $_POST["sessionId"];
    $serviceCode = $_POST["serviceCode"];
    $phoneNumber = $_POST["phoneNumber"];
    $text        = $_POST["text"];


    $menu = new Menu();
    $text = $menu->middleware($text);


    if($text == ""){
         //string is empty
        $menu->mainMenu();

    }else{
        // string is not empty
        $textArray = explode("*", $text);
        switch($textArray[0]){
            case 1:
                $menu->serviceMenu($text);
                break;
            case 2:
                $menu->registerMenu();
                break;
            case 3:
                $menu->about();
                break;
            default:
                echo "END Invalid choice\n";
        }
    }

    header('Content-type: text/plain');

?>