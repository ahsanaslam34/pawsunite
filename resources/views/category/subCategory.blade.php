<option value="" selected disabled>Sub Categories</option>
@foreach($dataArr as $data)
	<option value="{{$data->id}}">{{$data->des}}</option>
@endforeach