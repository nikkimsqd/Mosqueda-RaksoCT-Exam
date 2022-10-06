@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Contact') }}</div>

                <div class="card-body">
                    <form action="{{url('contacts/update')}}" method="post">
                        @csrf
                        <input type="text" class="form-control" name="id" value="{{$contact['id']}}" hidden>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{$contact['title']}}">
                        </div>
                        <div class="form-group">
                            <label for="f_name">First Name</label>
                            <input type="text" class="form-control" id="f_name" name="f_name" value="{{$contact['f_name']}}">
                        </div>
                        <div class="form-group">
                            <label for="l_name">Last Name</label>
                            <input type="text" class="form-control" id="l_name" name="l_name" value="{{$contact['l_name']}}">
                        </div>
                        <div class="form-group">
                            <label for="mobile_num">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile_num" name="mobile_num" value="{{$contact['mobile_num']}}">
                        </div>
                        <div class="form-group">
                            <label for="comp_name">Company Name</label>
                            <input type="text" class="form-control" id="comp_name" name="comp_name" value="{{$contact['comp_name']}}">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
