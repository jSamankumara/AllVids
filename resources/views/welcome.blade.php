@extends('layout')

@section('content')
<div class="container-fluid border border-primary">
    <!-- <div class="row justify-content-start border border-primary"> -->

    <!-- @foreach($videos as $video)
        <div class="col-sm-2 bg-dark text-white">
            <img src="/getvideo/{{$video->thumbnail_path}}" alt="...">
        </div>
    @endforeach -->
        

        <div class="col-sm-2 m-2 border border-warning text-white" style="height : 150px;">
            <img src="..." class="rounded" alt="...">
        </div>

        <div class="col-sm-2 m-2 border border-warning text-white" style="height : 150px;">
            <img src="..." class="rounded" alt="...">
        </div>

        <!-- <div class="col-sm-2 m-2 border border-warning text-white" style="height : 150px;">
            <img src="..." class="rounded" alt="...">
        </div>

        <div class="col-sm-2 m-2 border border-warning text-white" style="height : 150px;">
            <img src="..." class="rounded" alt="...">
        </div>

        <div class="col-sm-2 m-2 border border-warning text-white" style="height : 150px;">
            <img src="..." class="rounded" alt="...">
        </div>

        <div class="col-sm-2 m-2 border border-warning text-white" style="height : 150px;">
            <img src="..." class="rounded" alt="...">
        </div> -->
    <!-- </div> -->
</div>
<!-- @if (session()->has('user'))
<span class="text-white">{{ session()->get('user')->image_path }}</span></br>
<img src="/getvideo/{{ session()->get('user')->image_path }}" alt="" width="500" height="600">

@endif -->


@endsection