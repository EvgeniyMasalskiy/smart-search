<?php

namespace App\Http\Controllers;

use App\Mail\Subscribe;
use App\Models\Subscriber;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'text' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('/spam/')->with('errors', 'Thank you for subscribing to our email, please check your inbox');
        }
        $email = $request->all()['email'];
        $text = $request->all()['text'];
        $userId = $request->all()['userId'];
        $subscriber = Subscriber::create([
            'email' => $email,
            'text' => $text,
            'userId' =>$userId
        ]);
        if ($subscriber) {
            //Mail::to($email)->send(new Subscribe($email, $text, 0));
            return redirect('/spam/')->with('success', 'Thank you for subscribing to our email, please check your inbox');
        }
    }


    public static function distribution()
    {
        $subscribers = new Subscriber;
        foreach ($subscribers->all() as $subscriber) {
            $js_obj =urlencode($subscriber->text);
            
            $json = file_get_contents("https://customsearch.googleapis.com/customsearch/v1?key=AIzaSyC0dppanV32aQ5xePrb4eoiRDHibsbsd3M&cx=358c519377e0f4e6a&m%5B1%5D&sort=date&q=".$js_obj);
            $data = json_decode($json, true);
            
            Mail::to($subscriber->email)->send(new Subscribe($subscriber->email, $subscriber->text,$data));
        }
    }
    public static function getSubscriber($request)
    {
        $groups = new Subscriber;
        return $groups->where('userId', '=', $request)->get();
    }
    
    public function deleteSubscriber(Request $request)
    {
        $groups = new Subscriber;
        $id = $request->all()['id'];
        $group = $groups->where('id', '=',$id)->get()->first();
        
        if ($group != null) {
            $group->delete();
            return back()->with('success', 'Рассылка была удалена');
        }
        return back()->withErrors('error', 'Рассылка не была удалена');
    }
}
?>
