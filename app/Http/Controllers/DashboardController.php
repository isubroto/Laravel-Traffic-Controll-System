<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $backward;
    private $upward;
    private $downward;
    private $forward;
    private $backwardCount;
    private $upwardCount;
    private $downwardCount;
    private $forwardCount;
    private $backward_max;
    private $upward_max;
    private $downward_max;
    private $forward_max;


    public function __construct(){
        $this->backward = 0;
        $this->upward = 0;
        $this->downward = 0;
        $this->forward = 0;
        $this->backwardCount = false;
        $this->forwardCount = true;
        $this->downwardCount = true;
        $this->upwardCount = true;
        $this->backward_max = 40;
        $this->upward_max = 40;
        $this->downward_max = 40;
        $this->forward_max = 40;
        
    }
    public function getStatus(Request $request){
        $this->backward = $request->value['backward'];
        $this->upward = $request->value['upward'];
        $this->downward = $request->value['downward'];
        $this->forward = $request->value['forward'];
        return json_encode(["backward"=>$this->backward, "upward"=>$this->upward, "downward"=>$this->downward, "forward"=>$this->forward,'backwardCount'=> $this->backwardCount,'forwardCount'=>$this->forwardCount,'downwardCount'=>$this->downwardCount,'upwardCount'=>$this->upwardCount,"backwordalrt"=>($this->backward>= $this->backward_max ? 'denger': 'normal'), "upwardalrt"=>($this->upward>= $this->upward_max ? 'denger': 'normal'),"downwarddalrt"=>($this->downward>= $this->downward_max ? 'denger': 'normal') , "forwarddalrt"=>($this->forward>= $this->forward_max ? 'denger': 'normal')]);
    }
    public function updatestatus(Request $request){
        $this->backwardCount =$request->value['backwardCount'];
        $this->forwardCount = $request->value['forwardCount'];
        $this->downwardCount = $request->value['downwardCount'];
        $this->upwardCount = $request->value['upwardCount'];
            if($this->backwardCount==='true'){
                $this->backward = $request->value['backward'] + rand(0,2);
            }
            if($this->upwardCount==='true'){
                $this->upward = $request->value['upward'] + rand(0,2);
            }
            if($this->downwardCount==='true'){
                $this->downward = $request->value['downward'] + rand(0,2);
            }
            if($this->forwardCount==='true'){
                $this->forward = $request->value['forward'] + rand(0,2);
            }
        return json_encode(["backward"=>$this->backward, "upward"=>$this->upward, "downward"=>$this->downward, "forward"=>$this->forward,'backwardCount'=> $this->backwardCount,'forwardCount'=>$this->forwardCount,'downwardCount'=>$this->downwardCount,'upwardCount'=>$this->upwardCount]);
    }
    public function SetStatus(Request $request){
        switch($request->stutas){
            case "backward":
                $this->upwardCount = true;
                $this->backwardCount = false;
                $this->downwardCount = true;
                $this->forwardCount = true;
                $this->backward = 0;
                $this->upward = $request->value['upward'];
                $this->downward = $request->value['downward'];
                $this->forward = $request->value['forward'];
                break;
            case "upward":
                $this->upwardCount = false;
                $this->backwardCount = true;
                $this->downwardCount = true;
                $this->forwardCount = true;
                $this->backward = $request->value['backward'];
                $this->upward = 0;
                $this->downward = $request->value['downward'];
                $this->forward = $request->value['forward'];
                break;
            case "downward":
                $this->upwardCount = true;
                $this->backwardCount = true;
                $this->downwardCount = false;
                $this->forwardCount = true;
                $this->backward = $request->value['backward'];
                $this->upward = $request->value['upward'];
                $this->downward = 0;
                $this->forward = $request->value['forward'];
                break;
            case "forward":
                $this->upwardCount = true;
                $this->backwardCount = true;
                $this->downwardCount = true;
                $this->forwardCount = false;
                $this->backward = $request->value['backward'];
                $this->upward = $request->value['upward'];
                $this->downward = $request->value['downward'];
                $this->forward = 0;
                break;
            default:
                break;
        }
        return json_encode(["backward"=>$this->backward, "upward"=>$this->upward, "downward"=>$this->downward, "forward"=>$this->forward,'backwardCount'=> $this->backwardCount,'forwardCount'=>$this->forwardCount,'downwardCount'=>$this->downwardCount,'upwardCount'=>$this->upwardCount]);
    }
}
