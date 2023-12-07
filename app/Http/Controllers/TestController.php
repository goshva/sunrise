<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function get_xml(Request $request){
        $xml = simplexml_load_file($request->xml);
        foreach($xml as $base){
            dump($base->first_name);
        }
    }
}
