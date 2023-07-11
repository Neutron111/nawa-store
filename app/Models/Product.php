<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const STATUS_ACTIVE ='active';
    const STATUS_ARCHIVED ='archived';
    const STATUS_DRAFT ='draft';

    protected $fillable =[
        'name','slug','category_id','description','short_description',
        'price','compare_price','image','status'
    ];

    public static function getstatusoptions(){
        return[
            self::STATUS_ACTIVE =>'Active',
            self::STATUS_ARCHIVED =>'Archived',
            self::STATUS_DRAFT =>'Draft',

        ];
    }
}
