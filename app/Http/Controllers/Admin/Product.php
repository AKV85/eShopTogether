<?php
//
//namespace App\Http\Controllers\Admin;
//
//use Carbon\Carbon;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Relations\BelongsTo;
//use Illuminate\Database\Eloquent\SoftDeletes;
//
///**
// * Class Product
// * @package App\Models
// *
// * @property int $id
// * @property int $category_id
// * @property string $name
// * @property string $code
// * @property string $description
// * @property string $image
// * @property string $price
// * @property Carbon $created_at
// * @property Carbon $updated_at
// */
//class Product extends Model
//{
//    use HasFactory;
//    use SoftDeletes;
//
//    protected $fillable = [
//        'category_id',
//        'name',
//        'code',
//        'description',
//        'image',
//        'price',
//
//    ];
//
//    public function category(): BelongsTo
//    {
//        return $this->belongsTo(Category::class);
//    }
//
//
//}
//
