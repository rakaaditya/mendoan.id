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
        $this->redis    = new \Predis\Client([
            'host' => env('REDIS_HOST', '127.0.0.1')
        ]);
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
        $exist          = $request->session()->get('voted');
        $comments       = Comments::orderBy('id', 'desc')->limit(10)->get();
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
        if(! $count = $this->redis->get(COUNTER_KEY))
            $count = Votes::count();

        $vote = new Votes;
        $vote->ip_address = $request->getClientIp();

        if($vote->save()) {
            $count = (int)$count+1;
            $this->redis->set(COUNTER_KEY, $count);
        }

        // Set session
        session(['voted' => true]);

        $total = str_pad($count, 6, 0, STR_PAD_LEFT);
        echo $total;
    }
}
