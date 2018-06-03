<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{
    public function getAllHotels()
    {
        $query = \DB::table('hotel')
            ->select('hotel_id', 'name', 'type', 'address', 'phone')
            ->get();

        $res = new \stdClass;
        $res->data = $query;
        return json_encode($res);
    }

    public function getHotel()
    {
        $id = request()->input('hotel_id');
        $query = \DB::table('hotel')
            ->where('hotel_id', $id)
            ->select('name', 'town', 'address', 'phone', 'type', 'price', 'star' )
            ->get();

        return json_encode($query[0]);
    }

    public function getEvaluation(){
		$resultTmp = \DB::table('evaluation')
			->join('users', 'users.id', '=', 'evaluation.user_id')
			->join('hotel', 'evaluation.hotel_id', '=', 'hotel.hotel_id')
			->select('users.name as user_name', 'hotel.name', 'evaluation.evaluation', 'evaluation.text', 'evaluation.created_at')
			->orderBy('evaluation.id', 'desc')
			->take(10)
			->get();

		return json_encode($resultTmp);
	
    }
    
    public function postEvaluation(Request $request){
        try {

            
            $name = (Auth::user() !== null ) ?Auth::user()->id:null;
            $hotel_id = request()->input('hotel_id');
            $rating = request()->input('rating');
            $evaluation = request()->input('evaluation');
            
            \DB::table('evaluation')->insert(
                array(
                    'user_id' => $name, 
                    'hotel_id' => $hotel_id, 
                    'evaluation' => $rating, 
                    'text' => $evaluation, 
                    'created_at' => date("Y-m-d H:i:s")
                    )
                );
                return "OK";
                return redirect('comment');
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
    
    public function getHotels(){
		$result = \DB::table('hotel')
			->select('hotel_id', 'address', 'name')
			->get();
		
		return json_encode($result);
    }
    
    public function getUser(){
		return var_dump(Auth::user());
    }
}
