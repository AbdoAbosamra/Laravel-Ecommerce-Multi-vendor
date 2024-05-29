<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = 'jobs_listings';
    protected $fillable = ['title' , 'salary'];
//    public static function all(): array
//    {
//        return [
//            [
//                'id' => 1,
//                'title'=> 'Director',
//                'salary'=> '50,500'
//            ],
//            [
//                'id' => 2,
//                'title'=> 'Programmer',
//                'salary'=> '35,500'
//            ],
//            [
//                'id' => 3,
//                'title'=> 'Teacher',
//                'salary'=> '40,500'
//            ]
//        ];
//    }
//    public static function find(int $id)
//    {
//        $job =Arr::first(static::all() ,  fn($job)=> $job['id'] == $id);
//
//        if( !$job ){
//            abbort(404);
//        }
//        return $job;
//    }
    public function employer()  //To acess this $job->employer;
    {
        return $this->belongsTo(Employer::class);
    }

}
