<?php namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Votes;
use DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $total = str_pad(Votes::count(), 6, 0, STR_PAD_LEFT);
        $exist = Votes::where('ip_address', $request->getClientIp())->count();
        return view('home', ['total' => $total, 'exist' => $exist]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            $status = [
                'status'    => 'failed',
                'error'     => $validator->errors(),
            ];
        } else {
            $data = Votes::firstOrCreate([
                'ip_address'  => $request->getClientIp()
            ]);
            $data->save();

            $total = str_pad(Votes::count(), 6, 0, STR_PAD_LEFT);
            echo $total;
        }
    }
}
