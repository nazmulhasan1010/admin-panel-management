<?php

namespace App\Http\Controllers;

use App\Models\template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class workControll extends Controller
{
    function work()
    {
        return view('works');
    }

    function posts()
    {
        $data = template::orderBy('id', 'desc')->get();
        return $data;
    }

//    delete
    function postdelete(Request $del_data)
    {
        $delete = template::where('id', '=', $del_data->input('deleteid'))->delete();
        if ($delete == true) {
            $linkExplode = explode('/', $del_data->input('deletelink'));
            $link = 'public/' . $linkExplode[4] . '/' . $linkExplode[5];
            Storage::delete($link);
            return 1;
        } else {
            return 0;
        }
    }

//    Edit info get
    function editinfoget(Request $editid)
    {
        $editid = $editid->input('editId');
        $info_get = json_encode(template::where('id', '=', $editid)->get());
        return $info_get;
    }

//    Confirm edit
    function workupdate(Request $editData)
    {
        if ($editData->file('image')) {
            $urlImg = $editData->file('image')->store('public/publicimg');
            if ($urlImg) {
                $imgName = explode('/', $urlImg);
                $imgNameUrl = 'http://' . $_SERVER['HTTP_HOST'] . '/storage/' . $imgName[1] . '/' . $imgName[2];
                $linkExplode = explode('/', $editData->input('oldProfileLinkForDElete'));
                $link = 'public/' . $linkExplode[4] . '/' . $linkExplode[5];
                Storage::delete($link);
            }
        } else {
            $imgNameUrl = $editData->input('image');
        }
        $update = DB::table('templates')
            ->where('id', '=', $editData->input('serial'))
            ->update([
                'project_name' => $editData->input('projecTname'),
                'category' => $editData->input('projecTcatagory'),
                'designer' => $editData->input('projecTdesigner'),
                'post_id' => $editData->input('uniqueId'),
                'img_link' => $imgNameUrl
            ]);
        if ($update == true) {
            return 1;
        } else {
            return 0;
        }

    }
}
