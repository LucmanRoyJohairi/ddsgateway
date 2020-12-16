<?php
//for site 1

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Model\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Services\User1Service;
use App\Services\User2Service;

Class User1Controller extends Controller
{
    use ApiResponse;
    
    //The service to consume the User1 Microservice
    //@var User1Service

    public $user1Service;
    public $user2Service;
    
    //Create a new controller instance
    //@return void

    public function __construct(User1Service $user1Service, User2Service $user2Service){

        $this->user1Service = $user1Service;
        $this->user2Service = $user2Service;

    }
    public function index()
    {
        return $this->successResponse($this->user1Service->obtainUsers1());
    }

    // // =========== FRONT END PART ===========
    // public function login(){
    //     return view('login');
    // }


    // ============== CRUD PART  ============

    //show all data

    //add new record
    public function addUser(Request $request){
        // if($request->jobid <=5){
        //     $this->user1Service->obtainUser1($id);
        // }else{
        //     $this->user2Service->obtainUser2($id);
        // }
        return $this->successResponse($this->user1Service->createUser1($request->all(),Response::HTTP_CREATED));
    }
    
    //display user by id
    public function showUser($id){
        return $this->successResponse($this->user1Service->obtainUser1($id));
    }

    //update a record
    public function updateUsers(Request $request, $id){
        return $this->successResponse($this->user1Service->editUser1($request->all(),$id));
    }

    //Delete a record
    public function removeUser($id){
        return $this->successResponse($this->user1Service->deleteUser1($id));
    }
}
?>
