<?php

class AccountController extends Controller
{
    public function __construct()
    {
        
    }

    public function dashboard()
    {
        return view('accounts/dashboard');
    }
}