<?php

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        return view('dashboard/index');
    }

    public function messageView()
    {
        return view('dashboard/messages');
    }

    public function addResumeView()
    {
        return view('dashboard/add-resume');
    }
}