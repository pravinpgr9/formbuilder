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
        
        // Create a new FormSubmission instance
        $submission = new FormSubmission();

        // Assign the form ID to the submission
        $submission->form_id = $form->id;

        // Assign the currently authenticated user's ID to the submitted_by column
        $submission->submitted_by = Auth::id();

        // Encode the validated data as JSON and assign it to the submission
        $submission->data = json_encode($request->all());

        // Save the submission to the database
        $submission->save();

        // Redirect the user back to the form page with a success message
        //return redirect()->back()->with('success', 'Form submitted successfully!');
        return redirect()->route('forms.index')->with('success', 'Form submitted successfully!');

    }
}