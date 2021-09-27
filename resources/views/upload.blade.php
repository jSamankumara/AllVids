@extends('layout')

@section('content')
<div class="container-fluid border border-primary">
    <div class="row">
        <div class="col-sm-6 border border-warrning">
            <form method="POST" action="\uploadvideo" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="videoFile" class="text-white">Select a video file</label>
                    <input type="file" accept=".mp4" class="form-control-file text-white bg-dark" id="videoFile"
                        name="videofile">
                </div>
                <div class="form-group">
                    <label for="thumbnailFile" class="text-white">Select a thumbnai file</label>
                    <input type="file" accept=".gif, .jpg, .png" class="form-control-file text-white bg-dark" id="thumbnailFile"
                        name="thumbnailFile">
                </div>
                <div class="form-group">
                    <label for="videoFileName" class="text-white">Rename video file</label>
                    <input type="text" class="form-control" id="videoFileName" name="videofilename"
                        placeholder="Enter new name">
                </div>
                <div class="form-group">
                    <label for="Description" class="text-white">Video description</label>
                    <textarea class="form-control" rows="5" id="Description" name="videodescription"></textarea>
                </div>
                <div class="form-group">
                    <label for="VideoPrice" class="text-white">Set price</label>
                    <input type="number" class="form-control" id="VideoPrice" name="videoprice"
                        placeholder="Enter price" value="00.00">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="videoactivestatus" id="VideoActiveStatus1"
                        value="1" checked>
                    <label class="form-check-label text-white" for="VideoActiveStatus1">
                        Active
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="videoactivestatus" id="VideoActiveStatus2"
                        value="0">
                    <label class="form-check-label text-white" for="VideoActiveStatus2">
                        Deactive
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-sm-6 border border-warrning">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
            @endforeach
            @endif
            <span class="text-danger">{{ session()->get('filepath') }}</span></br>
            <video width="320" height="240" controls>
                <source src="{{ session()->get('filepath') }}" type="video/mp4">
              Your browser does not support the video tag.
          </video>
        </div>
    </div>
</div>
@endsection