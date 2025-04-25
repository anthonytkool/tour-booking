<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;               // ← เพิ่ม
use App\Models\User;                                   // ← เพิ่ม
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;          // ← เพิ่ม
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // ดึงอีเมลจาก request
        $email = $request->input('email');

        // เช็กก่อนว่ามีผู้ใช้ใน DB หรือไม่
        $user = User::where('email', $email)->first();
        if (! $user) {
            throw ValidationException::withMessages([
                'email' => ['ยังไม่สมัครสมาชิก กรุณาสมัครก่อน'],
            ]);
        }

        // ถ้ามีผู้ใช้ ให้ไป authenticate ตามปกติ
        try {
            $request->authenticate();
        } catch (ValidationException $e) {
            // ถ้ารหัสผ่านผิด ให้แจ้งข้อความใหม่
            throw ValidationException::withMessages([
                'email' => ['อีเมลหรือรหัสผ่านไม่ถูกต้อง'],
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
