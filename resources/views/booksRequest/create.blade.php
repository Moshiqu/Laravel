@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({dateFormat: "yy-mm-dd"});
  } );
</script>
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
      <form method="post" action="{{ route('bookrequest.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" value='3213asd'/>
          </div>
          <div class="form-group">
              <label for="price">Phone Number:</label>
              <input type="text" class="form-control" name="phone" value='12345678'/>
          </div>
          <div class="form-group">
              <label for="quantity">Email:</label>
              <input type="text" class="form-control" name="email" value='91232525@qq.com'/>
          </div>
          <div class="form-group">
              <label for="quantity">Item Name:</label>
              <input type="text" class="form-control" name="item_name" value='harrypotter321321'/>
          </div>
          <div class="form-group">
              <label for="quantity">Pickup Date:</label>
              <input type="text" class="form-control" name="pickup_date" id='datepicker' />
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>

@endsection