<?php

class ResumeController extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        return view('browse-resume');
    }

    public function show($id)
    {
        return view('resume');
    }
}