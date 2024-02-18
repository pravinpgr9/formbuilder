<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;


class FormSubmission extends Model
{
    use HasFactory;

    protected $fillable = ['form_id', 'data', 'submitted_by']; // Assuming 'data' will store the form submission data as JSON

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'submitted_by');
    }
}
