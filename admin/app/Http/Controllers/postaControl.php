<?php

namespace App\Http\Controllers;

use App\Models\template;
use App\Models\testomonials;
use Illuminate\Http\Request;

class postaControl extends Controller
{
    // work post create
    function workspost(Request $wrkdata)
    {
        $urlimg = $wrkdata->file('image')->store('public/publicimg');
        $imgname = explode('/', $urlimg);

        $imgnameurl =  'http://'.$_SERVER['HTTP_HOST'].'/storage/'.$imgname[1].'/'.$imgname[2];
        $upload = template::insert([
            'project_name' => $wrkdata->input('projecTname'),
            'category' =>  $wrkdata->input('projecTcatagory'),
            'designer' => $wrkdata->input('projecTdesigner'),
            'post_id' => $wrkdata->input('postid'),
            'img_link' => $imgnameurl
        ]);
        if ($upload == true) {
            return 1;
        } else {
            return 0;
        }
    }

    // testimonial post create
    function testimonialspost(Request $author_data){
        $urlimg = $author_data->file('profile')->store('public/publicimg');
        $imgname = explode('/', $urlimg);
        $imgnameurl =  'http://'.$_SERVER['HTTP_HOST'].'/storage/'.$imgname[1].'/'.$imgname[2];
        $uploadTstPost = testomonials::insert([
            'saying' => $author_data->input('saying'),
            'author' =>  $author_data->input('author'),
            'image' => $imgnameurl
        ]);
        if ($uploadTstPost == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
