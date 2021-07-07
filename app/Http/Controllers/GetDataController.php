<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use Illuminate\Support\Facades\DB;

class GetDataController extends Controller
{
    //
    public function index()
    {
        DB::table('laptops')->truncate();
        $homepage = file_get_contents('https://search.gigatron.rs/v1/catalog/get/prenosni-racunari/laptop-racunari');
        $get_result_arr = json_decode($homepage, true);
        if (isset($get_result_arr['totalPages'])){
            $totalPages = $get_result_arr['totalPages'];
            //$totalPages = 1;
        }else{
            $totalPages = 1;
        }
        for ($i=1; $i <= $totalPages; $i++) {
            $homepage = file_get_contents('https://search.gigatron.rs/v1/catalog/get/prenosni-racunari/laptop-racunari?strana='.$i);
            $get_result_arr = json_decode($homepage, true);
            foreach ($get_result_arr['hits']['hits'] as $data){
                $site_id = $data['_source']['search_result_data']['id'] ? $data['_source']['search_result_data']['id'] : '';
                $brand = $data['_source']['search_result_data']['brand'] ? $data['_source']['search_result_data']['brand'] : '';
                $name = $data['_source']['search_result_data']['name'] ? $data['_source']['search_result_data']['name'] : '';
                $image = $data['_source']['search_result_data']['image'] ? $data['_source']['search_result_data']['image'] : '';
                $description = $data['_source']['search_data']['full_text'] ? $data['_source']['search_data']['full_text'] : '';
                $url = $data['_source']['search_result_data']['url'] ? $data['_source']['search_result_data']['url'] : '';
                $price = $data['_source']['search_result_data']['price'] ? $data['_source']['search_result_data']['price'] : '';
                DB::table('laptops')->insert([
                    'site_id' => $site_id,
                    'name' => $name,
                    'brand' => $brand,
                    'image' => $image,
                    'description' => $description,
                    'url' => $url,
                    'price' => $price
                ]);
            }

        }
        //$users = DB::table('laptops')->get();
        //return view('homejson');
        return redirect('/');
    }
}
