
@extends('frontend.layouts.master_index')
@section('content')

@if($record->position == "lo-trinh")
<script type="text/javascript">
	$("#dang_ky").hide();
</script>
@endif


{!!$record->content!!}



@stop