<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert(["name"=>"Ivana Doover", "company"=>"Facebook", "profileimage"=>"Ivana-Doover.jpg", "email"=>"ivana.doover@gmail.com", "birthdate"=>"1981-05-21", "phonenumber_personal"=>"1156458413", "address"=>"1378 Norman Street", "city"=>"Los Angeles", "state"=>"California", "country"=>"USA"]);
        DB::table('contacts')->insert(["name"=>"Jeremy Jameson", "company"=>"Amazon", "profileimage"=>"Jeremy-Jameson.jpg", "email"=>"jeremy.jameson@hotmail.com", "birthdate"=>"1981-05-22", "phonenumber_personal"=>"1156458414", "address"=>"3255 Williams Avenue", "city"=>"Bakersfield", "state"=>"California", "country"=>"USA"]);
        DB::table('contacts')->insert(["name"=>"Steve Lowenthal", "company"=>"Apple", "profileimage"=>"Steve-Lowenthal.jpg", "email"=>"steve.lowenthal@yahoo.com", "birthdate"=>"1981-05-23", "phonenumber_personal"=>"1156458415", "address"=>"1666 Oliver Street", "city"=>"Watauga", "state"=>"Texas", "country"=>"USA"]);
        DB::table('contacts')->insert(["name"=>"Kathy Blauser", "company"=>"Netflix", "profileimage"=>"Kathy-Blauser.jpg", "email"=>"kathy.blauser@gmail.com", "birthdate"=>"1981-05-24", "phonenumber_personal"=>"1156458416", "address"=>"2179 Carriage Lane", "city"=>"Danville", "state"=>"Pensilvania", "country"=>"USA"]);
        DB::table('contacts')->insert(["name"=>"Elizabeth Payeur", "company"=>"Google", "profileimage"=>"Elizabeth-Payeur.jpg", "email"=>"elizabeth.payeur@hotmail.com", "birthdate"=>"1981-05-25", "phonenumber_personal"=>"1156458417", "address"=>"1900 Par Drive", "city"=>"Bakersfield", "state"=>"California", "country"=>"USA"]);
        DB::table('contacts')->insert(["name"=>"Joseph Walker", "company"=>"Facebook", "profileimage"=>"Joseph-Walker.jpg", "email"=>"joseph.walker@yahoo.com", "birthdate"=>"1981-05-26", "phonenumber_personal"=>"1156458418", "address"=>"3234 Christie Way", "city"=>"Framingham", "state"=>"Minnesota", "country"=>"USA"]);
        DB::table('contacts')->insert(["name"=>"Aaron Gebhard", "company"=>"Amazon", "profileimage"=>"Aaron-Gebhard.jpg", "email"=>"aaron.gebhard@gmail.com", "birthdate"=>"1981-05-27", "phonenumber_personal"=>"1156458419", "address"=>"4286 Godfrey Road", "city"=>"New York", "state"=>"New York", "country"=>"USA"]);
    }
}
