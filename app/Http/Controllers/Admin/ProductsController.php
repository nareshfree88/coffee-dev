<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {

        $products = Product::get();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        $category = \App\Category::get();

        return view('admin.products.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {


        $path = public_path('uploads/products');

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
        $requestData['new'] = ($request->new == 1) ? 1 : 0;
        $requestData['visible_individually'] = ($request->new == 1) ? 1 : 0;
        $requestData['featured'] = ($request->new == 1) ? 1 : 0;
        Product::create($requestData);

        return redirect('admin/products')->with('flash_message', 'Product added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $product = Product::findOrFail($id);

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $product = Product::findOrFail($id);
        $category = \App\Category::get();
        return view('admin.products.edit', compact('product', 'category'));
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
        $path = public_path('uploads/products');
        $images = array();
        if ($request->hasFile('image')):
            if ($files = $request->file('image')) {
                foreach ($files as $file) {
                    $name = time() . rand(2, 10) . $file->getClientOriginalName();
                    $file->move($path, $name);
                    $images[] = $name;
                }
                $getImage = implode(",", $images);
                $requestData['image'] = $getImage;
            }
        endif;





//        dd($requestData);
        $product = Product::findOrFail($id);
        $product->update($requestData);

        return redirect('admin/products')->with('flash_message', 'Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        Product::destroy($id);
        return redirect('admin/products')->with('flash_message', 'Product deleted!');
    }

}
