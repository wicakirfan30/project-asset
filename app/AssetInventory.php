<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetInventory extends Model
{
    protected $table = 'asset_inventory';
    protected $fillable = ['no_asset','id_categori','id_divisi','id_location','description','brand','model','product_id','price','date_of_purchase'];

    public function divisi(){
    	return $this->belongsTo('App\Divisi','id_divisi');
    }

    public function officelocation(){
    	return $this->belongsTo('App\OfficeLocation','id_location');
    }

    public function assetcategori(){
    	return $this->belongsTo('App\AssetCategori','id_categori');
    }
}
