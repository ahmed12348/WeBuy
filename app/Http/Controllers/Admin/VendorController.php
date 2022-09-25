<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VendorRequest;
use App\Models\MainCategory;
use App\Notifications\VendorCreated;
use Illuminate\Http\Request;
use App\Models\Vendor;
use Illuminate\Support\Facades\Notification;
use DB;
use Illuminate\Support\Str;

class VendorController extends Controller
{


    public function index()
    {
//        ->paginate(PAGINATION_COUNT)
         $vendors=  Vendor::selection()->get();
        return view('admin.vendors.index',compact('vendors'));
    }

    public function create()
    {
         $categories=MainCategory::where('translation_of',0)->active()->get();
        return view('admin.vendors.create',compact('categories'));
    }
    public function store(VendorRequest $request)
    {

        try{
            if (!$request->has('active')){
                $request->request->add(['active' => 0]);
            }
            else{
                $request->request->add(['active' => 1]);
            }



            $filePath="";
            if($request->has('logo')){
                $filePath= uploadImage('vendors',$request->logo);
            }

//            return $request->all();
                $vendor=Vendor::create([
                'name' => $request->name,
                'mobile' => $request->mobile,
                'category_id' => $request->category_id,
                'email' =>$request->email,
                'active' => $request->active,
                'address' =>$request->address,
                'password' =>$request->password,
                'logo' =>$filePath
            ]);
            Notification::send($vendor, new VendorCreated($vendor));


            return redirect()->route('admin.vendor')->with(['success' =>'تم الحفظ بنجاح']);
        }catch(Exception $ex){
           dd($ex);
            return redirect()->route('admin.vendor')->with(['error' =>'  حدث خطأ ما برجاء المحاولة لاحقا']);

        }
    }


    public function edit($id)
    {


      try{
          $categories=MainCategory::where('translation_of',0)->active()->get();
          $vendor=Vendor::find($id);
         if(!$vendor)
           return redirect()->route('admin.vendor')->with(['error' =>'  لايوجد هذا التاجر']);

            return view('admin.vendors.edit',compact('vendor','categories'));
      }catch(Exception $ex){
          return redirect()->route('admin.vendor')->with(['error' =>'  حدث خطأ ما برجاء المحاولة لاحقا']);

      }

    }
    public function update(VendorRequest $request,$id)
    {

        try {
//           return $request->all();
            $vendor = Vendor::find($id);

            if (!$vendor)
                return redirect()->route('admin.vendor')->with(['error' => '  هذا المتجر غير موجود']);


            //  update active
            if (!$request->has('active')){
                $request->request->add(['active' => 0]);}
            else{
                $request->request->add(['active' => 1]);
            }
            DB::beginTransaction();
            // ***** update logo *****
            $filePath='';
            if($request->has('logo')){
                $filePath= uploadImage('vendors',$request->logo);
                Vendor::where('id', $id)->update([
                    'logo'=>$filePath,
                ]);
            }
            if($request->has('password')){
                $data['password']= $request->password;
            }
            $data=$request->except('_token','id','logo','password');

            Vendor::where('id', $id)->update($data);

               DB::commit();
            return redirect()->route('admin.vendor')->with(['success' => 'تم التعديل بنجاح']);
        }catch(Exception $ex){
            DB::rollback();
            return redirect()->route('admin.vendor')->with(['error' => '   حدث خطأ ما برجاء المحاولة لاحقا']);

        }
    }

    public function destroy($id)
    {

        try{

            $vendor = Vendor::find($id);
            if(!$vendor)
                return redirect()->route('admin.vendor')->with(['error' => '  هذا المتجر غير موجود']);


            $image=Str::after($vendor -> logo,'assets/');
            $image=base_path('assets/'.$image);

            unlink($image) ;
            $vendor -> delete();
            return redirect()->route('admin.vendor')->with(['success' => 'تم الحذف بنجاح']);

        }catch(Exception $ex){
//            return $ex ;
            return redirect()->route('admin.vendor')->with(['error' => '   حدث خطأ ما برجاء المحاولة لاحقا']);
        }

    }
    public function changeStatus($id)
    {
        try{
            $vendor = Vendor::find($id);
            if(!$vendor)
                return redirect()->route('admin.vendor')->with(['error' => '  هذا المتجر غير موجود']);

            $status=   $vendor-> active == 0 ? 1 : 0;

            $vendor->update(['active' => $status]);
            return redirect()->route('admin.vendor')->with(['success' => 'تم تغيير الحالة بنجاح']);




        }catch (Exception $ex){
            return redirect()->route('admin.vendor')->with(['error' => '   حدث خطأ ما برجاء المحاولة لاحقا']);

        }

    }
}
