<?php
//
//namespace App\Http\Controllers\Admin;
//
//use Carbon\Carbon;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
//
///**
// * @property int $id
// * @property string $name
// * @property string $code
// * @property string $description
// * @property string $image
// * @property Carbon $created_at
// * @property Carbon $updated_at
// * @method static updateOrCreate(string[] $array, array $array1)
// */
//class Category extends Model
//{
//    use HasFactory;
//
//    protected $fillable = [
//        'name',
//        'code',
//        'description',
//        'image',
//
//    ];
//
//    public function parent()
//    {
//        return $this->belongsTo(Category::class, 'parent_id');
//    }
//
//
//}
