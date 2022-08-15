<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\News;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\MonthPrice;
use App\Models\PhoneData;

class PageController extends Controller
{
    public function index()
    {   $user = Auth::user();
        $m_id=date('Ym');
        if(substr($m_id, 4,1)==0){
            $m_id=substr($m_id, 0,4).substr($m_id, 5,1);
        }
        // dd($user->id);

        $news = News::latest()->take(5)->get();
        $MonthPrice = MonthPrice::where('m_id',$m_id)->where('user_id',$user->id)->first();
        // $MonthPrice2 = MonthPrice::where('m_id',$m_id)->get();
        $PhoneData = PhoneData::where('m_id',$m_id)->where('user_id',$user->id)->first();
        // dd($MonthPrice);
        // dd($m_id,$monthPrice);
        // $news = DB::table('news')->get();  
        // $news = News::findOrFail(1);
        // $news = News::select('id', 'title', 'content', 'date');
        // $news = News::select('id', 'name', 'email', 'created_at');
        //   dd($news);
        // dd($news->toArray());
        $responce=['user'=>$user,'news'=>$news,'monthPrice'=>$MonthPrice,'phoneData'=>$PhoneData];

        return $responce;
    }

    public function getNews(Request $request)
    {   
        $news = News::latest()->take(20)->get();
        // dd($news);
        return $news;
    }

    public function getUser(Request $request)
    {   
        $user = Auth::user();
        // $news = User::where('user_id',$user->id)->first();
        return $user;
    }

    public function getPrice(Request $request)
    {   
        $user = Auth::user();
        if(!$monthPrice = MonthPrice::where('m_id',$request->year.$request->month)->where('user_id',$user->id)->first()){
            $message = ['message' =>"対象のデータがありません"];
            return $message;
        };
        // dd($request->year,$request->year.$request->month,$monthPrice);
        // $news = News::latest()->take(5)->get();
        // $news = DB::table('news')->get();  
        // $news = News::findOrFail(1);
        // $news = News::select('id', 'title', 'content', 'date');
        // $news = News::select('id', 'name', 'email', 'created_at');
        //   dd($news);
        // dd($news->toArray());
        return $monthPrice;
    }
    public function getMonthPhoneData(Request $request)
    {   
        // dd($request);
        $user = Auth::user();
        if(!$PhoneData = PhoneData::where('m_id',$request->year.$request->month)->where('user_id',$user->id)->first()){
            $message = ['message' =>"対象のデータがありません"];
            return $message;
        };
        // dd($request->year,$request->year.$request->month,$monthPrice);
        // $news = News::latest()->take(5)->get();
        // $news = DB::table('news')->get();  
        // $news = News::findOrFail(1);
        // $news = News::select('id', 'title', 'content', 'date');
        // $news = News::select('id', 'name', 'email', 'created_at');
        //   dd($news);
        // dd($news->toArray());
        return $PhoneData;
    }

    public function redirectLoginHome(){
        dd("ss");
    }
}