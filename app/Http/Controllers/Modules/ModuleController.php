<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\Module\Module;
use App\Models\Sidebar\Sidebar;
use App\Models\User;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    
    protected $user;
    public function __construct()
    {
        $this->user = $this->getUserData();
    }
   
    public function index()
    {
        $modules = Sidebar::all();
        $data_view = [
            'page'=>'modules.index',
            'data'=>$modules
        ];
        return $this->getView($data_view);
    }

   
    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        //
    }

    public function show(Module $module)
    {
        //
    }

    public function edit(Module $module)
    {
        //
    }

    public function update(Request $request, Module $module)
    {
        //
    }

    public function destroy(Module $module)
    {
        //
    }
}
