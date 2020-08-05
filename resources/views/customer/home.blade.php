@extends('customer.template.customer_template')
@section('slider')
    <!--slider area start-->
    <section class="slider_section slider_s_one mb-60 mt-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php $i = 0;?>
                            @foreach ($banner as $item)
                                @if ($item->role == 2)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="<?=$i?>"
                                        class="<?php if ($i == 0) {
                                            echo 'active';
                                        }?>"></li>
                                    <?php $i++?>
                                @endif
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            <?php $i = 0;?>
                            @foreach ($banner as $item)
                                @if ($item->role == 2)
                                    <div class="carousel-item <?php if ($i == 0) {
                                        echo 'active';
                                    }?>">
                                        <a href=""><img src="<?=$item->url?>" class="d-block w-100"></a>
                                    </div>
                                    <?php $i++;?>
                                @endif
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                           data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                           data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="categories_product_inner">
                        <div class="single_categories_product banner_thumb" style="width:50%">
                            <a href="#"><img
                                    src="https://theme.hstatic.net/1000026716/1000440777/14/solid2.jpg?v=7887"
                                    alt=""></a>
                        </div>
                        <div class="single_categories_product banner_thumb" style="width:50%">
                            <a href="#"><img
                                    src="https://theme.hstatic.net/1000026716/1000440777/14/solid3.jpg?v=7887"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="s_banner col-lg-3 col-md-12">
                    <!--banner area start-->
                    <div class="sidebar_banner_area">
                        @foreach ($banner as $item)
                            @if ($item->role==1)
                                <figure class="single_banner mb-20">
                                    <div class="banner_thumb" style="width:100%">
                                        <a href="#"><img src="<?=$item->url?>" alt=""></a>
                                    </div>
                                </figure>
                            @endif
                        @endforeach
                    </div>
                    <!--banner area end-->
                </div>
            </div>
        </div>
    </section>
    <!--slider area end-->

<script>
    $(document).ready(function () {
        var password = document.getElementById("password")
            , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }
        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;

        $('#buttonsubmit').click(function (e) {
            e.preventDefault();
            var email = $('.emailSendtoken').val();
            $.ajax(
                {
                    url: '/customer/resetpassword',
                    type: "post",
                    datatype: "json",
                    data: {
                        'email':email
                    },

                }).done(function (data) {
                console.log(data);
            }).fail(function (jqXHR, ajaxOptions, thrownError) {
                alert('No response from server');
            });
        })
    });

    function getData(page, idcategory, namecategory) {
        $.ajax(
            {
                url: '/home/' + idcategory + '/?page=' + page,
                type: "get",
                datatype: "html"
            }).done(function (data) {
            $(namecategory + '_add').empty().html(data);
        }).fail(function (jqXHR, ajaxOptions, thrownError) {
            alert('No response from server');
        });
    }
</script>
@endsection
