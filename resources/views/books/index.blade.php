
@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class='table table-striped' id='books_table'>
    <thead>
        <tr>
          <td>Book Name</td>
          <td>Book Author</td>
          <td>Book Publisher</td>
          <td>Price</td>
          <td>ISBN</td>
          <td>Cover</td>
       </tr>
      </thead>
      <tbody id='search_table_body'></tbody>
  </table>
<div>

<script type="text/javascript">
  // 搜索图书方法
  let getData = function(){
    const value = $('#search').val()
    console.log(11);
    $.ajax({
      type : 'get',
      url : '{{URL::to('books')}}',
      data:{'search':value},
      success:function(data){
        if(data){
          $('#search_table_body').empty().html(data)
        }else{
          $('#search_table_body').empty().html('no Result')
        }
      }
    })
    return false
  };

  //页面加载完成
  $(document).ready(
    getData()
  )

  // 绑定搜索事件
  $('#search').on('keyup',function(){
    getData()
  })
</script>
<script type="text/javascript">
  $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
@endsection