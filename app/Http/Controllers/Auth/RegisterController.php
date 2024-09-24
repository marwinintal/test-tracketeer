<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ThankYouForRegistrationEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $username = $request->username;

        if ($user = User::where('username', $username)->first()) {
            return response()->json([
                'success' => false,
                'message' => "The username you have entered has already been registered with our system.  Please enter a different username.",
                'user_id' => $user->id
            ]);
        }

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'state' => $request->state,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
        ]);

        /**
         * Sends outa pre-defined email to the address the user provides, thanking them for their registration.
         */
        Mail::to($user->email)->send(new ThankYouForRegistrationEmail($user));

        /**
         * Thank you page which greets the user by name and thanks them for registering.
         */
        return response()->json([
            'success' => true,
            'message' => "Successfully Registered",
            'user_id' => $user->id
        ]);
    }

    /**
     * Validate the inputs
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address_1' => ['string'],
            'address_2' => ['string'],
            'state' => ['string'],
            'city' => ['string'],
            'postal_code' => ['string'],
        ]);
    }

    public function thankYou($userId)
    {
        $user = User::findOrFail($userId);
        return view('pages.thank-you', compact('user'));
    }
}
