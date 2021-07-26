


<div class="container">
	
	    @foreach($questions as $key => $question)
        <h5>{{$key}}</h5>
        <div class="row" style="margin-bottom: 50px;">
        	<div class="card">
	           <div class="card-body">
	        @foreach($question as $key1=> $quest)
	        
	           @if($quest->question_type == 1)
                    	<div class="col-md-12">Question {{++$key1}}: {!!$quest->question!!}</div>
                         <div class="row">
       
                         @foreach( explode(',',$quest->list_answer) as $list)
                              <div class="form-check col-md-3">
							    <input type="radio" name="{{$key1}}" class="form-check-input" id="exampleCheck1">
							    <label class="form-check-label" for="exampleCheck1">{{$list}}</label>
							  </div>
                         @endforeach
                         </div>
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
                    <div class="row">
                         Question {{++$key1}}: 
                         @foreach( explode(',',$quest->list_answer) as $list)
                              <div class="form-check col-md-3">
							    <input name="{{$key1}}" type="radio" class="form-check-input" id="exampleCheck1">
							    <label class="form-check-label" for="exampleCheck1">{{$list}}</label>
							  </div>
                         @endforeach
                         </div>
                      
                         
	           @endif
	 
	        @endforeach
	                    </div>
	</div>
	    </div>    
	    @endforeach
	
</div>



