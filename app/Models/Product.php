<?php

namespace App\Models;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Models
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $code
 * @property string $description
 * @property string $image
 * @property Category $category
 * @property string $price
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Product extends Model
{
//    public const COLORS = ['Red', 'Green', 'Blue', 'Black', 'White'];
//    public const SIZES  = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];

    protected $fillable = [
        'category_id',
        'name',
        'code',
        'description',
        'image',
        'price',
    ];

//    public function getCategory()
//    {
//        return Category::find($this->category_id);
//    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPriceForCount()
    {
        if (!is_null($this->pivot)) {
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }
}
