<?php 
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
class UserSocialController extends Controller
{
    // Social Media Redirect
    public function redirect() {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback() {
        try {
            $user = Socialite::with('facebook')->user();
            $isUser = User::where('facebook_id', $user->id)->first();
            if($isUser){
                Auth::login($isUser);
                return redirect('user/dashboard');
            }

            $user->facebook_id = $user->getId();
            $user->name = $user->getName();
            $user->email = $user->getEmail();
            $user->avatar = $user->getAvatar();
            $user->save();
            Auth::login($user);
            return redirect('user/dashboard');
        } catch (\Exception $exception){
            dd($exception->getMessage());
        }
    }
}
