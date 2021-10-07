<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
<<<<<<< HEAD
    protected $loginField;
    protected $loginValue;
  
=======
>>>>>>> fe022b9737ca271d6f838fc0f6c3c33438f0652e
    public function authorize()
    {
        return true;
    }
<<<<<<< HEAD
    protected function prepareForValidation()
    {
      $this->loginField = filter_var($this->input('email'),
        FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile_num';
      $this->loginValue = $this->input('email');
      $this->merge([$this->loginField => $this->loginValue]);
    }
  
=======

>>>>>>> fe022b9737ca271d6f838fc0f6c3c33438f0652e
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
<<<<<<< HEAD
        {
        return [
            'email' =>
                'required_without:mobile_num|string',
            'mobile_num' =>
                'required_without:email|string',
            'password' => 'required|string',
        ];
        }

=======
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }
>>>>>>> fe022b9737ca271d6f838fc0f6c3c33438f0652e

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate()
    {
<<<<<<< HEAD
      $this->ensureIsNotRateLimited();
      if (!Auth::attempt(
            $this->only($this->loginField, 'password'), 
            $this->boolean('remember')
         )) 
      {
        RateLimiter::hit($this->throttleKey());
        throw ValidationException::withMessages([
          'email' => __('auth.failed')
        ]);
      }
      RateLimiter::clear($this->throttleKey());
    }
    
=======
        $this->ensureIsNotRateLimited();

        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

>>>>>>> fe022b9737ca271d6f838fc0f6c3c33438f0652e
    /**
     * Ensure the login request is not rate limited.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited()
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey()
    {
        return Str::lower($this->input('email')).'|'.$this->ip();
    }
}
