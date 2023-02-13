<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
class SearchController extends Controller
{

    public function index()
    {
        $search = "Hardik Sa";
        $users = User::select("id", "first_name", "last_name")
            ->orWhere(DB::raw("concat(first_name, ' ', last_name)"), 'LIKE', "%".$search."%")
            ->get();

        dd($users);
    }



    public function autocomplete(Request $request)
    {
        $data = Product::select("name")
            ->where("name","LIKE","%{$request->query}%")
            ->get();

        return response()->json($data);
    }
}
