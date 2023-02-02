<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
  
class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function __construct()
    {
      //$this->middleware('auth');
    }
    public function index()
    {
      return view('auth.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
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

        if (Auth::attempt($credentials)) 
        {
            if(Auth::user()->status!=1)
            {
              Auth::logout();
              return response()->json(['msg'=>'Your accont is deactivated','status'=>false,'url'=>url('/login')], 200); 
            }
            if(Auth::user()->usertype=='Admin')
            {
              return response()->json(['msg'=>'You have Successfully loggedin','status'=>true,'url'=>url('/admin/dashboard')], 200);          
            }
            if(Auth::user()->usertype=='Partner')
            {
              return response()->json(['msg'=>'You have Successfully loggedin','status'=>true,'url'=>url('/partner/dashboard')], 200);          
            }
            
        }
        else
        {
            return response()->json(['msg'=>'Oppes! You have entered invalid credentials','status'=>false], 201); 
        }
        return response()->json(['msg'=>'Oppes! You have entered invalid credentials','status'=>false], 201);
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
    
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