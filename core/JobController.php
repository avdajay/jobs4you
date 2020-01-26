<?php

class JobController extends Controller
{
    public function __construct()
    {
        
    }

    public function browse()
    {
        return view('jobs/browse');
    }

    public function categories()
    {
        return view('jobs/categories');
    }

    public function single()
    {
        return view('jobs/single');
    }

    public function add()
    {
        return view('jobs/add');
    }

    public function manage()
    {
        return view('jobs/manage');
    }

    public function applications()
    {
        return view('jobs/applications');
    }
}