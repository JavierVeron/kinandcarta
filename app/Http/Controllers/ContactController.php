<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();

        return new ContactResource($contacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->company = $request->company;
        $contact->profileimage = $request->profileimage;
        $contact->email = $request->email;
        $contact->birthdate = $request->birthdate;
        $contact->phonenumber_work = $request->phonenumber_work;
        $contact->phonenumber_personal = $request->phonenumber_personal;
        $contact->address = $request->address;
        $contact->city = $request->city;
        $contact->state = $request->state;
        $contact->country = $request->country;

        if ($contact->save()) {
            return new ContactResource($contact);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $contact = Contact::find($id);

        if ($contact) {
            return new ContactResource($contact);
        } 
        
        return response()->json(["status" => "error", "message" => "Error! El ID de Contacto no exsite!"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $contact = Contact::find($id);

        if ($contact) {
            if (isset($request->name)) $contact->name = $request->name;
            if (isset($request->company)) $contact->company = $request->company;
            if (isset($request->profileimage)) $contact->profileimage = $request->profileimage;
            if (isset($request->email)) $contact->email = $request->email;
            if (isset($request->birthdate)) $contact->birthdate = $request->birthdate;
            if (isset($request->phonenumber_work)) $contact->phonenumber_work = $request->phonenumber_work;
            if (isset($request->phonenumber_personal)) $contact->phonenumber_personal = $request->phonenumber_personal;
            if (isset($request->address)) $contact->address = $request->address;
            if (isset($request->city)) $contact->city = $request->city;
            if (isset($request->state)) $contact->state = $request->state;
            if (isset($request->country)) $contact->country = $request->country;

            if ($contact->save()) {
                return new ContactResource($contact);
            }
        }

        return response()->json(["status" => "error", "message" => "Error! El ID de Contacto no exsite!"]);      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);

        if ($contact) {
            if ($contact->delete()) {
                return response()->json(["status" => "ok", "message" => "El Contacto se ha eliminado!"]);
            }
        }

        return response()->json(["status" => "error", "message" => "Error! El ID de Contacto no exsite!"]);
    }

    /**
     * Search one Contact by Name, Email of Telephones.
     *
     * @param  string $value
     * @return \Illuminate\Http\Response
     */
    public function searchByValue($value)
    {
        $contact = DB::table('contacts')
                    ->where('name', 'LIKE', '%' .$value .'%')
                    ->orWhere('company', 'LIKE', '%' .$value .'%')
                    ->orWhere('email', 'LIKE', '%' .$value .'%')
                    ->orWhere('phonenumber_work', 'LIKE', '%' .$value .'%')
                    ->orWhere('phonenumber_personal', 'LIKE', '%' .$value .'%')
                    ->first();

        if ($contact) {
            return response()->json(array("data" => $contact));
        }

        return response()->json(["status" => "error", "message" => "No se encontraron resultados!"]);
    }

    /**
     * List Cities from DB.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCities()
    {
        $contacts = DB::table('contacts')
                    ->select('city')
                    ->distinct()
                    ->orderBy('city')
                    ->get();

        if ($contacts->count() > 0) {
            return new ContactResource($contacts);
        }

        return response()->json(["status" => "error", "message" => "No se encontraron resultados!"]);
    }

    /**
     * List States from Db.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStates()
    {
        $contacts = DB::table('contacts')
                    ->select('state')
                    ->distinct()
                    ->orderBy('state')
                    ->get();

        if ($contacts->count() > 0) {
            return new ContactResource($contacts);
        }

        return response()->json(["status" => "error", "message" => "No se encontraron resultados!"]);
    }

    /**
     * Search Conctacts by City, State o Country.
     *
     * @param  string $value
     * @return \Illuminate\Http\Response
     */
    public function getContacts($value)
    {
        $contacts = DB::table('contacts')
                    ->where('city', 'LIKE', '%' .$value .'%')
                    ->orWhere('state', 'LIKE', '%' .$value .'%')
                    ->orWhere('country', 'LIKE', '%' .$value .'%')
                    ->orderBy('name')
                    ->get();

        if ($contacts->count() > 0) {
            return new ContactResource($contacts);
        }

        return response()->json(["status" => "error", "message" => "No se encontraron resultados!"]);
    }
}
