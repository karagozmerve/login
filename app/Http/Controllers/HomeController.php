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

       // return view('home');

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
            'sorular_id',
            'tags_id',
            'title' => 'required|string|max:255',
            'subject' => 'required|string',
            'text' => 'required|string|min:6',
            'label'=>'required|string',
        ));

        $sorular_id = Request::input('sorular_id');
        $tags_id=Request::input('tags_id');
        $title = Request::input('title');
        $subject = Request::input('subject');
        $text = Request::input('text');
        $label=Request::input('label');
        $labels=Request::input('label');
        $sorular = new sorular();

        /*$sorular_tags=new sorular_tags();
        $sorular_tags->sorular_id=$sorular_id;
        $sorular_tags->tags_id=$tags_id;
        $sorular_tags->save(); */

        $sorular->title = $title;
        $sorular->subject = $subject;
        $sorular->text = $text;
        $label=implode(",",$label);
        $sorular->label=$label;
        $sorular->save();

        foreach ($labels as $label) {
            $varmi = tags::where('label', '=', Input::get('label'))->first();
            if ($varmi == null) {
                $tags = new tags();
                $tags->label = $label;
                $tags->save();
            }
        }

        $sorular = \App\sorular::all();
        return view('store', compact('sorular'));
    }


    public function sil($id = 0)
    {
        if ($id != 0) {
            $sorusil = sorular::where('id', '=', $id)->delete();
            if ($sorusil) {
                return redirect()->route('index')->with('success', 'Tebrikler Silindi..:)');

            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public function duzenle($id = 0)
    {
        $taglist =  DB::table('tags')->get();
        $soruduzenle = sorular::whereRaw('id!=?', array(0, 90))->get();
        $soru = sorular::whereRaw('id=?', array($id))->first();
        return view('home', array('sorular' => $soruduzenle, 'soruguncelle' => $soru),compact('taglist'));
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
        $soru = sorular::find($id);
        //guncelleme işlemlerim
        $soru->title = $title;
        $soru->subject = $subject;
        $soru->text = $text;
        $label=implode(",",$label);
        $soru->label=$label;
        $soru->save();
        return redirect()->route('index');
    }

    public function sorularim(Request $request)
    {
        return view('sorularim');
    }

    public function tags(Request $request){

        $taglist =  DB::table('tags')->get();
        return view('tags',compact('taglist'));
        //return view('tags',compact('taglist'));

    }
}




