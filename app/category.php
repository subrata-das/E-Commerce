<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
            'name', 
            'desc',
            'parent_id',
            'created_by'
        ];
    protected $hidden = [
            'created_at',
            'updated_at'
        ];

    public function User(){
        return $this->belongsTo('App\User','created_by');
    }

    public static function store($request){
        $result = category::create($request);
        return $result;
    }

    public static function find($request){
        $result = category::where('created_by',$request)
                    // ->orderBy('desc')
                    ->get();
        return $result;
    }

    public static function fetch($request){
        $result = category::findOrFail($request);
                    
        return $result;
    }

    public static function get_parent_category(){
        $result = category::where('parent_id', 0)->get();
        return $result;
    }

    public static function upToDate($data,$request){
        $result = category::where('id', $data['id'])->update($request);
        return $result;
    }
    
}
