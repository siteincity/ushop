<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    

    const PRODUCTS_PER_PAGE = 20;

    
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
        $products = $this->product->paginate(self::PRODUCTS_PER_PAGE);
        
        return view('admin.product.index', ['products' => $products]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.product.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->product->create($request->all());
        
        return redirect(route('product'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return 'product.show - ' . $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        return view('admin.product.edit', ['product'=> $this->product->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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
     * @param  int  $id
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