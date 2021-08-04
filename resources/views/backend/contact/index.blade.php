@extends('backend.layouts.master2')
@section('content')
    <!-- Content area -->
    <div class="content">
        <!-- Table header styling -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Liên hệ</h5>
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
            </div>
            @if($type == 1 || $type == 2)
            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    @if($type == 1)
                    <th>Khoá học</th>
                    @elseif($type == 2)
                    <th>Lớp học</th>
                    @endif
                    <th>Cơ sở</th>
                    <th>Ngày đăng ký</th>
                    <th>Link</th>
                </tr>
                </thead>
                <tbody>
                @foreach($records as $key=>$record)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$record->name}}</td>
                        <td>{{$record->email}}</td>
                        <td>{{$record->phone}}</td>
                        @if($record->schedule_id == null)
                        <td>{{$record->course_name($record->course_id)}}</td>
                         @else
                        <td>{{$record->schedule_name($record->schedule_id)}}</td>
                        @endif
                        <td>{{$record->address_name($record->contact_address_id)}}</td>
                        <td>{{$record->created_at()}}</td>
                        <td class="text-center">
                           <a href="{{url($record->link)}}">{{$record->link}}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Mục tiêu</th>
                    <th>Cơ sở</th>
                    <th>Ngày đăng ký</th>
                    <th>Điểm trung bình</th>
                    <th>Chi tiết</th>
                    <th>Khoá học gợi ý</th>
               
                </tr>
                </thead>
                <tbody>
                @foreach($records as $key=>$record)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$record->name}}</td>
                        <td>{{$record->email}}</td>
                        <td>{{$record->phone}}</td>
                        <td>{{$record->target}}</td>
                        <td>{{$record->address_name($record->contact_address_id)}}</td>
                        <td>{{$record->created_at()}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-center">
                         
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            @endif
        </div>
        <!-- /table header styling -->

    </div>
    <!-- /content area -->
@stop
@section('script')
    @parent
    <script src="{!! asset('assets/global_assets/js/plugins/tables/datatables/datatables.min.js') !!}"></script>
    <script src="{!! asset('assets/global_assets/js/demo_pages/datatables_basic.js') !!}"></script>
@stop
