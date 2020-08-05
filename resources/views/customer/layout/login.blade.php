<div class="modal fade" id="modalSignIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="col-md-5 mx-auto">
            <div class="myform form ">
                <div class="logo mb-3">
                    <div class="col-md-12 text-center">
                        <h1 style="font-family: serif;">Đăng nhập</h1>
                    </div>
                </div>
                <form action="/customer/login" method="post" name="login">
{{--                    giải quyết vấn đề bảo mật, lưu thông tin vào cookie--}}
                    @csrf
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Địa chỉ email</label>
                        <input type="email" name="email" required class="form-control" aria-describedby="emailHelp"
                               platyle="color:dodgerblue;" placeholder="Địa chỉ email">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Mật khẩu</label>
                        <input type="password" name="password" required class="form-control"
                               aria-describedby="emailHelp" placeholder="Mật khẩu">
                    </div>
                    <div class="col-md-12 text-center ">
                        <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Đăng nhập</button>
                    </div>
                    <div class="form-group col-md-12" style="padding-top:5px;">
                        <p class="text-center">Quên mật khẩu? Nhấn vào<a href="#" id="forgotpassword"
                                                                         data-dismiss="modal" data-toggle="modal"
                                                                         data-target="#forgotModalCenter"
                                                                         >đây</a>
                        </p>
                    </div>
                    <div class="col-md-12 ">
                        <div class="login-or">
                            <hr class="hr-or">
                            <span class="span-or">Hoặc</span>
                        </div>
                    </div>
                    <div class="com-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="text-center">
                                    <a href="auth/google" style="background-color:red;color:white;"
                                       class="google btn mybtn"><i class="fa fa-google">
                                        </i>oogle
                                    </a>
                                </p>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-center">
                                    <a href="auth/facebook" style="background-color:#0069d9;color:white;"
                                       class="google btn mybtn"><i class="fa fa-facebook">
                                        </i>acebook
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12" style="padding-top:5px;">
                        <p class="text-center">Nếu bạn chưa có tài khoản? <a href="#" id="signup"
                                                                             style="color:dodgerblue;">Đăng ký tài
                                khoản</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="signupModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="col-md-5 mx-auto">
            <div class="myform form ">
                <div class="logo mb-3">
                    <div class="col-md-12 text-center">
                        <h1 style="font-family: serif;">Đăng ký</h1>
                    </div>
                </div>
                <form action="" method="post" name="login" id="form-signup">
                    @csrf
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Họ và tên đệm</label>
                                <input type="text" required name="last_name" class="form-control"
                                       aria-describedby="emailHelp"
                                       placeholder="Họ">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tên</label>
                                <input type="text" name="first_name" required class="form-control"
                                       aria-describedby="emailHelp"
                                       placeholder="Tên">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Địa chỉ email</label>
                        <input type="email" name="email" class="form-control" aria-describedby="emailHelp"
                               placeholder="Địa chỉ email" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Mật khẩu</label>
                        <input type="password" name="password" id="password-signup" class="form-control"
                               aria-describedby="emailHelp"
                               placeholder="Mật khẩu" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Nhập lại mật khẩu</label>
                        <input type="password" name="confirm_password-signup" id="confirm_password" class="form-control"
                               aria-describedby="emailHelp"
                               placeholder="Nhập lại mật khẩu" required>
                    </div>
                    <div class="form-group">
                        <p class="text-center">Tôi đồng ý với Bảo mật và Điều khoản hoạt động của Gemingear.vn</p>
                    </div>
                    <div class="col-md-12 text-center ">
                        <button type="submit" id="register" class="btn btn-block mybtn btn-primary tx-tfm">Đăng ký
                        </button>
                    </div>
                    <div class="col-md-12 notify" style="margin-top:10px;margin-bottom:0px;display:none;"></div>
                    <div class="col-md-12" style="margin-top: 15px;">
                        <hr class="hr-or">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="forgotModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle2"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="col-md-5 mx-auto">
            <div class="myform form ">
                <div class="logo mb-3">
                    <div class="col-md-12 text-center">
                        <h4 style="font-family: serif;">Đặt lại mật khẩu?</h4>
                    </div>
                </div>
                <form action="" method="post" id="forgotForm" name="login">
                    @csrf
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Địa chỉ email</label>
                        <input type="email" name="email" class="form-control emailSendtoken"
                               aria-describedby="emailHelp"
                               placeholder="Địa chỉ email">
                    </div>
                    <div class="col-md-12 text-center ">
                        <button type="submit" id="buttonsubmit" class=" btn btn-block mybtn btn-primary tx-tfm"
                                data-target="#forgotModal" data-dismiss="modal" data-toggle="modal">Gửi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle3"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="col-md-5 mx-auto">
            <div class="myform form ">
                <div class="logo mb-3">
                    <div class="col-md-12 text-center">
                        <h4 style="font-family: serif;">Đặt lại mật khẩu</h4>
                    </div>
                </div>
                <form action="customer/reset-password" method="post">
                    @csrf
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Mật khẩu mới</label>
                        <input type="password" name="password" class="form-control" id="password"
                               aria-describedby="emailHelp"
                               placeholder="Mật khẩu mới">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Nhập lại mật khẩu</label>
                        <input type="password" id="confirm_password" name="re_password" class="form-control"
                               aria-describedby="emailHelp" placeholder="Nhập lại mật khẩu">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Nhập token</label>
                        <input type="token" name="token" class="form-control"
                               aria-describedby="emailHelp" placeholder="Nhập token">
                    </div>
                    <div class="col-md-12 text-center ">
                        <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Xác nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
