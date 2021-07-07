<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Laptop;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function index()
    {
    	$data = DB::table('laptops')->paginate(20);
        return $data;
    }    
}
