<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\APIUpdateContact;
use App\Http\Requests\APIStoreContactRequest;


class APIContactController extends Controller
{
    public function index(Request $request)
    {
        $contacts = Contact::all();

        return response()->json($contacts);
    }

    public function store(APIStoreContactRequest $request)
    {
        $message = 'Successfully created';
        try{
            $data = Contact::create([
                'title' => $request->title,
                'f_name' => $request->f_name,
                'l_name' => $request->l_name,
                'mobile_num' => $request->mobile_num,
                'comp_name' => $request->comp_name,
            ]);
        } catch (\Exception $e) {
            $message = 'Failed to create';

        }

        return response()->json(['messsage' => $message, 'data' => $data]);
    }



    public function update(APIUpdateContact $request)
    {
        $message = 'Failed to Update';

        try{
            $contact = Contact::findOrFail($request->id);

            if($request->title) {
                $contact->title = $request->title;
            }
            if($request->f_name) {
                $contact->f_name = $request->f_name;
            }
            if($request->l_name) {
                $contact->l_name = $request->l_name;
            }
            if($request->mobile_num) {
                $contact->mobile_num = $request->mobile_num;
            }
            if($request->comp_name) {
                $contact->comp_name = $request->comp_name;
            }
            $contact->save();
            $message = "Successfully Updated";

        } catch (\Exception $e) {
            return response()->json(['message' => $message]);
        }


        return response()->json(['message' => $message, 'data' => $contact]);
    }

    public function destroy(Request $request)
    {
        $message = 'Failed to Delete.';

        try{
            $contact = Contact::where('id', $request->id)->delete();
            $message = 'Successfuly deleted.';

        } catch (\Exception $e) {
        }

        return response()->json(['message' => $message]);
    }
}
