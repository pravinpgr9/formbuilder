@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                           Add Fields for Form: {{ $form->title }}
                        </div>
                        <div class="float-end">
                            <a href="{{ route('forms.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                       <form method="POST" action="{{ route('forms.fields.store', $form->id) }}">
                            @csrf

                            <div class="form-group">
                                <label for="label">Label</label>
                                <input type="text" class="form-control" id="label" name="label" required>
                            </div>

                            <br/>

                            <div class="form-group">
                                <label for="type">Type</label>
                                <select class="form-control" id="type" name="type" required>
                                    <option value="text">Text</option>
                                    <option value="textarea">Textarea</option> 
                                    <option value="email">Email</option>
                                    <option value="number">Number</option> 
                                </select>
                            </div>

                            <br/>

                            <div class="form-group">
                                <label for="placeholder">Placeholder</label>
                                <input type="text" class="form-control" id="placeholder" name="placeholder">
                            </div>

                            <br/>

                            <div class="form-group">
                                <label for="required">Required</label>
                                <select class="form-control" id="required" name="required">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>

                            <hr/>

                            <button type="submit" class="btn btn-primary">Add Field</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
