<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App/Models
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $description
 * @property string $image
 * @property Category $products
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Category extends Model
{

    use HasFactory, Translatable;

    protected $fillable = [
        'name',
        'code',
        'description',
        'image',
        'name en',
        'description en',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
