<?php namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Votes;
use App\Comments;
use DB;
use Redis;
const COUNTER_KEY = 'MENDOAN:COUNT';

class HomeController extends Controller
{
    
    function __construct()
    {
         $this->redis    = new \Predis\Client();
    }

    public function index(Request $request)
    {
        if(! $count = $this->redis->get(COUNTER_KEY)) {
            $count = Votes::count();
            $this->redis->set(COUNTER_KEY, $count);
        }

        if ($count > 999 && $count <= 999999) {
            $kFormat = number_format($count / 1000, 1, '.', ' ').' K'; 
        } elseif ($count > 999999) {
            $kFormat = number_format($count / 1000000, 1, '.', ' ').' M';
        } else {
            $kFormat = $count;
        }

        $total          = str_pad($count, 6, 0, STR_PAD_LEFT);
        $exist          = Votes::where('ip_address', $request->getClientIp())->count();
        $comments       = Comments::orderBy('id', 'desc')->limit(5)->get();
        $commentCount   = Comments::count();

        return view('home', [
            'total'         => $total, 
            'count'         => $count, 
            'exist'         => $exist,
            'kFormat'       => $kFormat,
            'comments'      => $comments,
            'commentCount'  => $commentCount
        ]);
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
            if(! $count = $this->redis->get(COUNTER_KEY))
                $count = Votes::count();

            $data = Votes::firstOrCreate([
                'ip_address'  => $request->getClientIp()
            ]);
            if($data->save()) {
                $count = (int)$count+1;
                $this->redis->set(COUNTER_KEY, $count);
            }
            $total = str_pad($count, 6, 0, STR_PAD_LEFT);
            echo $total;
        }
    }
}
