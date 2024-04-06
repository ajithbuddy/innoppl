<?php

namespace App\helper;

use Illuminate\Support\Facades\Auth;

use DB;

class CustomHelper  
{
    private $users;

    public function __construct()
    {
        $this->users = auth()->user();
    }

    public function getCustomData($users = '')
    {
        $permissions = DB::table('permissions')
            ->select('name')
            ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
            ->where('role_has_permissions.role_id', '=', $this->users->role)
            ->get()
            ->toArray();

        $permissionArray = array_column($permissions, 'name');

        return $permissionArray;
    }

    public function checkPermission($permissionname, $users = '')
    {
        if (in_array($permissionname, self::getCustomData()) || $this->users->role == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function rolename($users)
{
    $rolename = DB::table('role')
        ->select('name')
        ->where('id', $users)
        ->first();
    return $rolename;
}
 public function customername($id)
{
    $cname = DB::table('customer')
        ->select('customer_name')
        ->where('id', $id)
        ->first();

    return $cname->customer_name;
}

}
?>