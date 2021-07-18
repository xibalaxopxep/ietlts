@extends('backend.layouts.master')
@section('content')
<!-- Content area -->
<style type="text/css">
    li{
        margin-right: 15px;
    }
</style>
<div class="content">
    <!-- Table header styling -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Địa chỉ liên hệ </h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->

     
        <div class="card-body">
            @if (Session::has('success'))
            <div class="alert bg-success alert-styled-left">
                <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                <span class="text-semibold">{{ Session::get('success') }}</span>
            </div>
            @endif
        </div>

        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>#</th>
                     <th><input type="checkbox" id="select_all" value=""></th>
                    <th>Tiêu đề</th>
                    <th>Địa điểm học</th>
                    <th>Khoá học</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>
                    <th>Tác vụ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($records as $key=>$record)

                <tr>
                    <td>{{++$key}}</td>
                    <th><input name="check[]" type="checkbox" value="{{$record->id}}"></th>
                    <td>{{$record->title}}</td>
                    <td> <select class="select-search form-control" id="" name="course_id" data-placeholder="Cở sở/ Trung tâm"  required>
                         @foreach($address as $add)
                             @if($add->id == $record->contact_address_id)
                             <option selected="" value="{{$add->id}}">{{$add->name}}</option>
                             @else
                             <option value="{{$add->id}}">{{$add->name}}</option>
                             @endif
                         @endforeach
                    </select></td>
                     <td> <select class="select-search form-control" id="" name="course_id" data-placeholder="Cở sở/ Trung tâm"  required>
                         @foreach($courses as $course)
                             @if($course->id == $record->course_id)
                             <option selected="" value="{{$course->id}}">{{$course->title}}</option>
                             @else
                             <option value="{{$course->id}}">{{$course->title}}</option>
                             @endif
                         @endforeach
                    </select></td>
                    @if($record->status==1)
                    <td> <span class="badge bg-success-400">Kích hoạt</span></td>
                    @else
                     <td> <span class="badge bg-grey-400">Ẩn</span></td>
                    @endif
                    
                    <td>{{date('d-m-Y', strtotime($record->created_at))}}</td>
                    <td class="">
                        <a href="{{route('admin.schedule.edit',  ['id' => $record->id])}}" title="{!! trans('base.edit') !!}" class="success"><i class="icon-pencil"></i></a>
                        <form action="{!! route('admin.schedule.destroy',  ['id' => $record->id]) !!}" method="POST" style="display: inline-block">
                            {!! method_field('DELETE') !!}
                            {!! csrf_field() !!}
                            <a title="{!! trans('base.delete') !!}" class="delete text-danger" data-action="delete">
                                <i class="icon-close2"></i>
                            </a>              
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /table header styling -->

</div>
<!-- /content area -->
@stop
@section('script')
@parent


<script src="{!! asset('assets/global_assets/js/plugins/tables/datatables/datatables.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/plugins/forms/selects/select2.min.js') !!}"></script>
<script src="{!! asset('assets/global_assets/js/demo_pages/datatables_basic.js') !!}"></script>
<script src="{!! asset('assets/backend/ckeditor/ckeditor.js') !!}"></script> 
@stop   