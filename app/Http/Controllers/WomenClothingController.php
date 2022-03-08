<?php

namespace App\Http\Controllers;

use App\Models\WomenClothing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WomenClothingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return WomenClothing::select('id','title','price','image')->get();
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
            Storage::putFileAs('public/women-clothing/image', $request->image,$imageName);
            WomenClothing::create($request->post()+['image'=>$imageName]);

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
     * @param  \App\Models\WomenClothing  $womenClothing
     * @return \Illuminate\Http\Response
     */
    public function show(WomenClothing $womenClothing)
    {
        return response()->json([
            'womenClothing'=>$womenClothing
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WomenClothing  $womenClothing
     * @return \Illuminate\Http\Response
     */
    public function edit(WomenClothing $womenClothing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WomenClothing  $womenClothing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WomenClothing $womenClothing)
    {
        $request->validate([
            'title'=>'required',
            'price'=>'required',
            'image'=>'nullable'
        ]);

        try{

            $womenClothing->fill($request->post())->update();

            if($request->hasFile('image')){

                // remove old image
                if($womenClothing->image){
                    $exists = Storage::disk('public')->exists("women-clothing/image/{$womenClothing->image}");
                    if($exists){
                        Storage::disk('public')->delete("women-clothing/image/{$womenClothing->image}");
                    }
                }

                $imageName = Str::random().'.'.$request->image->getClientOriginalExtension();
                Storage::putFileAs('public/men-clothing/image', $request->image,$imageName);
                $womenClothing->image = $imageName;
                $womenClothing->save();
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
     * @param  \App\Models\WomenClothing  $womenClothing
     * @return \Illuminate\Http\Response
     */
    public function destroy(WomenClothing $womenClothing)
    {
        try {

            if($womenClothing->image){
                $exists = Storage::disk('public')->exists("women-clothing/image/{$womenClothing->image}");
                if($exists){
                    Storage::disk('public')->delete("women-clothing/image/{$womenClothing->image}");
                }
            }

            $womenClothing->delete();

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
