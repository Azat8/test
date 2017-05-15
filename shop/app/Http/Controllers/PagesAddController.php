<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Page;
class PagesAddController extends Controller
{
    public function execute(Request $request){

        if ($request->isMethod('post')){
            $input = $request->except('_token');
            $validator = Validator::make($input,[

                'name' => 'required|max:100',
                'alias' => 'required|unique:pages|max:100',
                'text' => 'required',

            ]);
            if ($validator->fails()){
                return redirect()->route('pagesAdd')->withErrors($validator)->withInput();
            }
            if ($request->hasFile('images')){
                $file = $request->file('images');

                $input['images'] = $file->getClientOriginalName();
                $file->move(public_path().'/assets/img',$input['images']);
            }
            $page = new Page();
            $page->fill($input);
            if ($page->save()){
                return redirect('admin')->with('status','Страница добавлена');
            }

        }

        $name = [
            'title' => 'Новая страница'
        ];
        return view('admin.pages.content_pages_add',$name);
    }
}
