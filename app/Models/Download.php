<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsToMany(User::class, "user_downloads","download_id","user_id");

    }
    public function setFilenamesAttribute($value)
    {
        $this->attributes['filenames'] = json_encode($value);
    }
}
