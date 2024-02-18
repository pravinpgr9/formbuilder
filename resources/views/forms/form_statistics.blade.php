@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        <div class="float-start">
                            Forms Management
                        </div>
                        <div class="float-end">
                            <a href="{{ route('forms.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                        </div>
                    </div>

                    <div class="card-body">
        <h2>Form Statistics - {{ $form['title'] }}</h2>

        <p>Total Submissions: {{ $submissionsCount }}</p>
        <p>Total Opens: {{ $openCount }}</p>

        <h2>Submission Details</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        @foreach ($form['fields'] as $field)
                            <th>{{ $field['label'] }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($submissionDetails as $submission)
                        <tr>
                            @foreach ($form['fields'] as $field)
                                <td>{{ $submission['answers'][$field['id']] }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection
