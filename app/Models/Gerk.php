<?php

namespace App\Models;

use App\Enum\GerkType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gerk extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name",
        "block_id",
        "area",
        "pid",
        "is_pasture",
        "number_of_mowings",
        "type",
        "average_altitude",
        "average_slope_percentage",
        "average_exposition",
        "scheme_type"
    ];

    public function getNameWithTypeAttribute() {
        return $this->name . " (" . GerkType::translate($this->type) . ")";
    }

    public function block()
    {
        return $this->belongsTo(Block::class);
    }

    public function workTasks()
    {
        return $this->hasMany(WorkTask::class);
    }
}
