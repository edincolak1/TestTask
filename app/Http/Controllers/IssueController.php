<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Exceptions\ResourceNotFoundException;
use App\Services\IssueService;
use App\Issues;
use Validator;
use Auth;

class IssueController extends ApiController
{
    protected $issueservice;

    public function __construct(IssueService $issueservice)
    {
        $this->issueservice = $issueservice;
    }


    public function index()
    {     
        $issues = $this->issueservice->index();
         
        return $this->showAll($issues);
    }

    public function show($id)
    {
        $issues = $this->issueservice->read($id);
 
       if(!$issues){
        throw new ResourceNotFoundException;
       }
        return response()->json(['data'=>$issues]);
    }


    public function transfer(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'user_id' => 'required'
        ]);

        $user_id = Auth::user()->id;
        $issue = Issues::find($id);
    
        if($validate->fails()){
            
            $response=['status' => 'error', 'message'=> 'user_id is mandatory field!'];
        } else if($user_id == $issue->user_id){

            $issue->user_id = $request->user_id;             
            $issue->save();

            $response=['status' => 'success', 'message'=> 'Issue successfuly transfered to another user!'];
        }else{
            $response=['status' => 'faild', 'message'=> 'Can`t transfer issue!'];
        }

        return response($response);
    }
    

    public function destroy(Issues $issue)
        {
   
            $user_id = Auth::user()->id;
            
       
        
            if($user_id == $issue->user_id){
    
                $issue->delete();

                $response=['status' => 'success', 'message'=> 'Issue successfuly deleted!'];
            }else if($user_id != $issue->user_id){
                
                $response=['status' => 'faild', 'message'=> 'Issue does NOT belong to this user!'];
            }else if($issue == null){
                $response=['status' => 'faild', 'message'=> 'there is no issue with this id'];
            }
    
            return response($response);
    
        }
    

    public function update(Request $request, $id) 
        {
            $validate = Validator::make($request->all(), [
                'title' => 'required',
                'stage_id' => 'required',
                'user_id' => 'required',
                'order' => 'required'
        ]);

            
    
            if($validate->fails()){
            
                $response=['status' => 'error', 'message'=> 'title, stage_id, user_id, order are mandatory field!'];
            }
        else {

            $user_id = Auth::user()->id;
            $issue = Issues::all();
            Issues::create($request->all());

            $response=['status' => 'success', 'message'=> 'Issue successfuly added!'];
        }

            return response($response);
    }

}
