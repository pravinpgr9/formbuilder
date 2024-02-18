<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\FormField;
use App\Models\FormOpen;

use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function index()
    {
        $forms = Form::all();
        return view('forms.index', compact('forms'));
    }

    public function create()
    {
        return view('forms.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            // Add more validation rules as needed
        ]);

        // Add the user ID to the validated data
        $validatedData['created_by'] = Auth::id();

        //var_dump($validatedData);exit;

        $form = Form::create($validatedData);

        return redirect()->route('forms.index')->with('success', 'Form created successfully!');
    }

    public function addFields($formId)
    {
        $form = Form::findOrFail($formId);
        return view('forms.add_fields', compact('form'));
    }

    public function storeFields(Request $request, Form $form)
    {
        $validatedData = $request->validate([
            'label' => 'required|string|max:255',
            'type' => 'required|string|in:text,textarea,email,number',  
            'placeholder' => 'nullable|string|max:255',
            'required' => 'required|in:yes,no',
        ]); 

        $formField = new FormField([
            'label' => $validatedData['label'],
            'type' => $validatedData['type'],
            'placeholder' => $validatedData['placeholder'],
            'required' => $validatedData['required'],
        ]);

        // echo "<pre>";
        // print_r($formField->toArray());
        // exit;

        $form->fields()->save($formField);

        return redirect()->back()->with('success', 'Field added successfully!');
    }

    public function show(Form $form)
    {
        FormOpen::create([
            'form_id' => $form->id,
            'user_id' => auth()->id(),  
        ]);

        return view('forms.show', compact('form'));
    }


    public function showFormStatistics($formId)
    {
        $form = Form::with('fields')->findOrFail($formId);

        // Count submissions
        $submissionsCount = $form->submissions()->count();

        // Count opens
        $openCount = $form->formOpens()->count();

        // Fetch submissions with user details
        $submissions = $form->submissions()->with('user')->get();

        // Prepare data for display
        $submissionDetails = [];
        foreach ($submissions as $submission) {
            $submissionDetails[] = [
                'user' => $submission->user->name,
                'answers' => json_decode($submission->data, true),
            ];
        }

        // Print data before passing to the view
        // echo "<pre>";
        // print_r($form->toArray());
        // print_r($submissions->toArray());
        // print_r($submissionDetails);
        // exit;

        // Pass data to the view
        return view('forms.form_statistics', compact('form', 'submissionsCount', 'openCount', 'submissionDetails'));
    }

    public function deleteForm(Form $form)
    {
        // Delete related form fields
        $form->fields()->delete();

        // Delete the form
        $form->delete();

        return redirect()->route('forms.index')->with('success', 'Form deleted successfully.');
    } 

    public function edit(Form $form)
    {
        return view('forms.update', compact('form'));
    }

    public function update(Request $request, Form $form)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000', 
        ]);

        $form->update($validatedData);

        return redirect()->route('forms.index')->with('success', 'Form updated successfully!');
    }
}
