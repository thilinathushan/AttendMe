<?php

namespace App\Http\Requests\Auth;

use App\Models\Administrator;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Models\Lecturer;
use App\Models\Student;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function authenticateStudent(): void
    // {
    // }



    public function authenticateStudent()
    {
        $this->ensureIsNotRateLimited();
        $credentials = $this->only('username', 'password');

        // Check if the user is a student
        $isStudent = Student::where('username', $credentials['username'])->exists();

        if ($isStudent) {

            if (Auth::guard('student')->attempt($credentials, $this->boolean('remember'))) {
                RateLimiter::clear($this->throttleKey());
                return;
            }
        }

        RateLimiter::hit($this->throttleKey());

        throw ValidationException::withMessages([
            'username' => trans('auth.failed'),
        ]);
    }

    public function authenticateLecturer()
    {
        $this->ensureIsNotRateLimited();
        $Leccredentials = $this->only('username', 'password');
        // dd($Leccredentials);
        // Check if the user is a Lecturer
        $isLecturer = Lecturer::where('username', $Leccredentials['username'])->exists();

        if ($isLecturer) {
            if (Auth::guard('lecturer')->attempt($Leccredentials, $this->boolean('remember'))) {
                RateLimiter::clear($this->throttleKey());
                return;
            }
        }

        RateLimiter::hit($this->throttleKey());

        throw ValidationException::withMessages([
            'username' => trans('auth.failed'),
        ]);
    }


    public function authenticateAdministrator()
    {
        $this->ensureIsNotRateLimited();
        $Admincredentials = $this->only('username', 'password');
        // dd($Admincredentials);
        // Check if the user is an admin
        $isAdmin = Administrator::where('username', $Admincredentials['username'])->exists();

        if ($isAdmin) {
            if (Auth::guard('administrator')->attempt($Admincredentials, $this->boolean('remember'))) {
                RateLimiter::clear($this->throttleKey());
                return;
            }
        }

        RateLimiter::hit($this->throttleKey());

        throw ValidationException::withMessages([
            'username' => trans('auth.failed'),
        ]);
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'username' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('username')) . '|' . $this->ip());
    }
}
