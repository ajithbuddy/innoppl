<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class permissions extends Model
{
    protected $fillable = ["name", "description	","guard_name","is_active"];

    public $timestamps = true;
    public $table = "permissions";




}