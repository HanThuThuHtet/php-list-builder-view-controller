<?php

    function index(){
        $sql = "SELECT * FROM users";
        if(!empty($_GET["q"])){
            $q = $_GET["q"];
            $sql .= " WHERE name LIKE '%$q%' ";
        }
        return responseJson(paginate($sql));
    }

    function store(){
        //dd($_POST);
        //return responseJson($_POST);
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        run("INSERT INTO users (name,email,gender,address) VALUES ('$name','$email','$gender','$address')");
        //dd($GLOBALS["connect"]->insert_id); //obj
        //dd(first("SELECT * FROM users WHERE id = {$GLOBALS["connect"]->insert_id}"));
        $currentUser = first("SELECT * FROM users WHERE id = {$GLOBALS["connect"]->insert_id}");
        return responseJson($currentUser);
    }

    function show(){
        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id=$id";
        return responseJson(first($sql));
    }


    function delete(){
        //dd("i am delete");
        $id = $_GET['id'];
        $sql = "DELETE FROM users WHERE id=$id";
        run($sql);
        return responseJson("user is deleted");
    }

    function edit(){
        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id=$id";
       
        return view("list/edit",["list" => first($sql)]);
    }

    function update(){
        //dd($_POST);
        //dd("I am update");
        //dd(file_get_contents("php://input"));//put method
        parse_str(file_get_contents("php://input"),$_PUT);
        //dd($_PUT);
        $id = $_GET['id']; //from url
        $name = $_PUT['name'];
        $email = $_PUT['email'];
        $gender = $_PUT['gender'];
        $address = $_PUT['address'];
        $sql = "UPDATE users SET name='$name',email='$email',gender='$gender',address='$address' WHERE id=$id";
        run($sql);
        return responseJson(first("SELECT * FROM users WHERE id=$id"));
        
    }


    

?>