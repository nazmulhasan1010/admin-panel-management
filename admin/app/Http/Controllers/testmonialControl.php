<?php

namespace App\Http\Controllers;

use App\Models\testomonials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class testmonialControl extends Controller
{
    function testMonial()
    {
        return view('testominals');
    }

    // testimonial post get
    function testimonialspostget()
    {
        $data = testomonials::orderBy('id', 'desc')->get();
        return $data;
    }

    function testimonialseditinfoget(Request $get_id)
    {
        $info_get = json_encode(testomonials::where('id', '=', $get_id->input('editId'))->get());
        return $info_get;
    }

    // testimonial post delete
    function testimonialsdelete(Request $del_info)
    {
        $delete = testomonials::where('id', '=', $del_info->input('delId'))->delete();
        if ($delete == true) {
            $linkExplode = explode('/', $del_info->input('profileLink'));
            $link = 'public/' . $linkExplode[4] . '/' . $linkExplode[5];
            Storage::delete($link);
            return 1;
        } else {
            return 0;
        }
    }

    // testimonial post update
    function authorinfoup(Request $update_data){
        if ($update_data->file('image')) {
            $urlImg = $update_data->file('image')->store('public/publicimg');
            if ($urlImg) {
                $imgName = explode('/', $urlImg);
                $imgNameUrl = 'http://' . $_SERVER['HTTP_HOST'] . '/storage/' . $imgName[1] . '/' . $imgName[2];
                $linkExplode = explode('/', $update_data->input('oldProfile'));
                $link = 'public/' . $linkExplode[4] . '/' . $linkExplode[5];
                Storage::delete($link);
            }
        } else {
            $imgNameUrl = $editData->input('image');
        }
        $update = DB::table('testomonials')
            ->where('id', '=', $update_data->input('serial'))
            ->update([
                'saying' =>   $update_data->input('saying') ,
                'author' => $update_data->input('name'),
                'image' => $imgNameUrl
            ]);
        if ($update == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
