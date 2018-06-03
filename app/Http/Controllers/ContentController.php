<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
