<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Equipment;
use Illuminate\Http\Request;

class EquipmentsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
        $equipments = Equipment::get();
        return view('admin.equipments.index', compact('equipments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('admin.equipments.create');
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
        $path = public_path('public/uploads/equipments');
        $images = array();

        if ($files = $request->file('image')) {
            foreach ($files as $file) {
                $name = time() . rand(2, 10) . $file->getClientOriginalName();
                $file->move($path, $name);
                $images[] = $name;
            }
        }
        $getImage = implode(",", $images);

        $requestData = $request->all();
        $requestData['image'] = $getImage;
        Equipment::create($requestData);

        return redirect('admin/equipments')->with('flash_message', 'Equipment added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $equipment = Equipment::findOrFail($id);

        return view('admin.equipments.show', compact('equipment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $equipment = Equipment::findOrFail($id);

        return view('admin.equipments.edit', compact('equipment'));
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



        $path = public_path('public/uploads/equipments');
        $images = array();

        if ($files = $request->file('image')) {
            foreach ($files as $file) {
                $name = time() . rand(2, 10) . $file->getClientOriginalName();
                $file->move($path, $name);
                $images[] = $name;
            }
        }
        $getImage = implode(",", $images);

        $requestData = $request->all();
        $requestData['image'] = $getImage;

        $equipment = Equipment::findOrFail($id);
        $equipment->update($requestData);

        return redirect('admin/equipments')->with('flash_message', 'Equipment updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        Equipment::destroy($id);

        return redirect('admin/equipments')->with('flash_message', 'Equipment deleted!');
    }

    public function UserIndex(Request $request) {

        $equipments = Equipment::get();
        return view('user.equipment.equipment', compact('equipments'));
    }

    public function allProducts() {
        $equipments = Equipment::get();
        $products = \App\Product::get();
        return view('user.products.all', compact('equipments','products'));
    }

}
