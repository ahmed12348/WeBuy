<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Requests\LanguageRequest;
class LanguagesController extends Controller
{
    public function index(){
        $languages=Language::select()->paginate(PAGINATION_COUNT);
        return view('admin.languages.index',compact('languages'));
    }
    public function create(){

        return view('admin.languages.create');
    }
    public function store(LanguageRequest $request)
    {
        // dd($request->all());
     try{
     Language::create($request->except(['_token']));

      return redirect()->route('admin.languages')->with(['success'=>' تم اضافة اللغة بنجاح']);

       }
     catch(\Exception $ex){
       return redirect()->route('admin.languages')->with(['error'=>'   هناك خطا ما يرجي اعادة المحاولة']);
       }

    }

    public function edit($id)
    {
      $language=Language::find($id);
      if(!$language){
        return redirect()->route('admin.languages')->with(['error' =>'هذة اللغة غير موجودة']);
      }
        return view('admin.languages.edit',compact('language'));
    }

    public function update(LanguageRequest $request,$id)
    {



      try{
        $language=Language::find($id);

        if(!$language){
          return redirect()->route('admin.languages.edit',$id)->with(['error' =>'هذة اللغة غير موجودة']);
        }
          if(!$request->has('active'))
          $request->request->add(['active'=>0]);
        $language->update($request->except(['_token']));
         return redirect()->route('admin.languages')->with(['success'=>' تم تعديل اللغة بنجاح']);

          }
        catch(\Exception $ex){


            return redirect()->route('admin.languages')->with(['error'=>'   هناك خطا ما يرجي اعادة المحاولة']);

    }

     }

     public function destroy($id){
     try{
        $language=Language::find($id);

        if(!$language){
          return redirect()->route('admin.languages')->with(['error' =>'هذة اللغة غير موجودة']);
        }
        $language->delete();

         return redirect()->route('admin.languages')->with(['success'=>' تم حذف اللغة بنجاح']);

          }
        catch(\Exception $ex){


            return redirect()->route('admin.languages')->with(['error'=>'   هناك خطا ما يرجي اعادة المحاولة']);

    }
  }
}
