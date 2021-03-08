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
        $sidebars = $this->sidebar();
        $this->sidebar_parents = $sidebars['parent_sidebar'];
        $this->sidebar_children = $sidebars['sidebar_children'];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.index', [
            'sidebar_parents' => $this->sidebar_parents,
            'sidebars_children' => $this->sidebar_children,
            'user' => $this->user,
        ]);
    }
}
