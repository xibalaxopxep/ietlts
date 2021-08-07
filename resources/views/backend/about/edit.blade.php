
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
                    <form action="{!!route('admin.about.update', $record->id)!!}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                        <fieldset>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Tiêu đề <span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" required="" name="title" value="{!!old('title')?:$record->title!!}">
                                    {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
                                </div>
                            </div>
                           
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Mô tả: </label>
                                <div class="col-md-9">
                                    <textarea rows="10" class="form-control ckeditor" id="content1" required="" name="description">{!!$record->description!!}</textarea>                                    
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Nội dung: </label>
                                <div class="col-md-9">
                                    <textarea rows="10" class="form-control ckeditor" id="content2" required="" name="content">{!!$record->content!!}</textarea>                                    
                                </div>
                            </div>

                             <div class="form-group row">
                                <label class="col-md-3 col-form-label text-right">Con số về Pasal: </label>
                                <div class="col-md-9">
                                    <textarea rows="10" class="form-control ckeditor" id="content3" required="" name="stastistic">{!!$record->stastistic!!}</textarea>                                    
                                </div>
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


                        </fieldset>
                        <div class="text-right">
                            <a type="button" href="{{route('admin.about.index')}}" class="btn btn-secondary legitRipple">Hủy</a>
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
 <script type="text/javascript">
                                CKEDITOR.replace('content1', { height: 100 });
                                CKEDITOR.replace('content2', { height: 100 });
                                CKEDITOR.replace('content3', { height: 100 });
                        
                            </script>
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
