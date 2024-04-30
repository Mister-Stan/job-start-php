<?php

namespace App\Controllers;

use Framework\Database;

class UserController4
{
    protected $db;

    public function __construct()
    {

        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    /**
     * Show the login page
     *
     * @return void
     */
    public function login()
    {
        return loadView('users/login');
    }

    /**
     * Show the register page
     *
     * @return void
     */
    public function create()
    {
        return loadView('users/create');
    }

    /**
     * Store a new user in the database
     *
     * @return void
     */
    public function store()
    {
        inspectAndDie("stored");
    }
}
//   sdadsa
