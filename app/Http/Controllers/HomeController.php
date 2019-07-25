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
        ]);
    }


    protected function create(array $data)
    {
        return sorular::create([
            'title' => $data['title'],
            'subject' => $data['subject'],
            'text' => $data['text'],
        ]);
    }
    public function store (Request $request)
   {
        sorular::create(Request::all());
       //return \App\sorular::all();

        $sorular=\App\sorular::all();
        return view ('store',compact('sorular'));
    }
    public function sil($id=0)
    {
        if($id!=0){
            $sorusil=sorular::where('id','=',$id)->delete();
                if($sorusil)
                    {
                    return 'Tebrikler Silme İşleminiz Başarıyla Gerçekleşti';

                    }
                else
                    {
                    return null;
                    }
        }
        else{
            return null;
        }
    }

}
