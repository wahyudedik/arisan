<?php

namespace App\Models;

use App\Models\Message;
use App\Models\GroupArisan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';

    public function groupArisan()
    {
        return $this->hasOne(GroupArisan::class);
    }
}
