@extends('firebase.app')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Contact 
                         <a href="{{ url('contact', []) }}" class="btn btn-danger btn-sm float-end">Back</a>   
                        </h4>
                    </div>
                    <div class="card-body">
                            <form action="{{ url('update-contact/'.$key)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label >first name</label>
                                    <input type="text" name="first_name" value="{{$editdata['fname']}}" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label >last name</label>
                                    <input type="text" name="last_name"   value="{{$editdata['lname']}}" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label >phone number</label>
                                    <input type="text" name="phone"  value="{{$editdata['phone']}}" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label >email address</label>
                                    <input type="text" name="email"  value="{{$editdata['email']}}" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <button class="btn btn-primary" type="submit">update</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection