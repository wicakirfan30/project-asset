<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetCategori extends Model
{
    protected $table = 'asset_categori';
    protected $fillable = ['name_categori','description'];

    public function assetinventory(){
    	return $this->hasMany('App\AssetInventory');
    }
}
