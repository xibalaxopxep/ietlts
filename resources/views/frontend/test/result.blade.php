@extends('frontend.layouts.master_news')
@section('content')


 



<div class="container">

Test thành công

Bạn đúng {{$true_number}}/{{$question_numer}}
<br>
Khoá học gợi ý:<br>
@foreach($courses as $course)
{{$course->title}} <br>
@endforeach
<table class="table table-striped">
  <thead style="background-color :#ef5a2f;">
    <tr>
      <th scope="col">Skill</th>
      <th scope="col">Corect Answer</th>
      <th scope="col">Score</th>
      <th scope="col">Đánh giá</th>
    </tr>
  </thead>
  <tbody>
  	
  	
  	@foreach($result as $key => $val)
    <!-- @php
       if($result[$key]->true == 0){
          $diem= 0;
	   }else{
	       $diem = $result[$key]->dem / $result[$key]->true;
	   }
    @endphp
 -->

   
  	
    <tr>
      @if($key==1)
      <th scope="row">Listening</th>
      @elseif($key==2)
      <th scope="row">Reading</th>
      @elseif($key==3)
      <th scope="row">Pronuciation</th>
      @elseif($key==4)
      <th scope="row">Grammar</th>
      @elseif($key==5)
      <th scope="row">Vocabulary</th>
      @endif

      <td>{{$result[$key]->true}}/{{$result[$key]->dem}}</td>
      <td>{{number_format($diem,1)}}</td>
      @foreach($scores[$key] as $score)
      @if($score->from <= $result[$key]->true && $score->to >= $result[$key]->true)
      <td>{!!$score->content!!}</td>
      @endif
      @endforeach
    </tr>
    
   @endforeach

  </tbody>
</table>
</div>

@stop