<!doctype html>
  <html lang="vi">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>Pasal</title>
    <link rel="canonical" href="">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets_pasal/css/pasal.css?v=1.2')}}" rel="stylesheet">
    <link href="{{asset('assets_pasal/css/test.css?v=1.9')}}" rel="stylesheet">
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body id="test">
  <div class="underlay">
   @php
  
   @endphp
  </div>
    <div class="container" id="content">
    <div class="row">
        <div class="logo-holder">
            <img class="logo" src="{{asset('assets_pasal/img/logo.png')}}" alt="logo" />
        </div>
        </div>
        <form action="{{route('test.submit',$page)}}" method="post">
          @csrf
        <div class="content-test">
            <div class="question-list">
            <div class="part-name w-100"><a class="box-shadow">{{$sections[0]->section_name}}</a></div>
            @if($sections[0]->section_type ==1)
                <audio controls>
                  <source src="{{asset($sections[0]->file)}}" >
                Your browser does not support the audio element.
                </audio>  
            @elseif($sections[0]->section_type ==2)
                
                  {!!$sections[0]->section_content!!}
                    
            @endif


            <!-- <div id="waveform"></div> -->
           
            <!-- <input type="hidden" name="page" value="{{++$page}}"> -->
      	    @foreach($sections as $key => $section)
              @php
                 $index = 0;
              @endphp
              <h5>{{$section->title}}</h5>
              <div class="list" style="margin-bottom: 50px;">
              
              	<div class="card box-shadow">
      	           <div class="card-body">



                @php
                $dem = 0;
                @endphp
      	        @foreach($questions as $key1=> $quest)

                   @if($quest->quizz_id == $section->quizz_id)
                    @php
                    $dem ++;
                    @endphp
      	           @if($quest->question_type == 1)
                          	<div class="col-md-12">Question {{$dem}}: {!!$quest->question!!}</div>
                               @foreach( explode(',',$quest->list_answer) as $list)
                                  <div class="form-check col-md-3">
                  							    <input type="radio" name="{{$quest->id}}" value="{{$list}}" class="form-check-input" id="exampleCheck1">
                  							    <label class="form-check-label" for="exampleCheck1">{{$list}}</label>
                  							  </div>
                               @endforeach
                              

      	           @elseif($quest->question_type == 2)
                   @if($section->content!=null && $index==0)
                    @php
                       $index = 1;
                   @endphp
                   <div class="" style="max-width: 400px;">
                    
                         {!!$section->content!!}
                     
                    </div>
                  
                   @endif
                    <div class="col-md-12">Question {{$dem}}: {!!$quest->question!!}</div>       
      	           @elseif($quest->question_type == 3)
                          <div class="col-md-12">Question {{$dem}}: 
                          	<select name="{{$quest->id}}">
                          		<option value="true">True</option>
                          		<option value="false">False</option>
                          		<option value="not_given">Not Given</option>
                          	</select>
                          	{{$quest->question}}
                          </div>
                               

      	            @elseif($quest->question_type == 5)
                          <div class="col-md-12">Question {{$dem}}: {!!$quest->question!!}</div>
                            
                               
      	           @elseif($quest->question_type == 4)
                           Question {{$dem}}: 
                           @foreach( explode(',',$quest->list_answer) as $list)
                              <div class="form-check col-md-3">
              							    <input name="{{$quest->id}}" type="radio" value="{{$list}}" class="form-check-input" id="exampleCheck1">
              							    <label class="form-check-label" for="exampleCheck1">{{$list}}</label>
              							  </div>
                            @endforeach
      	           @endif

                   @endif
      	 
      	        @endforeach
	       </div>
        </div>
      </div>    
        	
	    @endforeach
      <div class="col text-center">
        <button type="submit" class="btn btn-success">{{$button}}</button> 
      </div>
        </div>
</div>
</div>

</from>
    </body>
    <footer>
 
     <style type="text/css">
       img, svg {

          max-width: 900px;
      }
     </style>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
      <!-- Magnific Popup core JS file -->
      <script src="{{asset('assets_pasal/magnific-popup/jquery.magnific-popup.js')}}"></script>
      <script src="{{asset('assets_pasal/js/style.js')}}"></script>
      <script src="https://unpkg.com/wavesurfer.js"></script>
      <script>
      var wavesurfer = WaveSurfer.create({
        container: '#waveform',
        waveColor: 'violet',
        progressColor: 'purple'
    });
    wavesurfer.load('asset($sections[0]->file)');
      </script>
    </footer>
    </html>


