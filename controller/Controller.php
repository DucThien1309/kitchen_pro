<?php
class Controller
{
    public function index(): void
    {
        require_once "view/choose_user_type.php";
    }
    public function signIn(): void
    {
        require_once "view/sign_in_hall.php";
    }

    public function processSignIn()
    {
        require "model/SignIn.php";
        (new SignIn())->processLogin($_POST, $_GET["role"]);
    }

    public function signUp(): void
    {
        require_once "view/create_user.php";
    }

    public function processSignUp()
    {
        require_once "model/SignUp.php";
        (new SignUp())->processRegister($_POST);
    }

    public function signOut(): void
    {
        require_once "model/SignOut.php";
    }

    public function create_upload(): void
    {
        require_once "view/dangnhap_dangky/create_user_from_list.php";
    }

    public function store_upload(): void
    {
        require_once "model/SignUp.php";
        $upload_file = (new SignUp())->process_Upload_File();
        require_once "view/dangnhap_dangky/create_user_from_list.php";
    }

    public function store_list_register()
    {
        require_once "model/SignUp.php";
        (new SignUp())->processListRegister($_POST);
    }
}
