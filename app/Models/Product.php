<?php

namespace App\Models;
use Attribute;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use NumberFormatter;

class Product extends Model
{
    use HasFactory,SoftDeletes;            // softdelete

    const STATUS_ACTIVE ='active';
    const STATUS_ARCHIVED ='archived';
    const STATUS_DRAFT ='draft';

    protected $fillable =[
        'name','slug','category_id','description','short_description',
        'price','compare_price','image','status'
    ];

    protected static function booted()    // Global Scope
    {
        static::addGlobalScope('owner',function( Builder $query){   // owner the name of scope
            $query->where('user_id','=',1);
        });
    }
    public function scopeActive(Builder $query){   // Local Scope
        $query->where('status','=','active');

    }
    public function scopeٍStatus(Builder $query ,$status){   // Local Scope with parameter
        $query->where('status','=',$status);

    }


    public static function getstatusoptions(){
        return[
            self::STATUS_ACTIVE =>'Active',
            self::STATUS_ARCHIVED =>'Archived',
            self::STATUS_DRAFT =>'Draft',

        ];
    }

        public function getImageUrlAttribute(){
        if ($this->image)
        {
            return Storage::disk('public')->url($this->image);
        }
        return 'https://placehold.co/80x80';
    }
    public function getPriceFormattedAttribute()  /// Acsessors
    {
        $foramtter =new NumberFormatter('en',NumberFormatter::CURRENCY);
        return $foramtter->formatCurrency($this->price,'EUR');
    }
    public function getcomparePriceFormattedAttribute()  /// Acsessors
    {
        $foramtter =new NumberFormatter('en',NumberFormatter::CURRENCY);
        return $foramtter->formatCurrency($this->compare_price,'EUR');
    }
}
