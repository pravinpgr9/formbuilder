@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Form</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('forms.update', $form->id) }}">
                            
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $form->title }}" required>
                            </div>
                            <br/>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{ $form->description }}</textarea>
                            </div>

                            <br/>

                            <button type="submit" class="btn btn-primary">Update Form</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
