<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use App\Models\Language;
use App\Models\MainCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
//        $vendors=  Vendor::selection()->get();
        return view('admin.users.index',compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $languages = Language::active()->get();
        return view('admin.users.create',compact('languages'));
    }
    public function store(UsersRequest $request)
    {
        try{
            if (!$request->has('active')){
                $request->request->add(['active' => 0]);
            }
            else{
                $request->request->add(['active' => 1]);
            }
            $filePath="";
            if($request->has('img')){
                $filePath= uploadImage('vendors',$request->img);
            }

//            return $request->all();
            $user=User::create([
                'name' => $request->name,
                'language_id' => $request->language_id,
                'email' =>$request->email,
                'active' => $request->active,
                'password' =>$request->password,
                'img' =>$filePath
            ]);
//            Notification::send($vendor, new VendorCreated($vendor));
            return redirect()->route('admin.user')->with(['success' =>'تم الحفظ بنجاح']);
        }catch(Exception $ex){
            dd($ex);
            return redirect()->route('admin.user')->with(['error' =>'  حدث خطأ ما برجاء المحاولة لاحقا']);
        }
    }


    public function edit($id)
    {
        try{
            $languages=Language::active()->get();
            $user=User::find($id);
            if(!$user)
                return redirect()->route('admin.user')->with(['error' =>'  لايوجد هذا المستخدم']);

            return view('admin.users.edit',compact('user','languages'));
        }catch(Exception $ex){
            return redirect()->route('admin.user')->with(['error' =>'  حدث خطأ ما برجاء المحاولة لاحقا']);
        }

    }
    public function update(UsersRequest $request,$id)
    {
        try {
//           return $request->all();
            $user=User::find($id);
            if (!$user)
                return redirect()->route('admin.user')->with(['error' => '  هذا المستخدم غير موجود']);
            //  update active
            if (!$request->has('active')){
                $request->request->add(['active' => 0]);}
            else{
                $request->request->add(['active' => 1]);
            }
            DB::beginTransaction();
            // ***** update img *****
            $filePath='';
            if($request->has('img')){
//                return 'ss';
                $filePath= uploadImage('vendors',$request->img);

                 User::where('id', $id)->update([
                    'img'=>$filePath,
                ]);
            }
            $data=$request->except('_token','id','img');
            User::where('id', $id)->update($data);

//            return $user;
//             $user->update([]);
            DB::commit();
            return redirect()->route('admin.user')->with(['success' => 'تم التعديل بنجاح']);
        }catch(Exception $ex){
            DB::rollback();
            return redirect()->route('admin.user')->with(['error' => '   حدث خطأ ما برجاء المحاولة لاحقا']);

        }
    }

    public function destroy($id)
    {
        try{
            $user=User::find($id);
            if(!$user)
                return redirect()->route('admin.user')->with(['error' => '  هذا المستخدم غير موجود']);


            $image=Str::after($user -> img,'assets/');
            $image=base_path('assets/'.$image);
//            unlink($image) ;
            $user -> delete();
            return redirect()->route('admin.user')->with(['success' => 'تم الحذف بنجاح']);
        }catch(Exception $ex){
//            return $ex ;
            return redirect()->route('admin.user')->with(['error' => '   حدث خطأ ما برجاء المحاولة لاحقا']);
        }

    }
    public function changeStatus($id)
    {
        try{
            $user=User::find($id);
            if(!$user)
                return redirect()->route('admin.user')->with(['error' => '  هذا المستخدم غير موجود']);

            $status=   $user->active == 0 ? 1 : 0;
            $user->update(['active' => $status]);
            return redirect()->route('admin.user')->with(['success' => 'تم تغيير الحالة بنجاح']);

        }catch (Exception $ex){
            return redirect()->route('admin.user')->with(['error' => '   حدث خطأ ما برجاء المحاولة لاحقا']);
        }
    }
}
