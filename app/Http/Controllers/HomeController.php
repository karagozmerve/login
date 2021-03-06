<?php

namespace App\Http\Controllers;
use App\sorular_tags;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Request;
use App\Http\Requests;
use App\sorular;
use Illuminate\Support\Facades\Validator;
use App\tags;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taglist =  DB::table('tags')->get();
        return view('home',compact('taglist'));

       //return view('home');

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:255',
            'subject' => 'required|string',
            'text' => 'required|string|min:6',
            'label'=>'required|string',
        ]);
    }

    protected function create(array $data)
    {
        return sorular::create([
            'title' => $data['title'],
            'subject' => $data['subject'],
            'text' => $data['text'],
            'label'=>$data['label'],

        ]);

    }

    public function store(Request $request)
    {
        $kontrol = validator::make(Request::all(), array(
            'title' => 'required|string|max:255',
            'subject' => 'required|string',
            'text' => 'required|string|min:6',
            'label'=>'required|string',

        ));


        $title = Request::input('title');
        $subject = Request::input('subject');
        $text = Request::input('text');
        $label=Request::input('label');
        $labels=Request::input('label');
        $title = Request::input('title');

        $sorular = new sorular();
        $sorular->title = $title;
        $sorular->subject = $subject;
        $sorular->text = $text;
        $label=implode(",",$label);
        $sorular->label=$label;
        $sorular->save();

        foreach ($labels as $label) {
            $varmi = tags::where('label', '=', $label)->first();
            if ($varmi == null) {
                $tags = new tags();
                $tags->label = $label;
                $tags->save();
            }
            $yokmu = tags::where('label', '=', $label)->first();

            $rel= New sorular_tags();
            $rel->sorular_id=$sorular->id;
            $rel->tags_id=$yokmu->id;
            $rel->save();
        }


        $sorular = \App\sorular::all();
        return view('store',compact('sorular'));
    }


    public function sil($id = 0)
    {
        if ($id != 0) {
            $sorusil = sorular::where('id', '=', $id)->delete();
            if ($sorusil)
            {
                return redirect()->route('index')->with('success', 'Tebrikler Silindi..:)');
            }
            else {
                return null;
            }
        }
        else {
            return null;
        }
    }

    public function duzenle($id = 0)
    {
        $tagbul=DB::table('sorular_tags')->where('sorular_id', '=', array($id))->get();
        $taglist =  DB::table('tags')->get();
        $soruduzenle = sorular::whereRaw('id!=?', array(0, 90))->get();
        $soru = sorular::whereRaw('id=?', array($id))->first();
        return view('home', array('sorular' => $soruduzenle, 'soruguncelle' => $soru ),compact('taglist','tagbul'));
    }

    public function postduzenle(Request $request)
    {
        $kontrol = validator::make(Request::all(), array(
            'title' => 'required|string|max:255',
            'subject' => 'required|string',
            'text' => 'required|string|min:6',
            'label'=>'required|string',
        ));

        $id = Request::input('id');
        $title = Request::input('title');
        $subject = Request::input('subject');
        $text = Request::input('text');
        $label=Request::input('label');
        $labels=Request::input('label');
        $soru = sorular::find($id);

        //guncelleme işlemlerim
        $soru->title = $title;
        $soru->subject = $subject;
        $soru->text = $text;
        $label=implode(",",$label);
        $soru->label=$label;
        $soru->save();
        foreach ($labels as $label) {
            $varmi = tags::where('label', '=', Input::get('label'))->first();
            if ($varmi == null) {
                $tags = new tags();
                $tags->label = $label;
                $tags->save();
            }
            $varmi = tags::where('label', '=', Input::get('label'))->first();

            $rel= New sorular_tags();
            $rel->sorular_id=$soru->id;
            $rel->tags_id=$varmi->id;
            $rel->save();
        }

        return redirect()->route('index');

    }



    public function showstore(Request $request)
    {
        $sorular = DB::table('sorular')->get();
        return view('store',compact('sorular'));
    }
}




