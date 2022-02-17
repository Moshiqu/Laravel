
@extends('layout')

@section('content')
<section class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <!-- 有数据展示 -->
  <table class='table table-striped' id='books_table'>
    <thead>
        <tr>
          <td>Book Name</td>
          <td>Author</td>
          <td>Publisher</td>
          <td>Price</td>
          <td>ISBN</td>
          <td>Cover</td>
       </tr>
      </thead>
      <tbody id='search_table_body'></tbody>
  </table>
  <!-- 无数据展示 -->
  <div id='no-data'>
    <img src="/images/no_data.png" alt="No data">
  </div>
<section>

<script type="text/javascript">
  // 搜索图书方法
  let getData = function(){
    const value = $('#search').val()
    $.ajax({
      type : 'get',
      url : '{{URL::to('books')}}',
      data:{'search':value},
      success:function(data){
        let str = ``
        if(data.length != 0){
          data.forEach(element => {
            const {name,author,publisher,price,isbn,image_url} = {...element}
            str += `<tr><td>${name}</td><td>${author}</td><td>${publisher}</td><td>${price}</td><td>${isbn}</td><td><img id="book_cover" src=${image_url}></td></tr>`
          });
          // 填充表格tbody
          $('#search_table_body').empty().html(str)
          $('#books_table').tablesorter({
            headers: { 
                5: { 
                    sorter: false 
                }
              }
            }
          )

          $('#no-data').css('display','none')
          $('#books_table').css('display','block')
        }else{
          // 展示兜底
          $('#no-data').css('display','block')
          $('#books_table').css('display','none')
        }

      }
    })
    
    return false
  };

  //页面加载完成
  $(document).ready(
    function(){
       getData();
    }
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