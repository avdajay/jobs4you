<?php

class DashboardController extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        return view('dashboard');
    }
}