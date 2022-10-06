@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Contacts') }}</div>
                <div class="card-body">

                    <form action="{{url('contact')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label> Upload Contact</label> <br>
                        <input type="file" name="contact_csv"> 
                        <br><br>

                        <div class="form-group">
                            <label for="title">Title</label>
                            <select name="title" id="title">
                                <option value="Title" selected>Title</option>
                                <option value="First Name">First Name</option>
                                <option value="Last Name">Last Name</option>
                                <option value="Mobile Number">Mobile Number</option>
                                <option value="Company Name">Company Name</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="f_name">First Name</label>
                            <select name="f_name" id="f_name">
                                <option value="Title">Title</option>
                                <option value="First Name" selected>First Name</option>
                                <option value="Last Name">Last Name</option>
                                <option value="Mobile Number">Mobile Number</option>
                                <option value="Company Name">Company Name</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="l_name">Last Name</label>
                            <select name="l_name" id="l_name">
                                <option value="Title">Title</option>
                                <option value="First Name">First Name</option>
                                <option value="Last Name" selected>Last Name</option>
                                <option value="Mobile Number">Mobile Number</option>
                                <option value="Company Name">Company Name</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="mobile_num">Mobile Number</label>
                            <select name="mobile_num" id="mobile_num">
                                <option value="Title">Title</option>
                                <option value="First Name">First Name</option>
                                <option value="Last Name">Last Name</option>
                                <option value="Mobile Number" selected>Mobile Number</option>
                                <option value="Company Name">Company Name</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="comp_name">Company Name</label>
                            <select name="comp_name" id="comp_name">
                                <option value="Title">Title</option>
                                <option value="First Name">First Name</option>
                                <option value="Last Name">Last Name</option>
                                <option value="Mobile Number">Mobile Number</option>
                                <option value="Company Name" selected>Company Name</option>
                            </select>
                        </div>

                        <br>
                        <input type="submit" value="Upload Contact">
                    </form>

                </div>
            </div>

            <br><br>

            <div class="card">
                <div class="card-header">{{ __('Contacts') }}</div>
                <div class="card-body">

                <form action="" method="GET">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="search" placeholder="Search..." value="{{$search}}">
                        <input type="submit" class="btn btn-info" value="Search">
                        <a href="/contacts">Clear filter</a>
                    </div>
                </form>

                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Title</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Mobile Number</th>
                        <th scope="col">Company Name</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                            <td>{{ $contact['title'] }}</td>
                            <td>{{ $contact['f_name'] }}</td>
                            <td>{{ $contact['l_name'] }}</td>
                            <td>{{ $contact['mobile_num'] }}</td>
                            <td>{{ $contact['comp_name'] }}</td>
                            <td>
                                <a href="{{ url('contacts/'.$contact['id'].'/edit') }}" class="btn btn-warning">edit</a>
                                <a href="{{ url('contacts/'.$contact['id'].'/delete') }}" class="btn btn-danger">delete</a>
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


