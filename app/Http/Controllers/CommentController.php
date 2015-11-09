<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Votes;
use App\Comments;
use DB;
use Redis;
class CommentController extends Controller
{
	public function index(Request $request)
	{
		$comments 	= Comments::orderBy('id', 'desc')->paginate(5);
		$result 	= [];
		foreach($comments as $row)
			$result[] = [
				'id' 		=> (int)$row->id,
				'name' 		=> ucwords($row->name),
				'city'		=> ucwords($row->city),
				'comment' 	=> $row->comment,
			];

		return response()->json($result)
                 ->setCallback($request->input('callback'));
	}

	public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|max:225',
            'city'      => 'required|max:225',
            'email'     => 'email|required|max:255|unique:comments',
            'comment'   => 'required'
        ]);

        if ($validator->fails()) {
            $status = [
                'status'    => 'error',
                'error'     => $validator->errors()->all(),
            ];
        } else {
            $data = Comments::firstOrCreate([
                'name'          => $request->input('name'),
                'city'          => $request->input('city'),
                'email'         => $request->input('email'),
                'comment'       => $request->input('comment'),
                'ip_address'    => $request->getClientIp()
            ]);
            $data->save();
            $status = [
                'status'    => 'success'
            ];
        }

        return response()->json($status)
                 ->setCallback($request->input('callback'));
    }

    public function delete(Request $request)
    {
        if(Comments::find($request->input('id'))->delete())
            $status = [
                'status'    => 'success',
                'message'   => 'Comment deleted'
            ];
        else
            $status = [
                'status'    => 'failed',
                'message'   => 'Comment not found or has been deleted'
            ];

        return $status;
    }
}
