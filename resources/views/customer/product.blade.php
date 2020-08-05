@extends('customer.template.customer_template')
@section('content')
<div class="shop_area shop_fullwidth">
    <div class="container data" data-id="@if(isset($name)){{$name}}@endif">
        <div class="row">
            <div class="col-12">
                <div class="shop_toolbar_wrapper">
                    <div class="shop_toolbar_btn">
                        <button data-role="grid_4" type="button" class=" btn-grid-4 active" data-toggle="tooltip"
                            title="4"></button>
                    </div>

                    <div class="page_amount">
                        <p>@if(isset($product))Đang hiển thị {{count($product)}} kết quả@endif</p>
                    </div>
                </div>
                <!--shop toolbar end-->

                <!--shop wrapper start-->
                <div class="tab-content"  >
                    <div class="product">
                        <div class="container" id="tag_container">
                            <div class="row">
                                @foreach ($product as $item)
                                <div class="col-lg-3 col-sm-12 ">
                                    <article class="single_product" >
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="{{$item->url}}"><img src="{{$item->image}}" alt=""></a>
                                                <a class="secondary_img" href="{{$item->url}}"><img src="{{$item->image}}" alt=""></a>
                                                <div class="label_product">
                                                    @if ($item->price_sale != $item->price)
                                                        <span class="label_sale">Sale</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="product_content">
                                                <div class="product_content_inner" ">
                                                    <h4 class="product_name" style="height:30%; text-overflow: clip;"><a href="{{$item->url}}">{{$item->name}}</a></h4>
                                                    <div class="price_box">
                                                        @if ($item->price_sale == $item->price)
                                                            <span class="current_price">{{number_format($item->price_sale)}} đ</span>
                                                        @else
                                                            <span class="old_price">{{number_format($item->price)}} đ</span>
                                                            <span class="current_price">{{number_format($item->price_sale)}} đ</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="add_to_cart" data-id="{{$item->id}}"
                                                data-price="{{$item->price_sale}}" data-name="{{$item->name}}" data-image="{{$item->image}}">
                                                    <a style="font-family:arial;">Thêm sản phẩm</a>
                                                </div>
                                            </div>
                                        </figure>
                                    </article>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="shop_toolbar t_bottom">{{$product->render()}}</div>
                </div>
                    
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    
    $(document).ready(function()
    {
        $(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault();
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            var name = $('.data').attr('data-id');
            var myurl = $(this).attr('href');
            var page=myurl.split('page=')[1];
            getData(page,name);
        });
  
    });
  
    function getData(page,name){
        $.ajax(
        {
            url: '/search?page=' + page,
            type: "post",
            data: {'name':name},
            datatype: "html"   
        }).done(function(data){
            $("#tag_container").empty().html(data);
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('No response from server');
        });
    }
</script>
@endsection