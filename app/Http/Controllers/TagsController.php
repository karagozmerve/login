<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\tags;
use Request;
use App\Http\Requests;
class TagsController extends Controller
{
    //
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'label' => 'required|string|max:255',
        ]);
    }

    protected function create(array $data)
    {
        return tags::create([
            'label' => $data['label'],
        ]);
    }

    public function tags(Request $request)
    {
        $labels = Request::input('label');

        foreach ($labels as $label) {
            $varmi=tags::where('label', '=', Input::get('label'))->first();
            if ($varmi == null) {
                $tags = new tags();
                $tags->label = $label;
                $tags->save();
            }
            else {
               return view('tags');
            }



        }
    }
}
