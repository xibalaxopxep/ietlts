@extends('frontend.layouts.master_news')
@section('content')


Test thành công
Bạn đúng {{$true_number}}/{{$question_numer}}
<br>
@foreach($result as $key => $val) <br>
@if($key==1)
Pronucation : {{$result[$key]->true}} / {{$result[$key]->dem}}<br>
@elseif($key==2)
Grammar :  {{$result[$key]->true}}/ {{$result[$key]->dem}} <br>
@elseif($key==3)
Vocabulary : {{$result[$key]->true}} / {{$result[$key]->dem}} <br>
@elseif($key==4)
Listening :  {{$result[$key]->true}} / {{$result[$key]->dem}} <br>
@elseif($key==5)
Reading :  {{$result[$key]->true}}/ {{$result[$key]->dem}} <br>
@endif
@endforeach
<br>

Khoá học gợi ý<br>
@foreach($courses as $course)
{{$course->title}} <br>

@endforeach

@stop