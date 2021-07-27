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
  </div>
    <div class="container" id="content">
    <div class="row">
        <div class="logo-holder">
            <img class="logo" src="{{asset('assets_pasal/img/logo.png')}}" alt="logo" />
        </div>
        </div>
        <div class="content-test">
            <div class="question-list">
            <div class="part-name w-100"><a class="box-shadow">IV. LISTENING</a></div>
            <div id="waveform"></div>
	    @foreach($questions as $key => $question)
        
        <h5>{{$key}}</h5>
        <div class="list" style="margin-bottom: 50px;">
        
        	<div class="card box-shadow">
	           <div class="card-body">
	        @foreach($question as $key1=> $quest)
	        
	           @if($quest->question_type == 1)
                    	<div class="col-md-12">Question {{++$key1}}: {!!$quest->question!!}</div>
                         
       
                         @foreach( explode(',',$quest->list_answer) as $list)
                              <div class="form-check col-md-3">
							    <input type="radio" name="{{$key1}}" class="form-check-input" id="exampleCheck1">
							    <label class="form-check-label" for="exampleCheck1">{{$list}}</label>
							  </div>
                         @endforeach
                        
	           @elseif($quest->question_type == 2)
                    <div class="col-md-12">Question {{++$key1}}: {!!$quest->question!!}</div>
                         
	           @elseif($quest->question_type == 3)
                    <div class="col-md-12">Question {{++$key1}}: 
                    	<select>
                    		<option>True</option>
                    		<option>False</option>
                    		<option>Not Given</option>
                    	</select>
                    	{{$quest->question}}
                    </div>
                         
	            @elseif($quest->question_type == 5)
                    <div class="col-md-12">Question {{++$key1}}: {!!$quest->question!!}</div>
                      
                         
	           @elseif($quest->question_type == 4)
                         Question {{++$key1}}: 
                         @foreach( explode(',',$quest->list_answer) as $list)
                              <div class="form-check col-md-3">
							    <input name="{{$key1}}" type="radio" class="form-check-input" id="exampleCheck1">
							    <label class="form-check-label" for="exampleCheck1">{{$list}}</label>
							  </div>
                         @endforeach

                      
                         
	           @endif
	 
	        @endforeach
	                    </div>
	</div>
	    </div>    
        	
	    @endforeach
        </div>
</div>
</div>
    </body>
    <footer>
 

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
    wavesurfer.load('example.wav');
      </script>
    </footer>
    </html>


