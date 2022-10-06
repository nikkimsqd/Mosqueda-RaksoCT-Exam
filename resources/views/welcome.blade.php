@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Laravel') }}</div>

                <div class="card-body">
                    <a href="{{url('contacts')}}" class="btn btn-info">View Contacts here</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
