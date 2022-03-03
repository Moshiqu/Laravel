
@extends('layout')

@section('content')
<section class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <div class="line"></div>
  <article class='article_box' style='position:relative''>
    <h2>Book List</h2>
    <aside class='aside'>
      <input type="text" id='search' placeholder="Search">
      <img src="/images/search_icon.png" class='search_icon'>
    </aside>
    
    <div class='divide_line_article'></div>

    <!-- 有数据展示 -->
      <table class='table table-striped' id='books_table'>
        <thead class='books_table_thead'>
            <tr>
              <td>Book Name</td>
              <td>Author</td>
              <td>Publisher</td>
              <td>Price</td>
              <td style="text-align:center;">ISBN</td>
              <td style="text-align:center;">Cover</td>
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
  </article>

  <!-- home -->
  <div class="line"></div>
  <article class="article_box">
    <h2>Home</h2>
    
    <div class='divide_line_article'></div>
    <div class="articleBody">
    	<figure class="img_right">
	    	<img src="images/shop.jpg" width="620" height="340" />
      </figure>
      <article>
        <h5 style="margin-bottom:30px;color:blue">
          Welcome to our online bookstore!
        </h5>
        <video width="340" controls autoplay>
          <source src="big_buck_bunny.mp4" type="video/mp4" />
        </video>
      </article>
    </div>
  </article>

  <!-- about -->
  <div class="line"></div>
  <article class="article_box">
    <h2>About</h2>
    
    <div class='divide_line_article'></div>
    <div class="articleBody">
    	<figure class="img_right">
	    	<img src="images/reading.jpg" width="620" height="340" />
      </figure>
      <article>
        <h5 style="margin-bottom:30px;color:blue">
          Welcome to our online bookstore!
        </h5>
        <p>We are online book store. We have thousands of books in stock. We can search the books by ISBN or author. We accept Paypal and Visa Credit Cards. We will ship the books within 1-2 business days.</p>
      </article>
    </div>
  </article>

  <!-- contact -->
  <div class="line"></div>
  <article class="article_box">
    <h2>Contact Us</h2>
    
    <div class='divide_line_article'></div>
    <div class="articleBody">
      <article class='contact_us'>
        <h5>Please provide us your info so that we can contact you.</h5>
        <form class="contact_us_form">
          <div>
            <label for='username'>Name:</label>
            <input type="text" placeholder='enter your name' id='username'>
          </div>
          <div>
            <label for='useremail'>E-mail:</label>
            <input type="text" placeholder='enter your email address' id='useremail'>
          </div>
          <div>
            <label for='usermessage'>Message:</label>
            <textarea id='usermessage'></textarea>
          </div>
          <div>
            <button class='btn btn-primary submit_btn' id='submit_btn'>submit</button>
          </div>
        </form>
      </article>
    </div>
  </article>
</section>

<script type="text/javascript">
  // 搜索图书方法
  let getData =async function(){
    const value = $('#search').val() || ''
    await $.ajax({
      type : 'get',
      url : '{{URL::to('books')}}',
      data:{'search':value},
      success:function(data){
        let str = ``
        if(Array.isArray(data) &&data.length != 0){
          data.forEach(element => {
            const {name,author,publisher,price,isbn,image_url} = {...element}
            str += `<tr><td>${name}</td><td>${author}</td><td>${publisher}</td><td class="price_td">${price}</td><td>${isbn}</td><td><img id="book_cover" src=${image_url}></td></tr>`
          });
          // 填充表格tbody
          $('#search_table_body').empty().html(str)
          $("#books_table").trigger("update")
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
              $('.img_detail_box').empty().html(
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
  
  // 绑定搜索事件
  $('#submit_btn').on('click',function(){
    return false
  })

</script>
<script type="text/javascript">
  $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
@endsection