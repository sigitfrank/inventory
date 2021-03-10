<?php

namespace App\Models\Module;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
Use App\Models\Sidebar\Sidebar;
Use App\Models\User;
class Module extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getModules($id_user){
        $user = User::find($id_user);
        
        // user_access_module
        $modules = DB::table('sidebars')
        ->leftJoin(DB::raw('(select `user_id`, `module_id` from user_access_module WHERE user_access_module.user_id = '.$id_user.') user_access'), 
        function($join)
        {
           $join->on('sidebars.id', '=', 'user_access.module_id');
        })
        ->get();
       
        return  $data = [
            'name'=>$user->name,
            'modules'=>$modules,
        ];
    }

}
