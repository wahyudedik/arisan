<?php

namespace App\Models;

use App\Models\Group;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GroupArisan extends Model
{
    use HasFactory;

    protected $table = 'group_arisans';

    // protected $fil

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
