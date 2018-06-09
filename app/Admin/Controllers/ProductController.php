<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Group;

class ProductController extends Controller
{


    protected $product;


    function __construct(Product $product, Group $group)
    {

        $this->product = $product;
        $this->group = $group;
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
            return view('admin.product.edit', [
                'data' => [
                    'attributes' => $this->group->find($request->group_id)->attributes->load('values'),
                ]
            ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $product = $this->product->find($id);

        // Set group from request
        if ($request->has('group_id'))
            $product->group_id = $request->group_id;

        return view('admin.product.edit', [
            'product' => $product,
            'attributes' => $product->group->attributes->load('values'),
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

        $attributes = $request->input('attributes');

        $product = $this->product->create($request->except('attributes'));

        $product->values()->sync(array_merge($attributes['select'], $attributes['multiselect']));
        return redirect(route('product'));
        // $this->product->values()->attach();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->product->find($id)->update($request->all());

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