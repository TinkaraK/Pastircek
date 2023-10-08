<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "area",
        "pid",
    ];

    public function gerks()
    {
        return $this->hasMany(Gerk::class);
    }
}
