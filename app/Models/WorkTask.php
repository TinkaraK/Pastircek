<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkTask extends Model
{
    use HasFactory;

    protected $fillable = [
        "gerk_id",
        "date_from",
        "date_to",
        "type",
        "area",
        "remarks"
    ];

    protected $casts = [
        "date_from" => "date",
        "date_to" => "date"
    ];

    public function gerk()
    {
        return $this->belongsTo(Gerk::class);
    }
}
