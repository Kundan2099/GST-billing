<?php

namespace App\Http\Controllers;

use App\Enums\PartyType;
use App\Models\Party;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Enum;

class PartyController extends Controller
{
    public function addParty()
    {
        return view('party.add');
    }

    public function manageParty()
    {
        $parties = Party::all();

        // $parties = Party::select('id', 'party_type', 'created_at')->get();

        return view('party.manage-party', [
            'parties' => $parties,
        ]);
    }

    public function createParty(Request $request)
    {

        try {

            $validation = Validator::make($request->all(), [
                'party_type' => ['required', 'string', new Enum(PartyType::class)],
                'full_name' => ['required', 'string', 'min:2', 'max:100'],
                'phone_no' => ['required', 'numeric', 'unique:parties', 'digits:10'],
                'address' => ['required', 'string', 'max:250'],
                'account_holder_name' => ['required', 'string', 'max:50'],
                'account_no' => ['required', 'numeric', 'unique:parties', 'digits_between:5,30'],
                'bank_name' => ['required', 'string', 'max:50'],
                'ifsc_code' => ['required', 'string', 'max:50'],
                'branch_address' => ['required', 'string', 'max:250'],
            ]);
            // dd($request->all());
            // Check if validation fails
            if ($validation->fails()) {
                // dd($validation->errors()->first());
                return redirect()->back()->withErrors($validation)->withInput();
            }

            $party = new Party();
            $party->party_type = $request->input('party_type');
            $party->full_name = $request->input('full_name');
            $party->phone_no = $request->input('phone_no');
            $party->address = $request->input('address');
            $party->account_holder_name = $request->input('account_holder_name');
            $party->account_no = $request->input('account_no');
            $party->bank_name = $request->input('bank_name');
            $party->ifsc_code = $request->input('ifsc_code');
            $party->branch_address = $request->input('branch_address');
            $party->save();


            return redirect()->route('manage-party')->with('message', 'Party created successfully');

            // return redirect()->route('add-party')->with('message', [
            //     'status' => 'success',
            //     'title' => 'Investment Party Added',
            //     'description' => 'The party is successfully created.'
            // ]);
        } catch (Exception $exception) {

            return redirect()->back()->with('message', $exception->getMessage());
            // return redirect()->back()->with('message', [
            //     'status' => 'error',
            //     'title' => 'An error occcured',
            //     'description' => $exception->getMessage()
            // ]);
        }
    }


    public function viewPartyUpdate($id)
    {
        $party = Party::find($id);

        return view('party.edit', [
            'party' => $party
        ]);
    }

    public function handlePartyUpdate(Request $request, $id)
    {

        try {

            $party = Party::find($id);

            // if (!$party) {
            //     return redirect()->back()->with('message', [
            //         'status' => 'warning',
            //         'title' => 'Party not found',
            //         'description' => 'Party not found with specified ID'
            //     ]);
            // }

            $validation = Validator::make($request->all(), [
                'party_type' => ['required', 'string', new Enum(PartyType::class)],
                'full_name' => ['required', 'string', 'min:2', 'max:100'],
                'phone_no' => ['required', 'numeric', 'digits:10'],
                'address' => ['required', 'string', 'max:250'],
                'account_holder_name' => ['required', 'string', 'max:50'],
                'account_no' => ['required', 'numeric', 'digits_between:5,30'],
                'bank_name' => ['required', 'string', 'max:50'],
                'ifsc_code' => ['required', 'string', 'max:50'],
                'branch_address' => ['required', 'string', 'max:250'],
            ]);

            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation)->withInput();
            }

            $party->party_type = $request->input('party_type');
            $party->full_name = $request->input('full_name');
            $party->phone_no = $request->input('phone_no');
            $party->address = $request->input('address');
            $party->account_holder_name = $request->input('account_holder_name');
            $party->account_no = $request->input('account_no');
            $party->bank_name = $request->input('bank_name');
            $party->ifsc_code = $request->input('ifsc_code');
            $party->branch_address = $request->input('branch_address');
            $party->update();


            return redirect()->route('manage-party')->with('message', 'Party successfully updated');

            // return redirect()->route('manage-party')->with('message', [
            //     'status' => 'success',
            //     'title' => 'Party Updated',
            //     'description' => 'The Party is successfully updated.'
            // ]);
        } catch (Exception $exception) {
            // return redirect()->back()->with('message', [
            //     'status' => 'error',
            //     'title' => 'An error occcured',
            //     'description' => $exception->getMessage()
            // ]);
        }
    }

    public function handlePartyDelete($id)
    {

        try {
            $party = Party::find($id);

            // if (!$party) {
            //     return redirect()->back()->with('message', [
            //         'status' => 'warning',
            //         'title' => 'Party not found',
            //         'description' => 'The Party not fount with specified ID'
            //     ]);
            // }

            $party->delete();

            return redirect()->route('manage-party')->with('message', 'Party successfully deleted');

            // return redirect()->route('manage-party')->with('message', [
            //     'status' => 'success',
            //     'titale' => 'Party deleted',
            //     'description' => 'The Party is successfully deleted'
            // ]);
        } catch (Exception $exception) {
            // return redirect()->back()->with('message', [
            //     'status' => 'error',
            //     'title' => 'An error occcured',
            //     'description' => $exception->getMessage()
            // ]);
        }
    }
}
