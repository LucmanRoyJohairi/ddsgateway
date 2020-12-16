<?php
// for site 2

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Model\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Services\User2Service;

Class User2Controller extends Controller
{
    use ApiResponse;


    //The service to consume the User1 Microservice
    //@var User1Service

    public $user2Service;

    //Create a new controller instance
    //@return void
    

    public function __construct(User2Service $user2Service){

        $this->user2Service = $user2Service;

    }
    public function index()
    {
        return $this->successResponse($this->user2Service->obtainUsers2());
    }

    // private $request;
    // public function __construct(Request $request)
    // {
    //     $this->request = $request;
    // }


    // =========== FRONT END PART ===========
    public function login(){
        return view('login');
    }

    public function submit(){
        

    }

    // ============== CRUD PART  ============
    

    //add new record
    public function addUser(Request $request){
        return $this->successResponse($this->user2Service->createUser2($request->all(),Response::HTTP_CREATED));
    }

    //display user by id
    public function showUser($id){
        return $this->successResponse($this->user2Service->obtainUser2($id));
    }

    //update a record
    public function updateUsers(Request $request, $id){
        return $this->successResponse($this->user2Service->editUser2($request->all(),$id));
    }

    //Delete a record
    public function removeUser($id){
        return $this->successResponse($this->user2Service->deleteUser2($id));
    }
}
?>
