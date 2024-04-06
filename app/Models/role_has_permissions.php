<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class role_has_permissions extends Model
{
    protected $fillable = ["permission_id", "role_id"];
    public $timestamps = true;
    public $table = "role_has_permissions";




}