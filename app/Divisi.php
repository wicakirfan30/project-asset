<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $table = 'divisi';
    protected $fillable = ['name_divisi','description'];

    public function assetinventory(){
    	return $this->hasMany('App\AssetInventory');
    }
}
