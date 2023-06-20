<?php

namespace App\Models;

use App\Models\GroupArisan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisArisan extends Model
{
    use HasFactory;

    public function groupArisan()
    {
        return $this->hasOne(GroupArisan::class);
    }
    
}
