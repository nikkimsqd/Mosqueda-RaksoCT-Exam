<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\StoreFileRequest;
use App\Models\Contact;
use Exception;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        if($search) {
            $contacts = Contact::where('f_name', 'like', $search.'%')
            ->orWhere('l_name', 'like', $search.'%')
            ->orWhere('mobile_num', 'like', $search.'%')->get();

        }else {
            $contacts = Contact::all();
        }


        return view('contacts', ['contacts' => $contacts, 'search' => $search]);
    }

    public function store(StoreFileRequest $request)
    {
        $contact_csv = $request->file('contact_csv');
        $contact_data = $this->readCSV($contact_csv);
        $header_array = $contact_data[0];
        unset($contact_data[0]);

        $contactsArray = [];

        foreach($contact_data as $key => $contacts) {
            foreach($contacts as $cKey => $contact) {

                if($contact == "") {
                    $contactsArray[$key][$header_array[$cKey]] = null;
                } else {
                    $contactsArray[$key][$header_array[$cKey]] = $contact;
                }
            }
        }

        DB::beginTransaction();
        try {
            foreach($contactsArray as $contact) {
                $data = Contact::create([
                    'title' => $contact[$request->title],
                    'f_name' => $contact[$request->f_name],
                    'l_name' => $contact[$request->l_name],
                    'mobile_num' => $contact[$request->mobile_num],
                    'comp_name' => $contact[$request->comp_name],
                ]);
            }
            DB::commit();

        }catch(Exception $e) {
            DB::rollBack();
            Log::error("Uploading CSV File Failed", ['message' => $e->getMessage()]);
        }

        return redirect('contacts');
    }


    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $contact = Contact::where('id', $id)->first();

        return view('edit', ['contact' => $contact]);
    }

    public function update(StoreContactRequest $request)
    {
        $contact = Contact::find($request->id);

        $contact->title = $request->title;
        $contact->f_name = $request->f_name;
        $contact->l_name = $request->l_name;
        $contact->mobile_num = $request->mobile_num;
        $contact->comp_name = $request->comp_name;
        $contact->save();

        return redirect('contacts');
    }

    public function destroy($id)
    {
        $contact = Contact::where('id', $id)->delete();

        return redirect('contacts');
    }

    public function readCSV($contact_csv)
    {
        $csv_handle = fopen($contact_csv, 'r');
        while (!feof($csv_handle)) {
            $contact[] = fgetcsv($csv_handle, 0, ',');
        }
        fclose($csv_handle);

        return $contact;
    }
}
