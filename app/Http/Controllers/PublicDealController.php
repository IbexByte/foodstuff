<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Deal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use Twilio\Rest\Client;



class PublicDealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deals = Deal::all();

        return view('deals.index', ['deals' => $deals]);
    }

    /**
     * Display the specified resource.
     */

    public function show($id)
    {
        $deal = Deal::findOrFail($id);
        $deal->increment('views');
        return view('deals.show', ['deal' => $deal]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email|max:255',
            'phone_number' => 'required|string|max:20',
            'deal_id' => 'required|exists:deals,id',
        ], [
            'name.required' => 'حقل الاسم مطلوب',
            'email.required' => 'حقل البريد الإلكتروني مطلوب',
            'email.email' => 'يرجى إدخال عنوان بريد إلكتروني صحيح',
            'email.unique' => 'هذا البريد الإلكتروني مسجل بالفعل',
            'phone_number.required' => 'حقل رقم الهاتف مطلوب',
            'deal_id.required' => 'حقل معرف الصفقة مطلوب',
            'deal_id.exists' => 'لا يمكن العثور على الصفقة المحددة',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $deal = Deal::find($request->input('deal_id'));

        $customer = new Customer;
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->phone_number = $request->input('phone_number');

        $deal->customers()->save($customer); // Save the customer to the deal
        // send SMS message
        $sid = 'ACeee7c4589f100820e2edbae97f7cc44b';
        $token = '46b4b064084863e979c763dd473bb6cb';
        $twilio_number = '+15074323757';
        $twilio_whatsapp_number = 'whatsapp:+14155238886'; // Owner's WhatsApp number
        $owner_whatsapp_number = 'whatsapp:+213663231804'; // Owner's WhatsApp number
        $message_body = 'لقد إشترك '.$request->input('name') . 'في الصفقة ' . $deal->name . 'رقم هاتفه هو' .  $request->input('phone_number') ;

        $client = new Client($sid, $token);
        $message = $client->messages->create(
            $customer->phone_number,
            [
                'from' => $twilio_number,
                'body' => 'شكرا لإنضمامك للصفقةسنراسلك قريبا إو هذا هو رقم الإتصال الخاص بنا رسالنا على الواتساب 0663048574.',
            ]
        );
        $message = $client->messages->create(
            $owner_whatsapp_number,
            [
                'from' =>  $twilio_whatsapp_number,
                'body' => $message_body ,
            ]
        );
       

        Session::flash('success', 'شكرًا ' . $request->input('name') . ' لانضمامك للصفقة . يرجى التحقق من هاتفك ' . $request->input('phone_number') . ' للتأكد من وصول رسالة ترحيبية منا.');

        return redirect()->route('deals.show', $deal->id);

        // ... Rest of the code
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
