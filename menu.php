<?php

    include_once 'util.php';

    class Menu{
        protected $text;
        protected $sessionId;

        function __construct(){}

        public function mainMenu(){
            $response = "CON Welcome to OddJobs. Reply with: \n";
            $response .= "1. Find a service provider \n";
            $response .= "2. Register as a service provider\n";
            $response .= "3. About Us \n";
            echo $response;
        }


        public function serviceMenu($text){
            //shows initial user menu for registered users
            $response = " CON To be connected with a service provider select one of the categories listed below. Reply with\n";
            $response .= "1. Plumbing\n";
            $response .= "2. Gardening\n";
            $response .= "3. Cleaning\n";
            $response .= "4. Tutoring\n";
            $response .= "5. Moving\n";
            $response .= "6. Electrical\n";
            $response .= "7. Furniture Assembly\n";
            $response .= "8. Repairs\n";
            $response .= "9. Errands\n";
            $response .= Util::$GO_TO_MAIN_MENU .  ". Go back to main menu\n";
            echo $response;
// fix this
            do {
                $textarray = explode('*', $text);

            } while ($textarray[1] != 1);


            if ($textarray[1] == 1){
                $menu = new Menu();
                $menu->sendNumber($textarray[0]);
            }
        }


        public function registerMenu(){
          //building menu for user registration
        //   change to sms?
           $response = "CON To join our network of service providers, kindly fill the form at the url below and one of our customer service representatives will contact you to complete your registration\n";
           $response .= "https://fakeformurl.com \n";
           $response .= "If you're not contacted within 48 hours, call the number below \n";
           $response .= "0712345678 \n";
           $response .= Util::$GO_TO_MAIN_MENU .  ". Go back to main menu\n";

           echo $response;
        }

        public function about(){
            $response = "CON OddJobs Lorem ipsum dolor sit amet, consectetur adipiscing elit,\n
             sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\n
             Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi \n
             ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in \n
             voluptate velit esse cillum dolore eu fugiat nulla pariatur.\n";

            $response .= Util::$GO_TO_MAIN_MENU .  ". Go back to main menu\n";

            echo $response;
        }

        public function sendNumber($chosen){
            // change to sms?
            // conn to db
            $arr = ["0723528399", "0793583452", "0723683258", "0739562942"];
            $x = rand(3);
            $y = rand(3);
            $response = "END You chose". $chosen . ". Contact any of the numbers below to get a service provider \n";
            $response .= "1. ". $arr[$x];
            $response .= "1. ". $arr[$y];

            echo $response;
        }

        public function middleware($text){
            //remove entries for going back and going to the main menu
            return $this->goBack($this->goToMainMenu($text));
        }

        public function goBack($text){
            //1*4*5*1*98*2*1234
            $explodedText = explode("*",$text);
            while(array_search(Util::$GO_BACK, $explodedText) != false){
                $firstIndex = array_search(Util::$GO_BACK, $explodedText);
                array_splice($explodedText, $firstIndex-1, 2);
            }
            return join("*", $explodedText);
        }

        public function goToMainMenu($text){
            //1*4*5*1*99*2*1234*99
            $explodedText = explode("*",$text);
            while(array_search(Util::$GO_TO_MAIN_MENU, $explodedText) != false){
                $firstIndex = array_search(Util::$GO_TO_MAIN_MENU, $explodedText);
                $explodedText = array_slice($explodedText, $firstIndex + 1);
            }
            return join("*",$explodedText);
        }
    }
?>