<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsonController extends Controller
{
    private $file;
    function __construct()
    {
        $this->file = file_get_contents(public_path('crud.json'));
    }
    public function index(){

       $data = json_decode($this->file);
       return view('list',compact('data'));
    }
    public function add(){
      return view('add');
    }
    public function save(Request $request){
       $request->validate([
        'name'=>'required',
       ]);
       $file_data = json_decode($this->file,true);
       $file_data['records'] = array_values($file_data['records']);
       array_push($file_data['records'],$request->all());
       file_put_contents(public_path('crud.json'),json_encode($file_data));
       return redirect('/')->with('success','Item has been added successfully');

    }
    public function remove($id){
      $file_data = json_decode($this->file,true);
      $all_records = $file_data['records'];
      $records = $all_records[$id];
      if($records){
        unset($file_data['records'][$id]);
        $file_data['records'] = array_values($file_data['records']);
        file_put_contents(public_path('crud.json'),json_encode($file_data));
        return redirect('/')->with('success','Item has been removed successfully');;
      }
    }
    public function edit($id){
        $file_data = json_decode($this->file,true);
        $file_data['records'] = $file_data['records'][$id];
        $data = $file_data['records'];
        return view('edit',compact('data','id'));
    }
    public function update(Request $request,$id){
      $file_data = json_decode($this->file, true);
      $file_data['records'] = array_values($file_data['records']);
      $jsonFile = $file_data['records'][$id];
      $user['name'] = $request->name;
      if($jsonFile){
        unset($file_data['records'][$id]);
        $file_data['records'][$id] = $user;
        $file_data['records'] = array_values($file_data['records']);
       file_put_contents(public_path('crud.json'),json_encode($file_data));
      }
      return redirect('/')->with('success','Item has been updated successfully');;
    }
    public function search(Request $request){
       $all = json_decode($this->file,true);

       $string = $request->query('search');
    }
}
