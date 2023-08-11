@extends('firebase.app')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Contact 
                         <a href="{{ url('contact', []) }}" class="btn btn-danger btn-sm float-end">Back</a>   
                        </h4>
                    </div>
                    <div class="card-body">
                            <form action="{{('add-contact')}}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label >first name</label>
                                    <input type="text" name="first_name" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label >last name</label>
                                    <input type="text" name="last_name" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label >phone number</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label >email address</label>
                                    <input type="text" name="email" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection