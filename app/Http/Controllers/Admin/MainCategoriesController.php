<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainCategoryRequest;
use App\Models\MainCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use DB;
use Illuminate\Support\Str;
class MainCategoriesController extends Controller
{
    public function index()
    {

          $default_lang=get_default_lang();
        $categories=  MainCategory::where('translation_lang',$default_lang)->selection()->paginate(PAGINATION_COUNT);
        return view('admin.maincategories.index',compact('categories'));
    }

    public function create(){

        return view('admin.mainCategories.create');
    }
    public function store(MainCategoryRequest $request)
    {
  try{
          $main_categories=collect($request->category);
            $filter= $main_categories->filter(function ($value,$key){
                return $value['abbr'] == get_default_lang();
           });

         $default_category =  array_values($filter->all())[0];
         $filePath="";
         if($request->has('photo')){
            $filePath= uploadImage('maincategories',$request->photo);
         }


        $default_category_id=MainCategory::insertGetId([
             'translation_lang' => $default_category['abbr'],
             'translation_of' => 0,
             'name' => $default_category['name'],
             'slug' => $default_category['name'],
             'photo' => $filePath,
         ]);
         $categories= $main_categories->filter(function ($value,$key){
            return $value['abbr'] != get_default_lang();
       });

       if(isset($categories) && $categories->count())
       {
        $categories_arr=[];
        foreach($categories as $category){
            $categories_arr[]=[
                'translation_lang' => $category['abbr'],
                'translation_of' => $default_category_id,
                'name' => $category['name'],
                'slug' => $category['name'],
                'photo' => $filePath,
            ];
        }
             MainCategory::insert($categories_arr);
          }
          DB::commit();

             return redirect()->route('admin.mainCategories')->with(['success' =>'تم الحفظ بنجاح']);
        }catch(Exception $ex){
            DB::rollback();
            return redirect()->route('admin.mainCategories')->with(['error' =>'  حدث خطأ ما برجاء المحاولة لاحقا']);

        }
    }


    public function edit($id){

              //get specific and it translations
         $main_cat = MainCategory::with('categories')->selection()->find($id);

        if(!$main_cat)
        return redirect()->route('admin.mainCategories')->with(['error' =>'  هذا القسم غير موجود']);

        return view('admin.mainCategories.edit',compact('main_cat'));
    }
    public function update(MainCategoryRequest $request,$id)
    {
//       return $request->all();
        try {
//           return $request->all();
            $main_cat = MainCategory::find($id);

            if (!$main_cat)
                return redirect()->route('admin.mainCategories')->with(['error' => '  هذا القسم غير موجود']);

            //  update

            $category = array_values($request->category)[0];

            if (!$request->has('category.0.active')){
                $request->request->add(['active' => 0]);}
           else{
               $request->request->add(['active' => 1]);
           }

            MainCategory::where('id', $id)->update([
                'name' => $category['name'],
                'active' => $request->active,
            ]);


            // ***** update photo *****
            $filePath='';
            if($request->has('photo')){
                $filePath= uploadImage('maincategories',$request->photo);

                MainCategory::where('id', $id)->update([
                    'photo'=>$filePath,
                ]);
            }



            return redirect()->route('admin.mainCategories')->with(['success' => 'تم التعديل بنجاح']);
        }catch(Exception $ex){
            return redirect()->route('admin.mainCategories')->with(['error' => '   حدث خطأ ما برجاء المحاولة لاحقا']);

        }
    }
        public function destroy($id)
        {

            try{

                $maincategory = MainCategory::find($id);
                if(!$maincategory)
                    return redirect()->route('admin.mainCategories')->with(['error' => '  هذا القسم غير موجود']);

                     $vendors= $maincategory -> vendors();
                if(isset($vendors)&& $vendors -> count() > 0){
                    return redirect()->route('admin.mainCategories')->with(['error' => '  لا يمكن حذف هذا القسم ']);
               }
                 $image=Str::after($maincategory -> photo,'assets/');
                 $image=base_path('assets/'.$image);

                 unlink($image) ;
                $maincategory ->categories()->delete();
                 $maincategory -> delete();
                return redirect()->route('admin.mainCategories')->with(['success' => 'تم الحذف بنجاح']);

            }catch(Exception $ex){
                return $ex ;
                return redirect()->route('admin.mainCategories')->with(['error' => '   حدث خطأ ما برجاء المحاولة لاحقا']);
            }

        }

    public function changeStatus($id)
    {
         try{
             $maincategory = MainCategory::find($id);
             if(!$maincategory)
                 return redirect()->route('admin.mainCategories')->with(['error' => '  هذا القسم غير موجود']);

             $status=   $maincategory-> active == 0 ? 1 : 0;

             $maincategory->update(['active' => $status]);
             return redirect()->route('admin.mainCategories')->with(['success' => 'تم تغيير الحالة بنجاح']);



         }catch (Exception $ex){
             return redirect()->route('admin.mainCategories')->with(['error' => '   حدث خطأ ما برجاء المحاولة لاحقا']);

         }

    }
}
