<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = ['name'];

    static function searchByValue($value)
    {
        $contact = DB::table('contacts')
                    ->where('name', 'LIKE', '%' .$value .'%')
                    ->orWhere('company', 'LIKE', '%' .$value .'%')
                    ->orWhere('email', 'LIKE', '%' .$value .'%')
                    ->orWhere('phonenumber_work', 'LIKE', '%' .$value .'%')
                    ->orWhere('phonenumber_personal', 'LIKE', '%' .$value .'%')
                    ->first();
        
        return $contact;
    }

    static function getCities()
    {
        $contacts = DB::table('contacts')
                    ->select('city')
                    ->distinct()
                    ->orderBy('city')
                    ->get();
        
        return $contacts;
    }

    static function getStates()
    {
        $contacts = DB::table('contacts')
                    ->select('state')
                    ->distinct()
                    ->orderBy('state')
                    ->get();
        
        return $contacts;
    }

    static function getContacts($value)
    {
        $contacts = DB::table('contacts')
                    ->where('city', 'LIKE', '%' .$value .'%')
                    ->orWhere('state', 'LIKE', '%' .$value .'%')
                    ->orWhere('country', 'LIKE', '%' .$value .'%')
                    ->orderBy('name')
                    ->get();
        
        return $contacts;
    }
}
