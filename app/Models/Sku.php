<?php

namespace App\Models;


use App\Models\Traits\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Product
 * @package App\Models
 *
 * @property int $id
 * @property int $product_id
 * @property int $count
 * @property int $price
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Sku extends Model
{
    use SoftDeletes, Translatable;

    protected $fillable = [
        'product_id',
        'count',
        'price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeAvailable($query)
    {
        return $query->where('count', '>', 0);
    }

    public function propertyOptions()
    {
        return $this->belongsToMany(PropertyOption::class, 'sku_property_option')->withTimestamps();
    }

    public function isAvailable()
    {
        return !$this->product->trashed() && $this->count > 0;
    }

    public function getPriceForCount()
    {
        if (!is_null($this->pivot)) {
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }



    public function getProductNameAttribute()
    {
        return $this->product->name;
    }
}
