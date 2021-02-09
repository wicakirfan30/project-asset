<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficeLocation extends Model
{
    protected $table = 'office_location';
    protected $fillable = ['name_office','description'];

    public function assetinventory(){
    	return $this->hasMany('App\AssetInventory');
    }
}
