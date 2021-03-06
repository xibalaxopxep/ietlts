
@extends('backend.layouts.master')
@section('content')
<div class="content">
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Cập nhật</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <form action="{!!route('admin.block.update', $record->id)!!}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                        <fieldset>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Tiêu đề <span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                     <textarea rows="10" class="form-control " name="title">{!!old('title')?:$record->title!!}</textarea>
                                 
                                </div>
                            </div>
                           

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Nội dung: </label>
                                <div class="col-md-9">
                                    <textarea rows="10" class="form-control " name="content">{!!$record->content!!}</textarea>                                    
                                </div>
                            </div>
                           
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Video ID: </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="{!!$record->video_url!!}" name="video_url">                            </div>
                            </div>

                             <div class="form-group row">
                                <div class="col-md-3">
                                </div>

                                <div class="form-group col-md-3">
                                     @if($record->image == null)
                                     <img src="{{asset('/img/avt.png')}}" id ="frame" alt="test" width="100%" height="150" />
                                     @else
                                     <img src="{{asset($record->image)}}" id ="frame" alt="test" width="100%" height="150" />
                                     @endif
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="required">Ảnh</label>
                                    <input name="image" type="file" class="form-control" value="{!!old('image')!!}" onchange='UpdatePreview()'>
                                    {!! $errors->first('image', '<span class="text-danger">:message</span>') !!}
                                </div>
                             </div> 

                            <div class="form-group row">
                                <div class="form-check col-md-4 form-check-right">
                                    <label class="form-check-label float-right">
                                        Hiển thị
                                        <div class=""><span><input type="checkbox" class="form-check-input-styled" {{($record->status == 1)?'checked':''}} name="status" data-fouc=""></span></div>
                                    </label>
                                </div>

                               <!--  <label class="col-form-label col-md-3 text-right">Sắp xếp </label>
                                <div class="col-md-5">
                                    <input type="text" name="ordering" class="form-control touchspin text-center" value="{{$record->ordering}}">
                                </div> -->
                            </div>

                        </fieldset>
                        <div class="text-right">
                            <a type="button" href="{{route('admin.block.index')}}" class="btn btn-secondary legitRipple">Hủy</a>
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
<script src="{!! asset('assets/global_assets/js/plugins/forms/selects/select2.min.js') !!}"></script>

<script src="{!! asset('assets/global_assets/js/plugins/forms/styling/uniform.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/forms/styling/switchery.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/forms/styling/switch.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/forms/validation/validate.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/forms/inputs/touchspin.min.js') !!}"></script>

<script src="{!! asset('assets/backend/ckeditor/ckeditor.js') !!}"></script>
<script src="{!! asset('assets/backend/js/custom.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/uploaders/fileinput/plugins/purify.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/uploaders/fileinput/fileinput.min.js') !!}"></script>

@stop
