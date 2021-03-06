@extends('layouts.app')

@section('content')
<div class="card uper" style='margin-bottom:15px'>
  <div class="card-header">
    Book Requests
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
    @endif
        <table class='table_custom'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Item Name</th>
                    <th>Pickup Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               @foreach($books as $book)
                  <tr>
                      <td>{{$book->id}}</td>
                      <td>{{$book->name}}</td>
                      <td>{{$book->phone}}</td>
                      <td>{{$book->email}}</td>
                      <td>{{$book->item_name}}</td>
                      <td>{{$book->pickup_date}}</td>
                      <td>
                        <a href="{{ route('bookrequest.edit',$book->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('bookrequest.destroy', $book->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                          </form>
                      </td>
                  </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('bookrequest.create')}}" class="btn btn-success" id='add_new_Btn'>Create</a>
        <a href="/" class="btn btn-info" id='back_home_Btn'>
          <img src="./home.svg" alt="book">
        </a>
  </div>
</div>

@endsection