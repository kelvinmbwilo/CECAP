@extends("layout.master")

@section('breadcumbs')
<li>
    <a href="{{ url('home') }}">Dashboard</a>
</li>
<li class="active">Facilities</li>

@stop

@section('contents')
<div class="row">
    <div class="col-md-7" id="listfacility">
        @include('facilities.list')
    </div>
    <div class="col-md-5" id="addfacility">
        @include('facilities.add')
    </div>
</div>

@stop