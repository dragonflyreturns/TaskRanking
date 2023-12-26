<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'body',
        'end_date',
        'fast_end_date',
        'user_id',
        'category_id',
        'color_id'
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class); 
    }
    
    public function color()
    {
        return $this->belongsTo(Color::class); 
    }
    
    use HasFactory;
}
