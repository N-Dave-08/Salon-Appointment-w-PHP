<?php

class Logout extends Controller
{
    public function index()
    {

        if (!empty($_SESSION['firstname']))
            unset($_SESSION['firstname']);

        if (!empty($_SESSION['user_id']))
            unset($_SESSION['user_id']);

        if (!empty($_SESSION['admin']))
            unset($_SESSION['admin']);

        if (!empty($_SESSION['admin_id']))
            unset($_SESSION['admin_id']);

        redirect('home');
    }
}
