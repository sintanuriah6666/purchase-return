<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DamagedProduct;
use App\Models\ReturnNote;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login form submission.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {

            $this->storeDamagedProductsInSession(); 
        

            return redirect()->route('index')->with('success', 'You have successfully logged in!');
        }
    
        return redirect()->route('auth.login')->with('error', 'Invalid email or password');
    }

    protected function authenticated(Request $request, $user)
    {
        $this->storeDamagedProductsInSession(); 
    }

    protected function storeDamagedProductsInSession()
    {
        $damagedProductIds = ReturnNote::pluck('damaged_product_id');
        $damagedProducts = DamagedProduct::whereNotIn('id', $damagedProductIds)
            ->get()
            ->count();
    
        session(['damagedProducts' => $damagedProducts]);
    }
    
    /**
     * Handle logout.
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('auth.login');
    }
}
