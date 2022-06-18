<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ContactService;

class ContactController extends Controller
{
    protected $contactService;
    public function  __construct(ContactService $contactService){
        $this->contactService = $contactService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts=$this->contactService->getAll();
        return view('index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request->all());
       
         $result =  $this->contactService->create($request);

        if($result){
            return redirect()->route('list-contact')->with([
                'message' => 'Thêm thành công !!!',
                'class'=>'alert-success',
            ]);
        }
        return redirect()->route('form-contact')->with([
            'message' => 'Thêm thất bại  !!!',
            'class'=>'alert-danger',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacts=$this->contactService->getId($id);
        return view('edit',compact('contacts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($id && $request->all() != null){
            $result=$this->contactService->update($request,$id);
            if($result){
                return redirect()->route('list-contact')->with([
                    'message' => 'cập nhập thành công !!!',
                    'class'=>'alert-success',
                ]);
            }
        }
        return redirect()->route('edit-contact')->with([
            'message' => 'cập nhập thất bại  !!!',
            'class'=>'alert-danger',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result=$this->contactService->delete($id);
       if($result){
        return redirect()->route('list-contact')->with([
            'message' => 'xóa thành công !!!',
            'class'=>'alert-success',
        ]);
    }
    return redirect()->route('list-contact')->with([
        'message' => 'xóa thất bại  !!!',
        'class'=>'alert-danger',
    ]);
       
    }
    public function filter(Request $request){
       // dd($request->all());
        $contacts=$this->contactService->filter($request);
        return view('index',compact('contacts'));
        
    }
}