@extends('backend.layouts.master')
@section('content')
<div class="content">
    <form action="{!!route('admin.test.store')!!}" method="POST" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title">Tạo mới</h6>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-highlight">
                    <li class="nav-item"><a href="#left-icon-tab1" class="nav-link active" data-toggle="tab"><i class="icon-menu7 mr-2"></i> Thông tin cơ bản</a></li>
                    <!-- <li class="nav-item"><a href="#left-icon-tab2" class="nav-link" data-toggle="tab"><i class="icon-stack2 mr-2"></i> Thuộc tính sản phẩm</a></li>
                    <li class="nav-item"><a href="#left-icon-tab3" class="nav-link" data-toggle="tab"><i class="icon-mention mr-2"></i> Thẻ meta</a></li> -->

                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="left-icon-tab1">
                        <div class="row">
                            <div class="col-md-8">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                                <fieldset>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label text-right">Tiêu đề <span class="text-danger">*</span></label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="title" value="{!!old('title')!!}" required="">
                                            {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label text-right">Url <span class="text-danger">*</span></label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" readonly="" name="alias" value="{!!old('alias')!!}" required>
                                            {!! $errors->first('alias', '<span class="text-danger">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label text-right">Danh mục <span class="text-danger">*</span></label>
                                        <div class="col-md-10">
                                            <select class="select-search form-control" name="category_id" data-placeholder="Chọn danh mục" required>
                                                {!!$category_html!!}
                                            </select>
                                            {!! $errors->first('category_id', '<span class="text-danger">:message</span>') !!}
                                        </div>
                                    </div>
                                   <!--   <div class="form-group row">
                                        <label class="col-md-2 col-form-label text-right">Loại test <span class="text-danger">*</span></label>
                                        <div class="col-md-10">
                                            <select class="select-search form-control" name="type" data-placeholder="Chọn loại test"  required>
                                               <option class="form-control" value="1">Listen</option>
                                               <option class="form-control" value="2">Reading</option>
                                            </select>
                                            {!! $errors->first('type', '<span class="text-danger">:message</span>') !!}
                                        </div>
                                    </div> -->
                                   <!--  <div class="form-group row">
                                        <label class="col-md-2 col-form-label text-right">Mô tả </label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" name="description">{!!old('description')!!}</textarea>
                                        </div>
                                    </div> -->
                                    <div class="form-group row" data-field="images">
                                        <label class="col-md-2 col-form-label text-right">Hình ảnh <span class="text-danger">*</span></label>
                                        <div class="col-md-10 div-image">
                                            <input type="hidden" class="image_data" name="images" value="{!!old('images')!!}" required=""/>
                                            <input type="file" id="images" multiple="" onclick="openKCFinder(this)" data-value="{!!old('images')!!}" class="file-input-overwrite" data-field="images">
                                            {!! $errors->first('images', '<span class="text-danger">:message</span>') !!}
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-md-4">
              
                                <div class="form-group row">
                                    <div class="form-check col-md-4 form-check-right">
                                        <label class="form-check-label float-right">
                                            Hiển thị
                                            <input type="checkbox" class="form-check-input-styled" name="status" data-fouc="">
                                        </label>
                                    </div>
                                </div>
                               <!--  <div class="form-group row">
                                    <div class="form-check col-md-4 form-check-right">
                                        <label class="form-check-label float-right">
                                            Sản phẩm nổi bật
                                            <input type="checkbox" class="form-check-input-styled" name="is_hot" data-fouc="">
                                        </label>
                                    </div>
                                </div> -->
                            </div>
                            <div class="col-md-12">

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label text-right">Nội dung: </label>
                                    <div class="col-md-12">
                                        <textarea class="form-control ckeditor" id="content" name="note">{!!old('note')!!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                   
                    <!-- <div class="tab-pane fade" id="left-icon-tab2">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label text-right">Thẻ tiêu đề (SEO)</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="meta_title" value="{!!old('meta_title')!!}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label text-right">Thẻ từ khóa (SEO) </label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="meta_keywords">{!!old('meta_keywords')!!}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label text-right">Thẻ mô tả (SEO) </label>
                                    <div class="col-md-9">
                                        <textarea class="form-control maxlength-label-position" maxlength="255" name="meta_description">{!!old('meta_description')!!}</textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div> -->

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <a type="button" href="{{route('admin.test.index')}}" class="btn btn-secondary legitRipple">Hủy</a>
                            <button type="submit" class="btn btn-primary legitRipple">Lưu lại <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@stop
@section('script')
@parent
<script src="{!! asset('assets/global_assets/js/plugins/forms/selects/select2.min.js') !!}"></script>

<script src="{!! asset('assets/global_assets/js/plugins/forms/styling/uniform.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/forms/styling/switchery.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/forms/styling/switch.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/forms/validation/validate.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/forms/inputs/touchspin.min.js') !!}"></script>

<script src="{!! asset('assets/global_assets/js/plugins/uploaders/fileinput/plugins/purify.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/uploaders/fileinput/fileinput.min.js') !!}"></script>
<!-- Theme JS files -->
<script src="{!! asset('assets/global_assets/js/plugins/forms/tags/tagsinput.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/forms/tags/tokenfield.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/ui/prism.min.js') !!}"></script>

<!-- Theme JS files -->
<script src="{!! asset('assets/global_assets/js/plugins/ui/moment/moment.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/pickers/daterangepicker.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/pickers/anytime.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/pickers/pickadate/picker.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/pickers/pickadate/picker.date.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/pickers/pickadate/picker.time.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/pickers/pickadate/legacy.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/notifications/jgrowl.min.js') !!}"></script>
<script src="{!! asset('assets/backend/ckeditor/ckeditor.js') !!}"></script>
<script src="{!! asset('assets/backend/js/custom.js') !!}"></script>

@stop
