<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $user;
    public function getUserData()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
        return $this->user;
    }

    public function sidebar()
    {
        $parent_sidebar = DB::table('sidebar')
            ->where('parent_module', '=', null)
            ->get();

        $children_sidebar = [];
        $index = 0;
        foreach ($parent_sidebar as $value) {
            $child_sidebar = DB::table('sidebar')
                ->where('parent_module', '=', $value->id)
                ->get();
            foreach ($child_sidebar as $value_child) {
                $children_sidebar[$index]['nama_module'] = $value_child->nama_module;
                $children_sidebar[$index]['parent_module'] = $value_child->parent_module;
                $children_sidebar[$index]['has_child'] = $value_child->has_child;
                $children_sidebar[$index]['icon'] = $value_child->icon;
                $children_sidebar[$index]['path'] = $value_child->path;
                $index += 1;
            }
        }
        return
            [
                'parent_sidebar' => $parent_sidebar,
                'sidebar_children' => $children_sidebar,
            ];
    }

    public function getView($data_view)
    {
        $data = $data_view['data'] ?? [];
        $sidebars = $this->sidebar();
        return view($data_view['page'], [
            'sidebar_parents' => $sidebars['parent_sidebar'],
            'sidebars_children' => $sidebars['sidebar_children'],
            'data' => $data,
            'user' => $this->user,
        ]);
    }
}
