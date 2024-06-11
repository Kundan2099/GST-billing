<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;

class PartyController extends Controller
{
    public function addParty() {
        return view('party.add');
    }

    public function manageParty() {
        return view('party.manage-party');
    }

   public function createParty(Request $request) {

    dd($request);

    $party = new Party();
    $party->party_type = $request->input('party_type');
    $party->full_name = $request->input('full_name');


   }

}
