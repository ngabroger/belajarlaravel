@extends('firebase.app')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(session('status'))
                    <h4 class="alert alert-warning">{{session('status')}}</h4>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Your Total Contact : {{ $total_contact}}
                         <a href="{{ url('add-contact', []) }}" class="btn btn-primary btn-sm float-end">add Contact</a>   
                        </h4>
                    </div>
                    <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>first name</th>
                                        <th>last name</th>
                                        <th>email</th>
                                        <th>phone</th>
                                        <th>edit</th>
                                        <th>delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($contact as $key => $item)
                                    <tr>
                                        <td>{{$key}}</td>
                                        <td>{{$item['fname']}}</td>
                                        <td>{{$item['lname']}}</td>
                                        <td>{{$item['phone']}}</td>
                                        <td>{{$item['email']}}</td>
                                        <td><a href="{{ url('edit-contact/'. $key) }}" class="btn btn-success align-items-center">edit</a></td>
                                        <td>
                                            {{-- <a href="{{ url('delete-contact/'. $key) }}" class="btn btn-danger align-items-center justify-content-center ">delete</a> --}}
                                            <form method="POST" action="{{ url('delete-contact/'.$key) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7"> No record Found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection