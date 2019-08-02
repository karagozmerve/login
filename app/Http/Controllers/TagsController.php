<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
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
            'name' => 'required|string|max:255',
        ]);
    }

    protected function create(array $data)
    {
        return tags::create([
            'name' => $data['name'],
        ]);
    }
    public function tags(Request $request)
    {
        tags::create(Request::all());
        //return \App\sorular::all();
        return view('tags');
    }

}


