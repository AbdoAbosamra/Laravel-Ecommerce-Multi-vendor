<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use App\Rules\Filter;

class Category extends Model
{

    use HasFactory;
    // Called Whitelist
    protected $fillable = [
        'name' , 'parent_id' ,'description' ,'image' ,'status' ,'slug'
    ];
    // It is the oppisite of fillable will not ever store in the database
    // Called blacklist
//    protected $guarded = [];
    public static function rules($id= 0){
        return[
            'name'=>
                [
                    'required',
                    'string',
                    'min:3',
                    'max:255',
                    Rule::unique('categories' ,'name')->ignore($id),
                    // function($attribute , $value , $fail){
                    //     if(strtolower($value) == 'laravel'){
                    //         $fail('The name is forbidden');
                    //     }
                    // }
                    // 'filter:PHP',
                    new Filter("PHP"),
                    ],//  'unique:categories,name,$id", // Unique is check if the user have The same name of anonter row of the name
            'parent_id'=> [
                'nullable','int','exists:categories,id' ,
            ],
            'image'=> [
                'image','max:1048576','dimensions:min_width=100, min_height=100',
            ],
            'status' => 'in:active,archived'

        ];
    }
}
