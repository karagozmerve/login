<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use App\Http\Requests;
use App\sorular;
use Illuminate\Support\Facades\Validator;

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
        return view('home');

    }
    //public function create()
    //{
    //   return view('views.home');//aslında oluşturmak istediğim bize sorun ama home sayfasıyla başladığımdan kafam karışmasın istedim
    //}
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
        sorular::create(Request::all());
        //return \App\sorular::all();


        $sorular = \App\sorular::all();
        return view('store', compact('sorular'));
    }


    public function sil($id = 0)
    {
        if ($id != 0) {
            $sorusil = sorular::where('id', '=', $id)->delete();
            if ($sorusil) {
                return 'Tebrikler Merve Silme İşlemin Başarıyla Gerçekleşti :))';

            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public function duzenle($id = 0)
    {
        $soruduzenle = sorular::whereRaw('id!=?', array(0, 10))->get();
        $soru = sorular::whereRaw('id=?', array($id))->first();
        return view('home', array('sorular' => $soruduzenle, 'soruguncelle' => $soru));
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
        $soru->label=$label;
        $soru->save();
        return redirect()->route('index');

    }

    public function sorularim(Request $request)
    {
        return view('sorularim');
    }
    public function tags(Request $request){
        return view('tags');
    }
}




