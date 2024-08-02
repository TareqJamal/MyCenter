<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialPdf extends Model
{
    use HasFactory;
    protected $fillable = ['title','file','chapter_id'];
}
