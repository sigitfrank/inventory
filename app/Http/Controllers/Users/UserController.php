<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Module\Module;
class UserController extends Controller
{
    
    protected $sidebar_parents;
    protected $sidebar_children;
    protected $user;
    public function __construct()
    {
        $this->user = $this->getUserData();
    }

    public function index()
    {
        $users = User::all();
        $data_view = [
            'page' => 'users.index',
            'data' => $users
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

    public function show($id_user)
    {
        $modules = new Module();
        $get_modules = $modules->getModules($id_user);
        $data_view = [
            'page'=>'users.show',
            'data'=>$get_modules,
        ];
        return $this->getView($data_view);
        
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    // TOGGLE USER MANAGEMENT
    function userToggle(Request $request, $id){
        
        $id_module = $request->input('idModule');
        $user = new User();
        $toggle_user = $user->toggleUser($id, $id_module);
        return json_encode($toggle_user);
        
    }
}
