@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">

                    <div class="card-header">
                        <div class="float-start">
                            Forms Management
                        </div>
                        <div class="float-end">
                            <a href="{{ route('home') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <!-- Button to create a new form --> 
                        @canany(['create-form'])
                        <a class="btn btn-primary" href="{{ route('forms.create') }}">
                            <i class="bi bi-bag"></i> Create New Form</a>
                        @endcanany 
                        

                        <hr/>

                        <!-- Table of existing forms -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($forms as $form)
                                    <tr>
                                        <td>{{ $form->title }}</td>
                                        <td>{{ $form->description }}</td> 
                                        <td>
                                            @if($form->submissions()->where('submitted_by', Auth::id())->exists())
                                                <!-- Form already submitted by the user, disable the buttons -->
                                                <button type="button" class="btn btn-primary" disabled>Submitted</button>
                                            @else
                                                <!-- Form not submitted by the user, enable the buttons -->
                                                @canany(['create-form'])
                                                    <a href="{{ route('forms.add_fields', $form->id) }}" class="btn btn-primary">Add Fields</a>
                                                    @canany(['create-form'])
                                                    <a class="btn btn-warning" href="{{ route('forms.statistics', ['form' => $form->id]) }}">
                                                    Form Statistics</a>
                                                    <form action="{{ route('forms.delete', ['form' => $form->id]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this form?')">Delete</button>
                        </form>
                                                    @endcanany
                                                @else
                                                    <a href="{{ route('submit_form', ['form' => $form->id]) }}" class="btn btn-primary">Submit Form</a>
                                                @endcanany
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
