@extends('backend.layouts.master')
@section('content')
<div class="content">
    <form action="{!!route('admin.quizz.store')!!}" method="POST" enctype="multipart/form-data">
<!--  -->
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
                                        <label class="col-md-2 col-form-label text-right">Bài test <span class="text-danger">*</span></label>
                                        <div class="col-md-10">
                                            <select class="select-search form-control" name="test_id" data-placeholder="Chọn danh mục"  required>
                                                @foreach($tests as $test)
                                                @if($test->id == $record->test_id)
                                                <option selected="" value="{{$test->id}}">{{$test->title}}</option>
                                                @else
                                                <option value="{{$test->id}}">{{$test->title}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            {!! $errors->first('category_id', '<span class="text-danger">:message</span>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label text-right">Tiêu đề <span class="text-danger">*</span></label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="title" value="{{$record->title}}" required="">
                                            {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
                                        </div>
                                    </div>
                                                               
                                

                                    <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label text-right">Nội dung: </label>
                                        <div class="col-md-10">
                                            <textarea class="form-control ckeditor" id="content" name="content">{{$record->content}}</textarea>
                                        </div>
                                    </div>
                                    
                                    </div>

                                </fieldset>
                            </div>
                            <div class="col-md-10">
                             <div class="form-group row">
                                <label class="col-md-2 col-form-label text-right">Danh sách câu hỏi: </label>
                              <div class="col-md-10">
                              <div class="card" >
                              <div class="card-body">
                                <div class="form-group row">
                                        <label class="col-md-2 col-form-label text-right">Nội dung: </label>
                                        <div class="col-md-10">
                                            <select  id="choose" class="form-control">
                                                <option select="false" value="0">Chọn loại câu hỏi</option>
                                                <option class="choice" value="1">Trắc nghiệm</option>
                                                <option id="fill_input" value="2">Điền từ</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group row">
                                        <label class="col-md-2 col-form-label text-right">Câu hỏi: </label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" id="question" rows="4"></textarea>
                                        </div>
                                </div>
                                 <div id="fill_answer" style="display: none;" class="form-group row">
                                        <label class="col-md-2 col-form-label text-right">Câu trả lời: </label>
                                        <div class="col-md-10">
                                            <input id="answer" class="form-control" value="">
                                        </div>
                                </div>
                                <div id="choice_answer" style="display: none;" class="form-group row">
                                    <label class="col-md-2 col-form-label text-right">Câu trả lời</label>
                                    <div class="input_fields_wrap col-md-10 row">
                                        <div class="col-md-12 row" style="margin-bottom: 10px;">
                                       <input type="radio" class="col-md-1 is_answer" style="margin-top: 7px;" value="0">
                                       <input type="text" class="form-control col-md-9  list_answer">
                                       <button style="margin-left: 10px;" type="button" class="btn btn-primary add_field_button" name="">Add</button>
                                        </div>
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <table class="table">
                                      <thead class="thead-light">
                                        <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Câu hỏi</th>
                                          <th scope="col">Câu trả lời</th>
                                          <th scope="col">Thao tác</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                       @foreach($questions as $key => $question)
                                           <tr>
                                              <td scope="col">{{++$key}}</td>
                                              <td scope="col">{{$question->question}}</td>
                                              <td scope="col">{{$question->answer}}</td>
                                              <td class="">
                                               <a href="{{route('admin.quizz.edit',  ['id' => $question->id])}}" title="{!! trans('base.edit') !!}" class="success"><i class="icon-pencil"></i></a><a href="{{route('admin.quizz.edit',  ['id' => $question->id])}}" title="{!! trans('base.edit') !!}" class="success"><i class="icon-close2" style="color:red;"></i></a>            
                                                </form>
                                            </td>
                                           </tr>
                                       @endforeach
                                      </tbody>
                                    </table>
                               </div>

                                    <div class="text-center">
                                        <button type="button" id="create_question" class="btn btn-primary legitRipple">Thêm câu hỏi<i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                           
                              </div>
                                </div>
                            </div>
                        </div>
                    </div>

                 
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <a type="button" href="{{route('admin.quizz.index')}}" class="btn btn-secondary legitRipple">Hủy</a>
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
<script type="text/javascript">
    $(document).ready(function() {
        var question_type;
         
    $('#choose').on('change',function(){
        question_type = $(this).val();
        if(question_type==1){
            $('#choice_answer').show();
            $('#fill_answer').hide();
            
        }else{
            $('#choice_answer').hide();
            $('#fill_answer').show();
        }
    });
    
    $('#create_question').on('click',function(){
        var data = [];
        var question = $('#question').val();
        var quizz_id = {{$record->id}};
        var radioValue = $(".is_answer:checked").val();

        var key = 2;
        var answer =  $('#answer').val();
        if(question_type == 1){
        $(".list_answer").each(function () {                  
            data.push($(this).val()); 
         });
         }else{
            var data = $('#answer').val();
         }      
        $.ajax({
                url:'{{route("api.create_question")}}',
                method:"POST",
                dataType: "JSON",
                data:{data:data,question_type:question_type,question:question,quizz_id:quizz_id,radioValue:radioValue,answer:answer},
                success:function(resp){
                    key ++;
                    var html="";
                    html += "<tr>";
                    html += '<td>'+key+'</td>';
                    html += '<td>'+resp.record.question+'</td>';
                    html += '<td>'+resp.record.answer+'</td>';
                    html += '<td class=""><a href="{{route('admin.quizz.edit',  ['id' => $record->id])}}" title="{!! trans('base.edit') !!}" class="success"><i class="icon-pencil"></i></a><a href="{{route('admin.quizz.edit',  ['id' => $record->id])}}" title="{!! trans('base.edit') !!}" class="success"><i class="icon-close2" style="color:red;"></i></a></td>';
                    html += "</tr>";
                    $('tbody').append(html);
                   }
        });  
    });
    
    
  

    var max_fields = 5; //maximum input boxes allowed
    var wrapper = $(".input_fields_wrap"); //Fields wrapper
    var add_button = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            var html = "";
             html += '<div class="col-md-12 row" style="margin-bottom: 10px;">';
             html +='<input type="radio"  value="'+x+'" class="col-md-1 is_answer" style="margin-top: 7px;">'; 
             html += '<input type="text" class="form-control col-md-9 list_answer">';
             html += '<a style="margin-left: 5px; margin-top: 5px;" href="#" class="remove_field">Xoá</a>';
             html += '</div>';
            $(wrapper).append(html); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
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
