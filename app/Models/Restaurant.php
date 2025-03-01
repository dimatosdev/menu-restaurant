<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'name', 'description', 'address'
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
