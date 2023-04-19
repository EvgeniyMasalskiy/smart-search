<?php

namespace App\Http\Controllers;


use App\Models\Resource;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ResourceController extends Controller
{
    public function addResource(Request $request){
        $validator = Validator::make($request->all(),[
            'data' => 'required',
            'userId' => 'required'
        ]);
        if($validator->fails()){
            $request->session()->put('errors','Thank you for subscribing to our email, please check your inbox');
            
        }
        $title = $request->all()['title'];
        $textUrl = $request->all()['textUrl'];
        $url = $request->all()['url'];
        $text = $request->all()['text'];

        $userId = $request->all()['userId'];
        $groupId = $request->all()['groupId'];
        
        $resource = Resource::create([
            'title' => $title,
            'textUrl' => $textUrl,
            'url' => $url,
            'text' => $text,
            'userId' => $userId,
            'groupId' => $groupId
        ]);
        if($resource){
             
            return back()->with('success', 'Ресурс был добавлен в библиотеку');
        }
    }
    public static function getResource($request)
    {
        $groups = new Resource;
        return $groups->where('userId', '=', $request)->get();
    }

    public function deleteResource(Request $request)
    {
        $groups = new Resource;
        $id = $request->all()['id'];
        $group = $groups->where('id', '=',$id)->get()->first();
        

        
        if ($group != null) {
            $group->delete();
            return back()->with('success', 'Ресурс был удалена');
        }
        return back()->withErrors('error', 'Ресурс не был удалена');
    }
}
