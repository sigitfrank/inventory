<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $sidebar_parents;
    protected $sidebar_children;
    protected $user;
    public function __construct()
    {
        $this->user = $this->getUserData();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_view = [
            'page' => 'dashboard.index',
        ];
        return $this->getView($data_view);
      
    }
}
