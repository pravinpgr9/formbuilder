@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Form - Title : {{ $form->title }}</div>
                    <div class="card-body"> 
                        <h2>Form Details</h2>
                        @if ($form->fields->isNotEmpty())
                            <form action="{{ route('submit_form', ['form' => $form]) }}" method="POST">
                                @csrf
                                @foreach ($form->fields as $field)
                                    <div class="form-group">
                                        <label for="{{ $field->id }}">{{ $field->label }}</label>
                                        @if ($field->type === 'text')
                                            <input type="text" name="{{ $field->id }}" id="{{ $field->id }}" class="form-control">
                                        @elseif ($field->type === 'textarea')
                                            <textarea name="{{ $field->id }}" id="{{ $field->id }}" class="form-control"></textarea>
                                        @elseif ($field->type === 'email')
                                            <input type="email" name="{{ $field->id }}" id="{{ $field->id }}" class="form-control">
                                        @elseif ($field->type === 'number')
                                            <input type="number" name="{{ $field->id }}" id="{{ $field->id }}" class="form-control">
                                        @endif
                                        <!-- More Conditions  -->
                                    </div>
                                    <br/>
                                @endforeach
                                <br/>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        @else
                            <p>No fields added to this form yet.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
