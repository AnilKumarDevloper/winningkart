<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use GeneaLabs\LaravelSocialiter\Facades\Socialiter;
use Socialite;
use App\Models\User;
use App\Models\Customer;
use App\Models\Cart;
use App\Services\SocialRevoke;
use Session;
use Illuminate\Http\Request;
use CoreComponentRepository;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use Auth;
use Storage;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'account_deletion']);
    }

 
    /**
     * Redirect the user to the social login authentication page.
     */
    public function redirectToProvider($provider)
    {
        if (request()->get('query') == 'mobile_app') {
            request()->session()->put('login_from', 'mobile_app');
        }
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Handle callback from social login providers.
     */
    public function handleProviderCallback(Request $request, $provider)
    {
        if (session('login_from') == 'mobile_app') {
            return $this->mobileHandleProviderCallback($request, $provider);
        }

        try {
            $user = Socialite::driver($provider)->stateless()->user();
        } catch (\Exception $e) {
            flash(translate("Something Went wrong. Please try again."))->error();
            return redirect()->route('user.login');
        }

        // Find or create user based on social provider data
        $existingUser = User::where('provider_id', $user->id)->orWhere('email', $user->email)->first();

        if ($existingUser) {
            $existingUser->provider_id = $user->id;
            $existingUser->provider = $provider;
            $existingUser->access_token = $user->token;
            $existingUser->save();
            Auth::login($existingUser, true);
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'provider_id' => $user->id,
                'provider' => $provider,
                'access_token' => $user->token,
            ]);
            Auth::login($newUser, true);
        }

        return $this->redirectToDashboard();
    }

    /**
     * Redirect based on user role
     */
    public function authenticated()
    {
        return $this->redirectToDashboard();
    }

    /**
     * Log the user out and invalidate session.
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return redirect()->route('home');
    }

    /**
     * Helper function for redirection based on user role
     */
    private function redirectToDashboard()
    {
        if (auth()->user()->user_type == 'seller') {
            return redirect()->route('seller.dashboard');
        }
        return redirect()->route('dashboard');
    }
}
