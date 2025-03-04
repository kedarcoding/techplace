<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\RequirementJob;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function __construct()
    {
        
    }
    public function index(Request $request) {
       $search = $request->query('search');
       $query=RequirementJob::query();
       if ($search) {
        $query->where('job_title', 'like', "%{$search}%");
        } 
       $jobs= $query->where(['status'=>1])->paginate();
       if(!$jobs){
        return response()->json([$jobs],200);
       }
       return response()->json(['message'=>'No data'],200);
    }
}
