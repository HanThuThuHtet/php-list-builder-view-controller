<?php

    function home(){
        return view("home",["myName" => "han","myAge" => 23]);
    }

    function about(){
        return view("about");
    }

    function displaySession(){
        //session_unset();
        dd($_SESSION);
    }

?>