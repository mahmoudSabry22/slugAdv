<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
        'name', 'slag'
        ];
        public function getRouteKeyName()
        {
            return 'slag';
        }
    }

