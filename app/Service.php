<?php

namespace App;
use App\Model\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable=['phone','notes'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }

}
