<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        $product =$this->route('Product',0);     ////this route لانه بترجعلي قيمة الاوبجيكت نفسه مش الايدي (قيمةالانتجر )
        $id =$product ? $product->id : 0;

        return[

                'name' => 'required|max:255|min:3',
                'slug' => "required |unique:products,slug,{$id}",
                'category_id' => 'nullable|int|exists:categories,id,',
                'description' => 'nullable|string',
                'short_description' => 'nullable|string|max:500',
                'price' => 'required|numeric|min:0',
                'compare_price' => 'nullable|numeric|min:0|gt:price',
                'image' => 'nullable|image|max:2048|dimensions:max_width=350,max_height=600',
                'status'=>'required|in:active,draft,archived',
                'gallery'=>'nullable|array',
                'gallery.*'=>'image',

            ];
    }

    public function messages()
    {                //تستخدم لانشاء رسائل كاستم خاصة بنا بديل عن الديفولت تبع لارفل
        return [
            'required'=> ':attribute field is required !! ',
            'unique'=> 'The value alredy  exists!',
            'name.required'=>'The product name is mandatory',
        ];
    }
}
