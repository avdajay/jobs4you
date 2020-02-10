<?php

class DashboardController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        return view('dashboard/index');
    }

    public function showMessage()
    {
        return view('dashboard/messages');
    }
}