<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function documents(){
        return $this->belongsToMany(Document::class, 'junctions', 'filter_id', 'document_id');
    }
    public function path(){
        return route('filter.show', $this);
    }
}
