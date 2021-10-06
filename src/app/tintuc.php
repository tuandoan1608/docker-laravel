<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class tintuc extends Model
{
    
    use Notifiable;

    public function add($tintuc)
    {
        if(isset($tintuc)){
            DB::table('tintuc')->insert([
                'title' => $tintuc->title,
                'content' => $tintuc->content,
                'status'=> $tintuc->status,
                'created_by'=>auth()->user()->id,
            ]);
            return true;
        }else{
            dd('error');
        }
    }
    public function getByid($id)
    {
        return DB::table('tintuc')->where('id',$id)->first();
    }
    public function getAll()
    {
       return DB::table('tintuc')->get();
    }
    public function updateByid($id,$tintuc)
    {
     if(isset($tintuc)){
            DB::table('tintuc')->where('id',$id)->update(['title' => $tintuc->title,
            'content' => $tintuc->content,
            'status'=> $tintuc->status,] );
            return true;
        }else{
            dd('error');
        }
    }
    public function deleteByid($id)
    {
        DB::table('tintuc')->where('id',$id)->delete();
    }
}
