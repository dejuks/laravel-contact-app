<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $contacts=DB::table('contacts')
            ->select('*')
            ->where('user_id',Auth::user()->id)->get();
        return view('contact.list',
        [
            'contacts'=>$contacts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contact.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator=$request->validate([
            'name'=>'required|min:2',
            'phone'=>'required|max:10',
        ]);
        $contact=Contacts::create(
            [
                'name'=>$request->name,
                'phone'=>$request->phone,
                'website'=>$request->website,
                'email'=>$request->email,
                'group'=>$request->group,
                'user_id'=>Auth::user()->id
            ]
        );
        $result=$contact->save();
        if($result){
            return redirect('contact-list')->with('success','Successfully Added');
        }
        else{
            return back();
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact=Contacts::find($id);
        return view('contact.show',
        [
            'contact'=>$contact
        ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact=Contacts::find($id);
        return view('contact.edit',
        [
            'contact'=>$contact
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator=$request->validate([
            'name'=>'required|min:2',
            'phone'=>'required|max:10',
        ]);
        $contact=Contacts::find($id);
        $contact->name=$request->name;
        $contact->phone=$request->phone;
        $contact->email=$request->email;
        $contact->website=$request->website;
        $contact->group=$request->group;
        $result=$contact->update();
        if($result){
            return redirect('contact-list')->with('success','Successfully Update');
        }
        else{
            return back();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact=Contacts::find($id);
        $result=$contact->delete();
        if($result){
            return redirect('contact-list')->with('success','Deleted Successfully');
        }
    }
}
