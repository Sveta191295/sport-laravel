<?php

namespace App\Http\Controllers;

use App\Models\MenShoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MenShoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MenShoes::select('id','title','price','image')->get();
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
            Storage::putFileAs('public/men-shoes/image', $request->image,$imageName);
            MenShoes::create($request->post()+['image'=>$imageName]);

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
     * @param  \App\Models\MenShoes  $menShoes
     * @return \Illuminate\Http\Response
     */
    public function show(MenShoes $menShoes)
    {
        return response()->json([
            'menShoes'=>$menShoes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenShoes  $menShoes
     * @return \Illuminate\Http\Response
     */
    public function edit(MenShoes $menShoes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenShoes  $menShoes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenShoes $menShoes)
    {
        $request->validate([
            'title'=>'required',
            'price'=>'required',
            'image'=>'nullable'
        ]);

        try{

            $menShoes->fill($request->post())->update();

            if($request->hasFile('image')){

                // remove old image
                if($menShoes->image){
                    $exists = Storage::disk('public')->exists("men-shoes/image/{$menShoes->image}");
                    if($exists){
                        Storage::disk('public')->delete("men-shoes/image/{$menShoes->image}");
                    }
                }

                $imageName = Str::random().'.'.$request->image->getClientOriginalExtension();
                Storage::putFileAs('public/men-shoes/image', $request->image,$imageName);
                $menShoes->image = $imageName;
                $menShoes->save();
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
     * @param  \App\Models\MenShoes  $menShoes
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenShoes $menShoes)
    {
        try {

            if($menShoes->image){
                $exists = Storage::disk('public')->exists("men-shoes/image/{$menShoes->image}");
                if($exists){
                    Storage::disk('public')->delete("men-shoes/image/{$menShoes->image}");
                }
            }

            $menShoes->delete();

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
