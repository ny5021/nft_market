<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name'
    ];
    // Une fonction qui nous permet d'avoir tous les NFT appartenant à une Categorie
    public function getAllNft(){
        
        return $this->hasMany(Nft::class);
    }
}
