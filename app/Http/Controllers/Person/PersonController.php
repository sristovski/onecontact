<?php

namespace App\Http\Controllers\Person;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Person;
class PersonController extends ApiController
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $rules =[
            'First_name' => 'required|max:20',
            'Last_Name' => 'required|max:20',
            'EMail' => 'required|email|max:50|unique:person',
            'Mobile' => 'required|min:12|max:12',
            'PostCode_Zipcode' => 'required|min:7|max:7',
            'password' => 'required|min:8|confirmed'
        ];
        $this->validate($request, $rules);
 
        $data =$request-> all();
        //i save the password as plain text because i didn't want to implemnent md5 or sha .. us
        //$data['password'] = bcrypt($request->password);
        $data['email_token'] =  Person::generateVerificationToken();
        
        $person = Person::create($data);
        return $this->itemResponse($person,201);
    }

    public function verify($token){
        //removing the token and emailnotification to 1 so it is verified
        $person = Person::where('email_token', $token)->firstOrFail(); 
        $person->email_token =null;
        $person->emailnotification =1;
        $person->save();
        return $this->showMessage('The account has {{$person->EMail}} been verified');
    }

}
