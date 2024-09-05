<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{
//    // دالة لعرض الملف الشخصي
//    public function show($id)
//    {
//        $user = User::findOrFail($id);
//
//        return view('profile', compact('user'));
//    }
//
//    // دالة لتحديث الملف الشخصي
//    public function update(Request $request, $id)
//    {
//        // التحقق من صحة البيانات
//        $request->validate([
//            'name' => 'required|string|max:255',
//            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
//            'phone' => 'nullable|string|max:20',
//            'avatar' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
//            'role' => 'nullable|string|max:50',
//            'license_number' => 'nullable|string|max:100',
//            'bio' => 'nullable|string',
//            'is_supported' => 'nullable|boolean',
//            'salary' => 'nullable|numeric|min:0',
//            'bank' => 'nullable|string|max:100',
//            'city' => 'nullable|string|max:100',
//            'preferred_neighborhoods' => 'nullable|array',
//            'age' => 'nullable|integer|min:0|max:120',
//        ]);
//
//        // جلب المستخدم
//        $user = User::findOrFail($id);
//
//        // تحديث البيانات
//        $user->name = $request->name;
//        $user->email = $request->email;
//        $user->phone = $request->phone;
//        $user->role = $request->role;
//        $user->license_number = $request->license_number;
//        $user->bio = $request->bio;
//        $user->is_supported = $request->is_supported;
//        $user->salary = $request->salary;
//        $user->bank = $request->bank;
//        $user->city = $request->city;
//        $user->preferred_neighborhoods = $request->preferred_neighborhoods ? json_encode($request->preferred_neighborhoods) : null;
//        $user->age = $request->age;
//
//        // تحديث الصورة الرمزية إذا تم تحميلها
//        if ($request->hasFile('avatar')) {
//            $path = $request->file('avatar')->store('avatars', 'public');
//            $user->avatar = $path;
//        }
//
//        // حفظ التغييرات
//        $user->save();
//
//        // إعادة التوجيه مع رسالة نجاح
//        return redirect()->back()->with('success', 'Profile updated successfully.');
//    }




    public function show()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => 'nullable|string|max:20',
            'role' => 'nullable|string|max:50',
            'license_number' => 'nullable|string|max:50',
            'bio' => 'nullable|string',
            'is_supported' => 'nullable|boolean',
            'salary' => 'nullable|numeric',
            'bank' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'preferred_neighborhoods' => 'nullable|array',
            'age' => 'nullable|integer',
        ]);

        if ($request->hasFile('avatar')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($user->avatar && Storage::exists($user->avatar)) {
                Storage::delete($user->avatar);
            }

            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $avatarPath;
        }

        $user->update($data);

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }


}
