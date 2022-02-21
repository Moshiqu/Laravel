@extends('layouts.app')

@section('content')
  <div class="card uper">
  <div class="card-header">
    Book Request Form
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
      <form method="post" action="{{ route('bookrequest.update', $book->id) }}">
            @method('PATCH')
            @csrf
          <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" value={{ $book->name }} >
          </div>
          <div class="form-group">
              <label for="price">Phone Number:</label>
              <input type="text" class="form-control" name="phone" value={{ $book->phone }}>
          </div>
          <div class="form-group">
              <label for="quantity">Email:</label>
              <input type="text" class="form-control" name="email" value={{ $book->email }}>
          </div>
          <div class="form-group">
              <label for="quantity">Item Name:</label>
              <input type="text" class="form-control" name="item_name" value={{ $book->item_name }}>
          </div>
          <div class="form-group">
              <label for="quantity">Pickup Date:</label>
              <input type="text" class="form-control" name="pickup_date" id='datepicker' value={{ $book->pickup_date }} />
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>

@endsection