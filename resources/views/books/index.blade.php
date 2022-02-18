
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
    <thead class='books_table_thead'>
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
  <!-- 图片 遮罩层 -->
  <section class="mask">
    <div class="img_detail_box">
      <!-- <img src="" alt=""> -->
    </div>
  </section>
<section>

<script type="text/javascript">
  // 搜索图书方法
  let getData =async function(){
    const value = $('#search').val()
    await $.ajax({
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
          
          // 图片绑定事件
          $('body').on('click',(e)=>{
            if(e.target.id && e.target.id == 'book_cover'){
              // console.log('点击的是封面图片');
              $('.img_detail_box').empty().html(
                // `<img src="${e.target.src}" alt="" class="img_detail">
                //  <img src="/images/close.png" alt="close" class="close_img">
                // `
                `<img src="${e.target.src}" alt="" class="img_detail">
                 <div class="close_img"></div>
                `
              )
                // 绑定关闭遮罩层事件
              $('.close_img').on('click',()=>{
                $('.mask').css('display','none')
              })
              $('.mask').css('display','block')
            }
          })

          $('#no-data').css('display','none')
          $('#books_table').css('display','block')
        }else{
          // 展示兜底
          $('#no-data').css('display','flex')
          $('#books_table').css('display','none')
        }

        console.log('获取数据成功');
      }
    })
    
    return false
  };

  //页面加载完成
  $(document).ready(
    async function(){
 
      // 获取数据
      await getData();

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