@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Submit Form: {{ $form->title }}</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('forms.submit', $form->id) }}">
                            @csrf

                            @foreach($form->fields as $field)
                                <div class="form-group">
                                    <label for="{{ $field->id }}">{{ $field->label }}</label>
                                    @if($field->type === 'text')
                                        <input type="text" class="form-control" id="{{ $field->id }}" name="{{ $field->id }}" required>
                                    @elseif($field->type === 'textarea')
                                        <textarea class="form-control" id="{{ $field->id }}" name="{{ $field->id }}" rows="3" required></textarea>
                                    @endif
                                    <!-- Add more field types as needed -->
                                </div>
                            @endforeach

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
