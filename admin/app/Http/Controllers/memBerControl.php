<?php

namespace App\Http\Controllers;

use App\Models\teams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class memBerControl extends Controller
{
    function team()
    {
        return view('members');
    }

    //member data get
    function memberdataget()
    {
        $data = teams::orderBy('id', 'desc')->get();
        return $data;
    }

    //edit get info
    function membereditinfoget(Request $editid)
    {
        $editid = $editid->input('editId');
        $info_get = json_encode(teams::where('id', '=', $editid)->get());
        return $info_get;
    }

//edit confirm
    function memberinfoupdate(Request $editData)
    {
        if ($editData->file('image')) {
            $urlImg = $editData->file('image')->store('public/publicimg');
            if ($urlImg) {
                $imgName = explode('/', $urlImg);
                $imgNameUrl = 'http://' . $_SERVER['HTTP_HOST'] . '/storage/' . $imgName[1] . '/' . $imgName[2];
                $linkExplode = explode('/', $editData->input('oldProfile'));
                $link = 'public/' . $linkExplode[4] . '/' . $linkExplode[5];
                Storage::delete($link);
            }
        } else {
            $imgNameUrl = $editData->input('image');
        }
        $update = DB::table('teams')
            ->where('id', '=', $editData->input('serial'))
            ->update([
                'name' => $editData->input('memberName'),
                'title' => $editData->input('title'),
                'descryption' => $editData->input('descryption'),
                'facebook' => $editData->input('memberEditFacebook'),
                'twitter' => $editData->input('memberEditTwitter'),
                'linkedin' => $editData->input('memberEditLinkedin'),
                'google' => $editData->input('memberEditGoogle'),
                'dribble' => $editData->input('memberEditDribble'),
                'image' => $imgNameUrl
            ]);
        if ($update == true) {
            return 1;
        } else {
            return 0;
        }
    }

    // add member
    function memberadd(Request $memberData)
    {
        $urlImg = $memberData->file('memberProfileImage')->store('public/publicimg');
        $imgName = explode('/', $urlImg);
        $imgNameUrl = 'http://' . $_SERVER['HTTP_HOST'] . '/storage/' . $imgName[1] . '/' . $imgName[2];

        $upload = teams::insert([
            'name' => $memberData->input('memberName'),
            'title' => $memberData->input('memberTitle'),
            'descryption' => $memberData->input('memberDes'),
            'facebook' => $memberData->input('memberFacebook'),
            'twitter' => $memberData->input('memberTwitter'),
            'linkedin' => $memberData->input('memberLinkedin'),
            'google' => $memberData->input('memberGoogle'),
            'dribble' => $memberData->input('memberDribble'),
            'image' => $imgNameUrl
        ]);
        if ($upload == true) {
            return 1;
        } else {
            return 0;
        }
    }

    // member delete
    function memberinfodelete(Request $memberDeleteInfo)
    {
        $memberDeleteInfo->input('profileLink');
        $delete = teams::where('id', '=', $memberDeleteInfo->input('deleteId'))->delete();
        if ($delete == true) {
            $linkExplode = explode('/', $memberDeleteInfo->input('profileLink'));
            $link = 'public/' . $linkExplode[4] . '/' . $linkExplode[5];
            Storage::delete($link);
            return 1;
        } else {
            return 0;
        }
    }
}
