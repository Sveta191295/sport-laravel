<?php

namespace App\Http\Controllers;

use App\Models\MenClothing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MenClothingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//         $countries = DB::table('countries')->paginate(15);
// return view(
// 'countries.index'
// ,
// ['countries' => $countries]
// );

        return MenClothing::select('id','title','price','image')->get();
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
            Storage::putFileAs('public/men-clothing/image', $request->image,$imageName);
            MenClothing::create($request->post()+['image'=>$imageName]);

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
     * @param  \App\Models\MenClothing  $menClothing
     * @return \Illuminate\Http\Response
     */
    public function show(MenClothing $menClothing)
    {
          return response()->json([
            'menClothing'=>$menClothing
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenClothing  $menClothing
     * @return \Illuminate\Http\Response
     */
    public function edit(MenClothing $menClothing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenClothing  $menClothing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenClothing $menClothing)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'nullable'
        ]);

        try{

            $menClothing->fill($request->post())->update();

            if($request->hasFile('image')){

                // remove old image
                if($menClothing->image){
                    $exists = Storage::disk('public')->exists("men-clothing/image/{$menClothing->image}");
                    if($exists){
                        Storage::disk('public')->delete("men-clothing/image/{$menClothing->image}");
                    }
                }

                $imageName = Str::random().'.'.$request->image->getClientOriginalExtension();
                Storage::putFileAs('public/men-clothing/image', $request->image,$imageName);
                $menClothing->image = $imageName;
                $menClothing->save();
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
     * @param  \App\Models\MenClothing  $menClothing
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenClothing $menClothing)
    {
        try {

            if($menClothing->image){
                $exists = Storage::disk('public')->exists("men-clothing/image/{$menClothing->image}");
                if($exists){
                    Storage::disk('public')->delete("men-clothing/image/{$menClothing->image}");
                }
            }

            $menClothing->delete();

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
