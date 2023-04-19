<?php

namespace App\Http\Controllers;

use App\Models\Group;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{
    public function addGroup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Name' => 'required|max:32|unique:groups',
            'userId' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->with('error', 'Введены невреные данные.');
        }
        $Name = $request->all()['Name'];
        $userId = $request->all()['userId'];
        $group = Group::create([
            'Name' => $Name,
            'userId' => $userId
        ]);
        if ($group) {
            return back()->with('success', 'Группа была создана');
        }
    }

    public static function getGroup($request)
    {
        $groups = new Group;
        return $groups->where('userId', '=', $request)->get();
    }

    public function deleteGroup(Request $request)
    {
        $groups = new Group;
        $id = $request->all()['id'];
        $group = $groups->where('id', '=',$id)->get()->first();
        
        if ($group != null) {
            $group->delete();
            return back()->with('success', 'Группа была удалена');
        }
        return back()->with('success', 'Группа не была удалена');
    }
}
