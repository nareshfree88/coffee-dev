<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Video;
use Illuminate\Http\Request;

class VideosController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $videos = Video::where('video', 'LIKE', "%$keyword%")
                            ->latest()->paginate($perPage);
        } else {
            $videos = Video::latest()->paginate($perPage);
        }

        return view('admin.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('admin.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {



        $data = $request->all(); //mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts
       
  
        $rules = [
            'video' => 'required|mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:4000040|required'];
        $validator = Validator($data, $rules);

        if ($validator->fails()) {
            return redirect()
                            ->back()
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $video = $data['video'];
            $input = time() . '.' . $video->getClientOriginalExtension();
            $destinationPath = public_path() . '/uploads/videos';
//            dd($destinationPath);

            $video->move($destinationPath, $input);

            $data['video'] = $input;
            Video::create($data);
        }
        return redirect('admin/videos')->with('flash_message', 'Video added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $video = Video::findOrFail($id);

        return view('admin.videos.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $video = Video::findOrFail($id);

        return view('admin.videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id) {

        $data = $request->all();
        $rules = [
            'video' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:300040|required'];
        $validator = Validator($data, $rules);

        if ($validator->fails()) {
            return redirect()
                            ->back()
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $video = $data['video'];
            $input = time() . '.' . $video->getClientOriginalExtension();
            $destinationPath = public_path() . '\uploads\videos';

            $video->move($destinationPath, $input);

            $data['video'] = $input;
            $video = Video::findOrFail($id);
            $video->update($data);
            return redirect('admin/videos')->with('flash_message', 'Video updated!');
        }
    }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         *
         * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
         */
        public function destroy($id) {
            Video::destroy($id);

            return redirect('admin/videos')->with('flash_message', 'Video deleted!');
        }

    }
    