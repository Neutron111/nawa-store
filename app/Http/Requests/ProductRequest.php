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

        $product =$this->route('Product',0);     //تستعمل لما بدي استدعي اشي من برا بس انا هان في نفس الكلاس استعملت ذيس عادي
        $id =$product ? $product->id : 0;

        return[

                'name' => 'required|max:255|min:3',
                'slug' => "required |unique:products,slug,{$id}",
                'category_id' => 'nullable|int|exists:categories,id,',
                'description' => 'nullable|string',
                'short_description' => 'nullable|string|max:500',
                'price' => 'required|numeric|min:0',
                'compare_price' => 'nullable|numeric|min:0|gt:price',
                'image' => 'nullable|image|dimensions:min_width=400,min_height=300|max:1024',
                'status'=>'required|in:active,draft,archived',

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
