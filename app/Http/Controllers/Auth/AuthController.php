<?php


namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Session;
use App\Models\Products;
use Hash;


class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }  
      
    public function registration()
    {
        return view('auth.registration');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {


        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }
  
        return redirect("login")->withErrors('Oppes! You have entered invalid credentials');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {

        if(Auth::check()){
            $loginUser = auth()->user();
            session()->put('loginUser', $loginUser);
            $products = Products::select("*")->get()->toArray();
            return view("dashboard",compact("products"));
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

   
    /**
     * Write code on Method
     *
     * @return response()
     *
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
