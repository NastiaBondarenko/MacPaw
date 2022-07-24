<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class NeoController extends Controller
{
    /**
     * Показать список всех пользователей приложения.
     *
     * @return \Illuminate\Http\Response
     */
    public function sayHello(){
        $helloMacPaw =  array("hello"=>"MacPaw Internship 2022!");
        return  json_encode($helloMacPaw);
    }

    public function hazardous()
    {
        $asteroids = DB::table('asteroids')->where('ishazardous', '1')->get();
        return json_encode($asteroids);
    }

    public function fastest(Request $request)
    {
    
        $hazardous = $request->query('hazardous');
        $ishazardous;
        if ($hazardous == 'true' ||$hazardous == 'false' || $hazardous == ''){
            $ishazardous = filter_var($hazardous, FILTER_VALIDATE_BOOLEAN); ;
            $asteroids = DB::table('asteroids')->orderBy('speed', 'desc')->where('ishazardous', $ishazardous)->get();
            return json_encode($asteroids);
        }
        else return json_encode(array(
            'code'      =>  400,
            'message'   =>  'The hazardous parameter must be true or false'
        ), 400);
           
    }


}
