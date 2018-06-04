<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisController extends Controller
{
    //

    public function computeDis()
    {
        $hotel = \DB::table('hotel')
            ->select('hotel_id', 'lat', 'lng')
            ->get();
        $attraction = \DB::table('attraction')
            ->select('id', 'lat', 'lng')
            ->get();


        // echo json_encode($attraction);
        foreach ($hotel as $key => $value) {
            $count = 0;
            foreach ($attraction as $k => $v) {
                $dis = $this->getdistance($value->lng, $value->lat, $v->lng, $v->lat);
                if ($dis <= 1) {
                    $count++;
                }
            }
            \DB::table('hotel')
            ->where('hotel_id', $value->hotel_id)
            ->update(
                ['attraction_num' => $count]
            );
        }
        return 'OK';
    }

    public function computeTopk()
    {
        $hotel = \DB::table('hotel')
            ->select('hotel_id', 'star', 'min_price', 'max_price', 'attraction_num')
            ->get();

        foreach ($hotel as $key => $value) {
            $count = 0;
            foreach ($hotel as $k => $v) {
                $topk = $this->getTopk(
                    $value->star, ($value->min_price+ $value->max_price)/2 , $value->attraction_num,
                    $v->star, ($v->min_price+ $v->max_price)/2 , $v->attraction_num
                );
                if ($topk) {
                    $count++;
                }
            }
            \DB::table('hotel')
            ->where('hotel_id', $value->hotel_id)
            ->update(
                ['topk' => $count]
            );
        }

        return 'OK';
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

    private function getTopk($star1, $price1, $attr_num1, $star2, $price2, $attr_num2)
    {
        return $star1 >= $star2 && $price1 <= $price2 && $attr_num1 >= $attr_num2 &&
        ($star1 > $star2 || $price1 < $price2 || $attr_num1 > $attr_num2 ) ;
    }
}
