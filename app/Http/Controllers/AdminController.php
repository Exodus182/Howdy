<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Item;
use Carbon\Carbon;
use Alert;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->where('role', 2)->first();

        return view('admin.dashboard', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-items');
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
            'item_name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/images'), $image_name);

            $image_path = "" . $image_name;
        }


        $item = new Item;
        $item->item_name = $request->item_name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->description = $request->description;
        $item->image = $image_path;
        $item->save();

        Alert::success('Data saved', 'Success');
        return redirect('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function editList()
    {
        $items = Item::all();
        return view('admin.update-list', compact('items'));
    }

    public function editItem($id)
    {
        $item = Item::where('id', $id)->first();
        return view('admin.update-item', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'item_name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $item = Item::find($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->hashName();
            $image->move(public_path('/uploads'), $image_name);

            $image_path = "" . $image_name;
        }
        else {
            $image_path = $item->image;
        }


        $item->item_name = $request->item_name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->description = $request->description;
        $item->image = $image_path;
        $item->update();

        Alert::success('Data saved', 'Success');
        return redirect('update-list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteItem()
    {
        $items = Item::all();
        return view('admin.delete-items', compact('items'));
    }

    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect('delete-items');
    }
}
