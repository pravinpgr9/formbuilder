<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\FormSubmission;
use Illuminate\Support\Facades\Auth; // Import Auth facade

class FormSubmissionController extends Controller
{
    public function submit(Request $request, Form $form)
    {
        
        $submission = new FormSubmission();

        $submission->form_id = $form->id;

        $submission->submitted_by = Auth::id();

        $submission->data = json_encode($request->all());

        $submission->save();

        return redirect()->route('forms.index')->with('success', 'Form submitted successfully!');

    }
}