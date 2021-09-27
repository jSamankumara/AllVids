<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videos;

class VideoController extends Controller
{
    public function saveVideo(Request $request){
        // dd($request->session()->get('user')->id);

        $validated = $request->validate([
            'videofile' => 'required|mimes:mp4',
            'thumbnailFile' => 'required|mimes:gif,jpg,png',
            'videofilename' => 'required|max:50',
            'videodescription' => 'required',
            'videoprice' => 'required',
            'videoactivestatus' => 'required'
        ]);

        $videopath = $request->file('videofile')->store('videos');
        $thumbnailpath = $request->file('thumbnailFile')->store('thumbnails');

        $video=new Videos();
        $video->video_title=$request->videofilename;
        $video->file_path=$videopath;
        $video->thumbnail_path=$thumbnailpath;
        $video->video_description=$request->videodescription;
        $video->price=$request->videoprice;
        $video->active_status=$request->videoactivestatus;
        $video->category_id=1;
        $saved=$video->save();

        if($video){
            $request->session()->flash('upload', 'Upload was successful!');
            // $request->session()->flash('filepath', $path);
        }else{
            $request->session()->flash('upload', 'Upload fail!');
        }
        // echo asset($url);
        return redirect()->back();

    }

    public function getVideolist(){

        $videos=Videos::all();

        return view('welcome',['videos'=>$videos]);
    }
}
