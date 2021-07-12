<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        @include('frontend/layouts/__head')
       
        <link href="{!!asset('assets/frontend/css/construction.css')!!}" rel="stylesheet">
    </head>

    <body>
        <!-- Page content -->
        <div id="page">
            <!-- Main content -->
            <div class="content-wrapper">
                @include('frontend/layouts/__header')
                @yield('content')
                <!-- Footer -->
                @include('frontend/layouts/__footer')
                <!-- /footer -->
            </div>
            <!-- /main content -->
        </div>
        <!-- /page content -->
        <div class="modal fade login-sec" id="mdlContact" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="heading">
                                    <h2>Liên hệ</h2>
                                    <hr>
                                </div>
                                <form id="frmContact" method="post">
                                    {{ csrf_field() }}
                                    <ul class="row">
                                        <li class="col-12 col-sm-12 form-group has-feedback">
                                            <label>Tên của bạn
                                                <input type="text" class="form-control"  name="name" placeholder="">
                                                <div class="help-block with-errors"></div>
                                            </label>
                                        </li>
                                        <li class="col-12 col-sm-12">
                                            <label>Số điện thoại của bạn
                                                <input type="text" class="form-control"  name="mobile" placeholder="">
                                                <div class="help-block with-errors"></div>
                                            </label>
                                        </li>
                                        <li class="col-12 col-sm-12 form-group has-feedback">
                                            <label>Tên công ty của bạn
                                                <input type="text" class="form-control"  name="company_name" placeholder="">
                                                <div class="help-block with-errors"></div>
                                            </label>
                                        </li>
                                        <li class="col-12 col-sm-12">
                                            <label>Email của bạn
                                                <input type="text" class="form-control"  name="email" placeholder="">
                                                <div class="help-block with-errors"></div>
                                            </label>
                                        </li>
                                        <li class="col-12 col-sm-12">
                                            <label>Nội dung yêu cầu của bạn
                                                <textarea class="form-control" name="content" placeholder="" rows="10"></textarea>
                                                <div class="help-block with-errors"></div>
                                            </label>
                                        </li>
                                        <li class="col-12 col-sm-12 text-left">
                                            <button type="submit" class="btn-round">Gửi</button>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    @yield('script')   
    <script src="{!!asset('assets/frontend/js/fileinput.min.js')!!}"></script>
    <script src="{!!asset('assets/frontend/js/construction.js')!!}"></script>
    <script src="{!!asset('assets/global_assets/js/plugins/forms/selects/select2.min.js')!!}"></script>
</html>

