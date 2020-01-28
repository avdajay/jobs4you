<?php

class JobController extends Controller
{
    public function __construct()
    {
        
    }

    public function browse()
    {
        return view('job/browse');
    }

    public function categories()
    {
        return view('job/categories');
    }

    public function single()
    {
        return view('job/single');
    }

    public function add()
    {
        return view('job/add');
    }

    public function manage()
    {
        return view('job/manage');
    }

    public function applications()
    {
        return view('job/applications');
    }
}