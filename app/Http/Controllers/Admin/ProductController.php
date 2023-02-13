<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequest;
use App\Models\MainCategory;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
//        ->paginate(PAGINATION_COUNT)
        $products=  Product::selection()->get();
        return view('admin.products.index',compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }
    public function store(ProductsRequest $request)
    {
//        dd($request->lang_id);
        try{
            if (!$request->has('active')){
                $request->request->add(['active' => 0]);
            }
            else{
                $request->request->add(['active' => 1]);
            }
            $filePath="";
            if($request->has('img')){
                $filePath= uploadImage('products',$request->img);
            }
//            return $filePath;
             $products=collect($request->category);
            $filter= $products->filter(function ($value,$key){
                return $value['slogan'] == get_default_lang();
            });
            $default_category =  array_values($filter->all())[0];
            $default_category_id=Product::insertGetId([
                'translation_lang' => $default_category['slogan'],
                'translation_of' => 0,
                'language_id' => $request->lang_id,

                'name' => $default_category['name'],
                'description' => $default_category['description'],
                'price' => $default_category['price'],
                'img' => $filePath,
            ]);
            $categories= $products->filter(function ($value,$key){
                return $value['slogan'] != get_default_lang();
            });

            if(isset($categories) && $categories->count())
            {
                $categories_arr=[];
                foreach($categories as $category){
                    $categories_arr[]=[
                        'translation_lang' => $category['slogan'],
                        'translation_of' => $default_category_id,
                        'name' => $category['name'],
                        'description' => $default_category['description'],
                        'price' => $default_category['price'],
                        'img' => $filePath,
                        'active' => $default_category['active'],
                        'language_id' => $request->lang_id,
                    ];
                }
                Product::insert($categories_arr);
            }
            DB::commit();

            return redirect()->route('admin.product')->with(['success' =>'تم الحفظ بنجاح']);
        }catch(Exception $ex){
            dd($ex);
            return redirect()->route('admin.product')->with(['error' =>'  حدث خطأ ما برجاء المحاولة لاحقا']);

        }
    }


    public function edit($id)
    {
//      return  $product=Product::find($id);
        try{
//            $categories=subCategory::active()->get();
              $product=Product::find($id);
            if(!$product)
                return redirect()->route('admin.product')->with(['error' =>'  لايوجد هذا المنتج']);

            return view('admin.products.edit',compact('product'));
        }catch(Exception $ex){
            return redirect()->route('admin.products')->with(['error' =>'  حدث خطأ ما برجاء المحاولة لاحقا']);

        }

    }
    public function update(Request $request,$id)
    {

        try {
//           return $request->all();
            $product = Product::find($id);

            if (!$product)
                return redirect()->route('admin.product')->with(['error' => '  هذا المنتج غير موجود']);


            //  update active
            if (!$request->has('active')){
                $request->request->add(['active' => 0]);}
            else{
                $request->request->add(['active' => 1]);
            }
            DB::beginTransaction();
            // ***** update logo *****
            $filePath='';
            if($request->has('img')){
                $filePath= uploadImage('products',$request->img);
                Product::where('id', $id)->update([
                    'img'=>$filePath,
                ]);
            }
//            $product->update();
            $data=$request->except('_token','id','img');

            Product::where('id', $id)->update($data);

            DB::commit();
            return redirect()->route('admin.product')->with(['success' => 'تم التعديل بنجاح']);
        }catch(Exception $ex){
            DB::rollback();
            return redirect()->route('admin.product')->with(['error' => '   حدث خطأ ما برجاء المحاولة لاحقا']);

        }
    }

    public function destroy($id)
    {
        try{
            $product = Product::find($id);
            if(!$product)
                return redirect()->route('admin.product')->with(['error' => ' هذا المنتج غير موجود']);
            $image=Str::after($product -> img,'assets/');
            $image=base_path('assets/'.$image);
//                 return $image;
//            unlink($image);
            $product -> delete();
            return redirect()->route('admin.product')->with(['success' => 'تم الحذف بنجاح']);

        }catch(Exception $ex){
//            return $ex ;
            return redirect()->route('admin.product')->with(['error' => '   حدث خطأ ما برجاء المحاولة لاحقا']);
        }

    }
    public function changeStatus($id)
    {
        try{
            $product = Product::find($id);
            if(!$product)
                return redirect()->route('admin.product')->with(['error' => '  هذا المنتج غير موجود']);
            $status=   $product-> active == 0 ? 1 : 0;
            $product->update(['active' => $status]);
            return redirect()->route('admin.product')->with(['success' => 'تم تغيير الحالة بنجاح']);

        }catch (Exception $ex){
            return redirect()->route('admin.product')->with(['error' => '   حدث خطأ ما برجاء المحاولة لاحقا']);
        }
    }
}
