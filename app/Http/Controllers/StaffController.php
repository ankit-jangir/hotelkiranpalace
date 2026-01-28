<?php

namespace App\Http\Controllers;

use App\Models\StaffUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    /**
     * Display a listing of staff members.
     */
    public function index()
    {
        $staffUsers = StaffUser::orderBy('created_at', 'desc')->get();
        return view('admin.staff.index', compact('staffUsers'));
    }

    /**
     * Show the form for creating a new staff member.
     */
    public function create()
    {
        return view('admin.staff.form');
    }

    /**
     * Store a newly created staff member in database.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'role' => 'required|string|in:cook,manager,hr,receptionist,housekeeper,maintenance,other',
            'login_email' => 'required|email|unique:staff_users,login_email|max:255',
            'login_number' => 'required|string|regex:/^\d{10}$/|unique:staff_users,login_number|max:20',
            'personal_email' => 'nullable|email|max:255',
            'personal_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Auto-generate password from login_number (for phone-based login)
            $autoPassword = $request->login_number;

            StaffUser::create([
                'name' => $request->name,
                'role' => $request->role,
                'login_email' => $request->login_email,
                'login_number' => $request->login_number, // Store only digits
                'password' => $autoPassword, // Model will hash it
                'personal_email' => $request->personal_email,
                'personal_number' => $request->personal_number,
                'address' => $request->address,
                'is_active' => true,
                'permissions' => [
                    'blogs' => true,
                    'gallery' => true,
                    'rooms' => true,
                    'hero_section' => true,
                    'user_forms' => true,
                    'subscriptions' => true,
                ],
            ]);

            return redirect()->route('admin.staff')
                ->with('success', 'Staff member added successfully! Password set to: ' . $request->login_number);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error adding staff: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified staff member.
     */
    public function edit($id)
    {
        $staff = StaffUser::findOrFail($id);
        return view('admin.staff.form', compact('staff'));
    }

    /**
     * Update the specified staff member in database.
     */
    public function update(Request $request, $id)
    {
        $staff = StaffUser::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'role' => 'required|string|in:cook,manager,hr,receptionist,housekeeper,maintenance,other',
            'login_email' => 'required|email|unique:staff_users,login_email,' . $id . '|max:255',
            'login_number' => 'required|string|regex:/^\d{10}$/|unique:staff_users,login_number,' . $id . '|max:20',
            'password' => 'nullable|string|regex:/^\d{10}$/|max:255',
            'personal_email' => 'nullable|email|max:255',
            'personal_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $updateData = [
                'name' => $request->name,
                'role' => $request->role,
                'login_email' => $request->login_email,
                'login_number' => $request->login_number,
                'personal_email' => $request->personal_email,
                'personal_number' => $request->personal_number,
                'address' => $request->address,
                'is_active' => $request->has('is_active') ? true : false,
            ];

            // Only update password if provided
            if ($request->filled('password')) {
                $updateData['password'] = $request->password; // Model will hash it
            }

            $staff->update($updateData);

            return redirect()->route('admin.staff')
                ->with('success', 'Staff member updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error updating staff: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified staff member from database.
     */
    public function destroy($id)
    {
        try {
            $staff = StaffUser::findOrFail($id);
            $staffName = $staff->name;
            $staff->delete();

            return redirect()->route('admin.staff')
                ->with('success', 'Staff member "' . $staffName . '" deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error deleting staff: ' . $e->getMessage());
        }
    }

    /**
     * Update staff permissions
     */
    public function updatePermissions(Request $request, $id)
    {
        try {
            $staff = StaffUser::findOrFail($id);

            // Get all permissions from request
            $permissions = [
                'blogs' => $request->has('permissions.blogs') ? true : false,
                'gallery' => $request->has('permissions.gallery') ? true : false,
                'rooms' => $request->has('permissions.rooms') ? true : false,
                'hero_section' => $request->has('permissions.hero_section') ? true : false,
                'user_forms' => $request->has('permissions.user_forms') ? true : false,
                'subscriptions' => $request->has('permissions.subscriptions') ? true : false,
            ];

            $staff->update(['permissions' => $permissions]);

            return redirect()->route('admin.settings')
                ->with('success', 'Staff permissions updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error updating permissions: ' . $e->getMessage());
        }
    }

    /**
     * Change staff password (Admin only)
     */
    public function changePassword(Request $request, $id)
    {
        try {
            $staff = StaffUser::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'new_password' => 'required|string|regex:/^\d{10}$/|max:20',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->with('error', 'Invalid phone number format. Must be exactly 10 digits.')
                    ->withInput();
            }

            // Update password
            $staff->update([
                'password' => $request->new_password, // Will be hashed by model
                'login_number' => $request->new_password, // Also update login number
            ]);

            return redirect()->route('admin.settings')
                ->with('success', 'Staff password changed successfully to: ' . $request->new_password);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error changing password: ' . $e->getMessage());
        }
    }
}