<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\EmailContent;
use Illuminate\Http\Request;
use Validator;

class EmailContentController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
        $emailcontent = EmailContent::get();
        return view('admin.email-content.index', compact('emailcontent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('admin.email-content.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {

        $requestData = $request->all();

        $validator = $this->validate($request, [
            'status' => 'required',
            'content' => 'required',
        ]);
       

        EmailContent::create($requestData);

        return redirect('admin/email-content')->with('flash_message', 'EmailContent added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $emailcontent = EmailContent::findOrFail($id);

        return view('admin.email-content.show', compact('emailcontent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $emailcontent = EmailContent::findOrFail($id);

        return view('admin.email-content.edit', compact('emailcontent'));
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

        $requestData = $request->all();

        $emailcontent = EmailContent::findOrFail($id);
        $emailcontent->update($requestData);

        return redirect('admin/email-content')->with('flash_message', 'EmailContent updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        EmailContent::destroy($id);

        return redirect('admin/email-content')->with('flash_message', 'EmailContent deleted!');
    }

}
