<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'image', 'link', 'type_id'];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
