<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminSetting;
use Illuminate\Support\Facades\Hash;

/**
 * Developer / Company only. Create admin via form.
 * Routes in routes/developer.php, guarded by ?key=DEVELOPER_SECRET_KEY.
 */
class DeveloperController extends Controller
{
    /**
     * Show create-admin form. Only when ?key=... is valid.
     */
    public function showCreateAdminForm(Request $request)
    {
        $developerKey = $request->input('key') ?: $request->header('X-Developer-Key');
        $settings = AdminSetting::first();

        return view('developer.create-admin', [
            'developerKey' => $developerKey,
            'settings' => $settings,
        ]);
    }

    /**
     * Create/update admin from form. Same logic as console admin:create.
     */
    public function createAdmin(Request $request)
    {
        $request->validate([
            'admin_name'   => 'required|string|max:255',
            'admin_email'  => 'required|email|max:255',
            'admin_password' => 'required|string|min:6|max:255',
            'admin_password_confirmation' => 'required|same:admin_password',
            'admin_email_1' => 'nullable|email|max:255',
            'admin_email_2' => 'nullable|email|max:255',
            'admin_number_1' => 'nullable|string|max:50',
            'admin_number_2' => 'nullable|string|max:50',
        ], [
            'admin_name.required' => 'Admin name is required.',
            'admin_email.required' => 'Admin email (login) is required.',
            'admin_email.email' => 'Enter a valid email address.',
            'admin_password.required' => 'Password is required.',
            'admin_password.min' => 'Password must be at least 6 characters.',
            'admin_password_confirmation.same' => 'Password confirmation does not match.',
        ]);

        $settings = AdminSetting::first();
        if (!$settings) {
            $settings = AdminSetting::create([]);
        }

        $settings->admin_name = $request->admin_name;
        $settings->admin_email = $request->admin_email;
        $settings->admin_password = $request->admin_password; // hashed by model mutator

        if ($request->filled('admin_email_1')) {
            $settings->admin_email_1 = $request->admin_email_1;
        }
        if ($request->filled('admin_email_2')) {
            $settings->admin_email_2 = $request->admin_email_2;
        }
        if ($request->filled('admin_number_1')) {
            $settings->admin_number_1 = $request->admin_number_1;
        }
        if ($request->filled('admin_number_2')) {
            $settings->admin_number_2 = $request->admin_number_2;
        }

        $settings->save();

        $loginUrl = route('admin.login');

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Admin created/updated successfully. You can login at: ' . $loginUrl,
                'login_url' => $loginUrl,
            ]);
        }

        return redirect()
            ->route('developer.create-admin.form', ['key' => $request->input('key')])
            ->with('success', 'Admin created/updated successfully. <a href="' . e($loginUrl) . '">Login here</a>.');
    }
}
