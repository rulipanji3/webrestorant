<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class MenuItem extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'image_url',
        'image',
        'is_available',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected function casts(): array
    {
        return [
            'is_available' => 'boolean',
        ];
    }

    public function imageSrc(): string
    {
        if ($this->image) {
            return Storage::url($this->image);
        }

        if ($this->image_url) {
            return $this->image_url;
        }

        return '';
    }
}
