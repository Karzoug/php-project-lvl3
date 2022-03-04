<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function checks()
    {
        return $this->hasMany(UrlCheck::class);
    }

    public function latestCheck()
    {
         return $this->hasOne(UrlCheck::class)->latestOfMany();
    }
}
