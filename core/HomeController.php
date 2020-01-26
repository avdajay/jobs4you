<?php

class HomeController extends Controller
{
    
    public function __construct()
    {

    }

    public function index($id)
    {   
        // create a new user instance passing the database connection as parameter
        $model = new User();
        $user = $model->get($id);

        return view('index', $user);
    }
}
