<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormOpen extends Model
{
    use HasFactory;
    
    protected $fillable = ['form_id', 'user_id'];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
