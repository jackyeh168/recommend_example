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
            ->get();

        $res = $query[0];
        $res->attraction = $this->getAttractions($res->lng, $res->lat);
        $res->activity = $this->getActivities($res->lng, $res->lat);

        return json_encode($res);
    }

    public function getEvaluation()
    {
        $resultTmp = \DB::table('evaluation')
            ->join('users', 'users.id', '=', 'evaluation.user_id')
            ->join('hotel', 'evaluation.hotel_id', '=', 'hotel.hotel_id')
            ->select('users.name as user_name', 'hotel.name', 'evaluation.evaluation', 'evaluation.text', 'evaluation.created_at')
            ->orderBy('evaluation.id', 'desc')
            ->take(10)
            ->get();

        return json_encode($resultTmp);
    }
    
    public function postEvaluation(Request $request)
    {
        try {
            $name = (Auth::user() !== null) ?Auth::user()->id:null;
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
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function getHotels()
    {
        $result = \DB::table('hotel')
            ->select('hotel_id', 'address', 'name')
            ->get();
        
        return json_encode($result);
    }
    
    public function getUser()
    {
        return var_dump(Auth::user());
    }

    private function getAttractions($lng, $lat)
    {
        $attraction = \DB::table('attraction')->get()->toArray();

        for ($i=0; $i < count($attraction); $i++) {
            $attraction[$i]->dis = $this->getdistance($lng, $lat, $attraction[$i]->lng, $attraction[$i]->lat);
        }

        usort($attraction, function ($a, $b) {
            if ($a->dis < $b->dis) {
                return -1;
            } elseif ($a->dis > $b->dis) {
                return 1;
            } else {
                return 0;
            }
        });

        return array_slice($attraction, 0, 3);
    }

    private function getActivities($lng, $lat)
    {
        $now = date('Y-m-d H:i:s');
        $activity = \DB::table('activity')
            ->where('from_date', '<=', $now )
            ->where('to_date', '>=', $now )
            ->get()
            ->toArray();

        for ($i=0; $i < count($activity); $i++) {
            $activity[$i]->dis = $this->getdistance($lng, $lat, $activity[$i]->lng, $activity[$i]->lat);
        }

        usort($activity, function ($a, $b) {
            if ($a->dis < $b->dis) {
                return -1;
            } elseif ($a->dis > $b->dis) {
                return 1;
            } else {
                return 0;
            }
        });

        return array_slice($activity, 0, 3);
    }

    private function getdistance($lng1, $lat1, $lng2, $lat2)    // unit: km
    {
        //將角度轉為狐度
        $radLat1=deg2rad($lat1);//deg2rad()函數將角度轉換為弧度
        $radLat2=deg2rad($lat2);
        $radLng1=deg2rad($lng1);
        $radLng2=deg2rad($lng2);
        $a=$radLat1-$radLat2;
        $b=$radLng1-$radLng2;
        $s=2*asin(sqrt(pow(sin($a/2), 2)+cos($radLat1)*cos($radLat2)*pow(sin($b/2), 2)))*6378.137;
        return $s;
    }
}
