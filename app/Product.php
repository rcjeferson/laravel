<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'image'];

    /**
     * Filter Products
     */
    public function search($filter = null)
    {
        $results = $this->where(function ($query) use($filter){
            $query->where('name', 'LIKE', "%{$filter}%");
        })->paginate();

        return $results;
    }
}
