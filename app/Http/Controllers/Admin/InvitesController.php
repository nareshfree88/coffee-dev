<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Invite;
use Illuminate\Http\Request;
use Auth;
use App\Mail\Invitationmail;
use Illuminate\Support\Facades\Mail;
class InvitesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $invites = Invite::where('name', 'LIKE', "%$keyword%")
                            ->orWhere('email', 'LIKE', "%$keyword%")
                            ->orWhere('message', 'LIKE', "%$keyword%")
                            ->orWhere('invite_url', 'LIKE', "%$keyword%")
                            ->latest()->paginate($perPage);
        } else {
            $invites = Invite::latest()->paginate($perPage);
        }

        return view('admin.invites.index', compact('invites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('admin.invites.create');
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
        $requestData['url']= 'https://islands.cafe/shop/';
        $requestData['sender']= Auth::user()->name;
        
        
        Mail::to($request->email)->send(new Invitationmail($requestData));
      
        Invite::create($requestData); 

        return redirect('admin/invites')->with('flash_message', 'Invite added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $invite = Invite::findOrFail($id);

        return view('admin.invites.show', compact('invite'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $invite = Invite::findOrFail($id);

        return view('admin.invites.edit', compact('invite'));
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

        $invite = Invite::findOrFail($id);
        $invite->update($requestData);

        return redirect('admin/invites')->with('flash_message', 'Invite updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        Invite::destroy($id);

        return redirect('admin/invites')->with('flash_message', 'Invite deleted!');
    }

}
