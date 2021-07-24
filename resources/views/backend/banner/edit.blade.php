@extends('backend.layouts.master')
@section('content')
<div class="content">
    <form action="{!!route('admin.banner.update',$record->id)!!}" method="POST" enctype="multipart/form-data">
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

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="left-icon-tab1">
                        <div class="row">
                            <div class="col-md-10" style="">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                                <fieldset>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label text-right">Vị trí<span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="name" value="{!!$record->name!!}" required="">
                                            {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
                                        </div>
                                    </div>     

                                     <div class="form-group row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="form-group col-md-2">
                                         <img src="{{url($record->image)}}" id ="frame2" alt="test" class="img-thumbnail" width="200" height="150" />
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="required">Ảnh banner</label>
                                        <input name="image" type="file" class="form-control" value="{!!old('image')!!}" onchange='UpdatePreview2()'>
                                        {!! $errors->first('image', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                    </div>            

                                    <div class="form-group row">
                                        <div class="form-check col-md-4 form-check-right">
                                        <label class="form-check-label float-right">
                                            Kích hoạt
                                             @if($record->status == 1)
                                            <input checked="" type="checkbox" class="form-check-input-styled" name="status" data-fouc="">
                                            @else
                                            <input type="checkbox" class="form-check-input-styled" name="status" data-fouc="">
                                            @endif
                                        </label>
                                    </div>
                                        <label class="col-md-2 col-form-label text-right">Thứ tự<span class="text-danger"></span></label>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" name="ordering" value="{!!$record->ordering!!}" required>
                                            {!! $errors->first('ordering', '<span class="text-danger">:message</span>') !!}
                                        </div>
                                    </div>

                                     

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <a type="button" href="{{route('admin.banner.index')}}" class="btn btn-secondary legitRipple">Hủy</a>
                                            <button type="submit" class="btn btn-primary legitRipple">Lưu lại <i class="icon-arrow-right14 position-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                                </fieldset>
                            </div>
                            
                           
                              </div>
                                </div>
                            </div>
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
<script type="text/javascript">
    $('#select_type').on('change',function(){
        var type = $(this).val();
        if(type==1){
            $('#reading_type').hide();
            $('#listening_type').show();
        }else{
            $('#reading_type').show();
            $('#listening_type').hide();
        }
    });
</script>
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