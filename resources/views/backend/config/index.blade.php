
@extends('backend.layouts.master')
@section('content')
<div class="content">  
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Cấu hình website</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            @if (Session::has('success'))
            <div class="alert bg-success alert-styled-left">
                <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                <span class="text-semibold">{{ Session::get('success') }}</span>
            </div>
            @endif
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <form action="{!!route('admin.config.update', 1)!!}" class="form-validate-jquery" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                        <fieldset>
                            <legend class="text-semibold"><i class="icon-reading position-left"></i> Cài đặt website</legend>
                            <div class="form-group row" data-field="image">
                                <label class="col-md-3 col-form-label text-right">Logo website:</label>
                                <div class="col-md-9 div-image">
                                    <input type="hidden" name="image" class="image_data" value="{!!old('image')?:$config->image!!}"/>
                                    <input type="file" id="image" onclick="openKCFinder(this)" data-value="{!!old('image')?:$config->image!!}" class="file-input-overwrite" data-field="image">
                                    {!! $errors->first('image', '<span class="text-danger">:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group row" data-field="favicon">
                                <label class="col-md-3 col-form-label text-right">Favicon:</label>
                                <div class="col-md-9 div-image">
                                    <input type="hidden" class="image_data" name="favicon" value="{!!old('favicon')?:$config->favicon!!}"/>
                                    <input type="file" id="favicon" onclick="openKCFinder(this)" data-value="{!!old('favicon')?:$config->favicon!!}" class="file-input-overwrite" data-field="favicon">
                                    {!! $errors->first('favicon', '<span class="text-danger">:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Về chúng tôi:</label>
                                <div class="col-md-9">
                                    <textarea rows="5" class="form-control" required="" name="content" >{{$config->content}}</textarea>
                                    {!! $errors->first('content', '<span class="text-danger">:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Tên công ty:</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control"  name="company_name" value="{!!old('company_name')?:$config->company_name!!}">
                                    {!! $errors->first('company_name', '<span class="text-danger">:message</span>') !!}
                                </div>
                            </div>
                               <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Mã số thuế:</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="mst" value="{!!old('mst')?:$config->mst!!}">
                                    {!! $errors->first('mst', '<span class="text-danger">:message</span>') !!}
                                </div>
                            </div>
                          
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Facebook:</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="facebook" value="{!!$config->facebook!!}">
                                    {!! $errors->first('facebook', '<span class="text-danger">:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Youtube:</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="youtube" value="{!!$config->youtube!!}">
                                    {!! $errors->first('youtube', '<span class="text-danger">:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Instagram:</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="instagram" value="{!!$config->instagram!!}">
                                    {!! $errors->first('instagram', '<span class="text-danger">:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Tiktok:</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="tiktok" value="{!!$config->tiktok!!}">
                                    {!! $errors->first('tiktok', '<span class="text-danger">:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Fanpage:</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="fanpage" value="{!!$config->fanpage!!}">
                                    {!! $errors->first('fanpage', '<span class="text-danger">:message</span>') !!}
                                </div>
                            </div>
                           
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Thẻ mô tả (SEO):</label>
                                <div class="col-md-9">
                                    <textarea type="text" class="form-control" name="description">{!!$config->description!!}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Thẻ từ khóa (SEO):</label>
                                <div class="col-md-9">
                                    <textarea type="text" class="form-control" name="keywords">{!!$config->keywords!!}</textarea>
                                </div>
                            </div>

                        </fieldset>
                        <div class="text-right">
                            <a type="button" href="{{route('admin.config.index')}}" class="btn btn-secondary legitRipple">Hủy</a>
                            <button type="submit" class="btn btn-primary legitRipple">Lưu lại <i class="icon-arrow-right14 position-right"></i></button>
                        </div>


                    </form>
                </div>  
            </div>
        </div>
    </div>
</div>
@stop

@section('script')
@parent

<script src="{!! asset('assets/global_assets/js/plugins/uploaders/fileinput/plugins/purify.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/uploaders/fileinput/fileinput.min.js') !!}"></script>
@stop