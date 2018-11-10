<?php

namespace App\Http\Controllers;

use DB;
use App\Quotation;
use Illuminate\Http\Request;

class UserController extends Controller{
    
    public function createPerson(Request $request){
        $person_categories = array(1,2,3);
        $company_categories = array(4,5);

        $category_id = $request->get('category_id');
        $name = $request->input('name');
        $username = $request->input('username');
        $password = $request->input('password');

        if(in_array($category_id, $person_categories)){
            $lastname = $request->input('lastname');
            $telefon = $request->input('telefon');
            $email = $request->input('email');

            DB::table('persons')->insert(
                [
                    'category_id' => $category_id,
                    'name' => $name,
                    'lastname' => $lastname,
                    'telefon' => $telefon,
                    'email' => $email,
                    'username' => $username,
                    'password' => $password
                ]
            );
        }
        else{
            DB::table('companies')->insert(
                [
                    'category_id' => $category_id,
                    'name' => $name,
                    'username' => $username,
                    'password' => $password
                ]
            );
        }
        
        switch ($category_id) {
            case 2:
                $person_id = $this->getLast('persons', 'person_id');
                DB::table('customers')->insert(['person_id' => $person_id]);  
                break;
            case 4:
                $company_id = $this->getLast('companies', 'company_id');
                DB::table('suppliers')->insert(['company_id' => $company_id]);  
                break;
            case 5:
                $company_id = $this->getLast('companies', 'company_id');
                DB::table('factories')->insert(['company_id' => $company_id]);  
                break;
        }
            return view('usercreated');
    }

    public function getLast($tablename, $elementname){
        $result = DB::table($tablename)->select($elementname)->orderBy($elementname, 'DESC')->take(1)->get();
        $result_array = json_decode($result, true);
        $result = $result_array[0][$elementname];
        return $result;
    }
}
