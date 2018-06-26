<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Group;

class ProductController extends Controller
{


    /**
     * @var Product
     */
    protected $product;


    function __construct(Product $product)
    {

        $this->product = $product;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->paginate();

        return view('admin.product.index', ['products' => $products]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->has('group_id'))
            return view('admin.product.form', [
                'features' => Group::find($request->group_id)->getFormFeatures(),  
            ]);
        // return redirect(404);
    }


    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id, Request $request)
    {    
        $product = $this->product->find($id);

        // Set group from request
        if ($request->has('group_id')) $product->group_id = $request->group_id;

        return view('admin.product.form', [
            'product' => $product, 
            'features' => $product->getFormFeatures(),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // DB::transaction(function () {
            
        // });

        $product = $this->product->create($request->except('features'));
        $product->syncFeatures($request->input('features'));

        return redirect(route('product.edit', ['id' => $product->id]));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        // dd($request->all());
        $product = $this->product->find($id);
        $product->update($request->except('features'));
        $product->syncFeatures($request->input('features'));
        return back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $ids
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        try {
            $this->product->destroy($ids);
            return response()->json([
                'type' => 'success',
                'ids' => $ids
            ]);
        } catch (Exception $e) {
            return json_encode($e->getMessage());
        }
    }


}