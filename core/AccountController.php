<?php

class AccountController extends Controller
{
    public function __construct()
    {
        
    }

    public function profile()
    {
        return view('profile');
    }
}