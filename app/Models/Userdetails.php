<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userdetails extends Model
{
    use HasFactory;
    protected $table = 'userdetails';

    static public function getUserDetails(){
        $return = Userdetails::select('userdetails.*')
        ->where('is_delete','=',0);
        $return = $return->orderBy('id','desc')
        ->paginate(1);

        return $return;
    }

    static public function getSingle($id){
        return Userdetails::find($id);
    }
}
