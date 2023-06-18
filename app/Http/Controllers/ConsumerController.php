<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Consumer;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class ConsumerController extends Controller
{

    public function loginForm(){
        return view('auth.login-customer');
    }

    public function login(Request $request){

        try{
            $phoneNumber = $request->phoneNumber;

            // Store the consumer's telephone number in the session
            session(['consumer' => $phoneNumber]);

            // Create the consumer in the database if it doesn't exist
            Consumer::firstOrCreate(['phoneNumber' => $phoneNumber]);

            $consumer = Consumer::where('phoneNumber', session('consumer'))->first();

            // menimpa session consumer dari yg sebelumnya nomer
            session(['consumer' => $consumer]);

            Order::firstOrCreate(
                ['consumer_id' => $consumer->id],
                [
                    'cashier_id' => User::where('id', 4)->first()->id,
                    'status' => 'belum selesai',
                    'totalAmount' => '',
                    'paymentStatus' => 'belum lunas',
                ]
            );

            // Redirect to the home page
            return redirect()->route('home');

        }catch(Exception $e){
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function logout()
    {
        // Clear the consumer data from the session
        session()->forget('consumer');

        // Implement any additional logout logic if necessary

        // Redirect to the login page
        return redirect()->route('consumer-login');
    }

}
