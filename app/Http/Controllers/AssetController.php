<?php

namespace App\Http\Controllers;
use App\AssetCategori;
use App\AssetInventory;
use App\Divisi;
use App\OfficeLocation;

use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index()
    {
        $asset = AssetInventory::all();
        $dropdown_categori = AssetCategori::pluck('name_categori', 'id');
        $dropdown_divisi = Divisi::pluck('name_divisi', 'id');
        $dropdown_location = OfficeLocation::pluck('name_office', 'id');
        return view('frontend.asset.index', compact('asset','dropdown_categori','dropdown_divisi','dropdown_location'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $addasset = new AssetInventory;
        $addasset->no_asset = $data['noasset'];
        $addasset->id_categori = $data['categoriasset'];
        $addasset->id_divisi = $data['divisi'];
        $addasset->id_location = $data['assetlocation'];
        $addasset->description = $data['description'];
        $addasset->brand = $data['brand'];
        $addasset->model = $data['model'];
        $addasset->product_id = $data['productid'];
        $addasset->price = $data['price'];
        $addasset->date_of_purchase = $data['datepurchase'];
        $addasset->save();

        return redirect()->back()->with('status', 'Data Saved Successfully');
    }


}
