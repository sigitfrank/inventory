<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function toggleUser($id_user, $id_module){
        $check_user_has_access = DB::table('user_access_module')
        ->where('user_id', $id_user)
        ->where('module_id', $id_module)
        ->count();

        if($check_user_has_access > 0){
            $delete_module_access = DB::table('user_access_module')
            ->where('user_id', $id_user)
            ->where('module_id', $id_module)
            ->delete();
            if($delete_module_access){
                return [
                    'status'=>true,
                    'message'=>'Access deleted!'
                ];
            } else{
                return [
                    'status'=>false,
                    'message'=>'Access cannot be deleted!'
                ];
            }
        } else{
            $give_user_access = DB::table('user_access_module')->insert([
                'user_id' => $id_user,
                'module_id' => $id_module
            ]);
            if($give_user_access){
                return [
                    'status'=>true,
                    'message'=>'Access added!'
                ];
            } else{
                return [
                    'status'=>false,
                    'message'=>'Access cannot be added!'
                ];
            }
        }
    }
}
