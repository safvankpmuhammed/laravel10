<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    // protected function status() : Attribute {
    //     return Attribute::make(
    //         get:fn(string $value) => ($value == 1)? "Active" : "Inactive"
    //     );
    // }

    // protected function isFavourite() : Attribute {
    //     return Attribute::make(
    //         get:fn(string $value) => ($value == 1)? "Yes" : "No"
    //     );
    // }

    public function getStatusTextAttribute(){
        return ($this->status == 1) ? 'Active' : 'Inactive';
    }

    public function getIsFavouriteTextAttribute(){
        return ($this->is_favourite == 1) ? 'Yes' : 'No';
    }

    protected $appends = ['status_text','is_favourite_text'];
}
