<?php

namespace App\Http\Controllers;

use App\Models\WomenShoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WomenShoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return WomenShoes::select('id','title','price','image')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'price'=>'required',
            'image'=>'required|image'
        ]);

        try{
            $imageName = Str::random().'.'.$request->image->getClientOriginalExtension();
            Storage::putFileAs('public/women-shoes/image', $request->image,$imageName);
            WomenShoes::create($request->post()+['image'=>$imageName]);

            return response()->json([
                'message'=>'Product Created Successfully!!'
            ]);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json([
                'message'=>'Something goes wrong while creating a product!!'
            ],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WomenShoes  $womenShoes
     * @return \Illuminate\Http\Response
     */
    public function show(WomenShoes $womenShoes)
    {
        return response()->json([
            'womenShoes'=>$womenShoes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WomenShoes  $womenShoes
     * @return \Illuminate\Http\Response
     */
    public function edit(WomenShoes $womenShoes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WomenShoes  $womenShoes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WomenShoes $womenShoes)
    {
        $request->validate([
            'title'=>'required',
            'price'=>'required',
            'image'=>'nullable'
        ]);

        try{

            $womenShoes->fill($request->post())->update();

            if($request->hasFile('image')){

                // remove old image
                if($womenShoes->image){
                    $exists = Storage::disk('public')->exists("women-shoes/image/{$womenShoes->image}");
                    if($exists){
                        Storage::disk('public')->delete("women-shoes/image/{$womenShoes->image}");
                    }
                }

                $imageName = Str::random().'.'.$request->image->getClientOriginalExtension();
                Storage::putFileAs('public/women-shoes/image', $request->image,$imageName);
                $womenShoes->image = $imageName;
                $womenShoes->save();
            }

            return response()->json([
                'message'=>'Product Updated Successfully!!'
            ]);

        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json([
                'message'=>'Something goes wrong while updating a product!!'
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WomenShoes  $womenShoes
     * @return \Illuminate\Http\Response
     */
    public function destroy(WomenShoes $womenShoes)
    {
        try {

            if($womenShoes->image){
                $exists = Storage::disk('public')->exists("women-clothing/image/{$womenShoes->image}");
                if($exists){
                    Storage::disk('public')->delete("women-clothing/image/{$womenShoes->image}");
                }
            }

            $womenShoes->delete();

            return response()->json([
                'message'=>'Product Deleted Successfully!!'
            ]);
            
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message'=>'Something goes wrong while deleting a product!!'
            ]);
        }
    }
}
