<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    // /**
    //  * Write code on Method
    //  *
    //  * @return response()
    //  */
    // public function index()
    // {
    //     return view('contactForm');
    // }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'err',  'message' => $request->locale == "ar" ? 'خطأ في المدخلات' : 'An error occurred']);
        }

        Contact::create($request->all());

        if($request->locale == "ar") {
            return response()->json(['status' => 'success',  'message' => 'شكرا لك على الاتصال بنا. سوف نتصل بك قريبا.']);
        } else {
            return response()->json(['status' => 'success',  'message' => 'Thank you for contacting us. We will contact you soon.']);
        }
    }
}
