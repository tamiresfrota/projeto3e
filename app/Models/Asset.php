<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'type_id',
        'description',
        'acquisition_date',
        'value',
        'location',
    ];

    protected $casts = [
        'acquisition_date' => 'datetime'
    ];

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function location() {
        return $this->belongsTo(location::class, 'location_id');
    }

}
