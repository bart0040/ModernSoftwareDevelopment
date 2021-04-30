<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function filters(){
        return $this->belongsToMany(Filter::class, 'junctions', 'document_id', 'filter_id');
    }
}
