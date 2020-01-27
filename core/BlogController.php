<?php

class BlogController extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        return view('blogs/blog');
    }
}