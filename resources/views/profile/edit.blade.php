{{-- resources/views/profile/edit.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <h1 class="text-2xl font-bold mb-4">تعديل الملف الشخصي</h1>
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">الاسم</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>

                    <div class="mb-4">
                        <label for="avatar" class="block text-sm font-medium text-gray-700">الصورة الشخصية</label>
                        <input type="file" id="avatar" name="avatar" class="mt-1 block w-full text-gray-500 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">البريد الإلكتروني</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700">رقم الهاتف</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div class="mb-4">
                        <label for="role" class="block text-sm font-medium text-gray-700">دور المستخدم</label>
                        <select id="role" name="role" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="client" {{ old('role', $user->role) == 'client' ? 'selected' : '' }}>عميل</option>
                            <option value="manager" {{ old('role', $user->role) == 'manager' ? 'selected' : '' }}>مدير</option>
                            <option value="agent" {{ old('role', $user->role) == 'agent' ? 'selected' : '' }}>وكيل</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="license_number" class="block text-sm font-medium text-gray-700">رقم الرخصة</label>
                        <input type="text" id="license_number" name="license_number" value="{{ old('license_number', $user->license_number) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div class="mb-4">
                        <label for="bio" class="block text-sm font-medium text-gray-700">السيرة الذاتية</label>
                        <textarea id="bio" name="bio" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('bio', $user->bio) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="salary" class="block text-sm font-medium text-gray-700">الراتب</label>
                        <input type="number" id="salary" name="salary" value="{{ old('salary', $user->salary) }}" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div class="mb-4">
                        <label for="bank" class="block text-sm font-medium text-gray-700">البنك</label>
                        <input type="text" id="bank" name="bank" value="{{ old('bank', $user->bank) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div class="mb-4">
                        <label for="city" class="block text-sm font-medium text-gray-700">المدينة</label>
                        <input type="text" id="city" name="city" value="{{ old('city', $user->city) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div class="mb-4">
                        <label for="preferred_neighborhoods" class="block text-sm font-medium text-gray-700">الأحياء المفضلة (فصل بين القيم بفاصلة)</label>
                        <input type="text" id="preferred_neighborhoods" name="preferred_neighborhoods" value="{{ old('preferred_neighborhoods', implode(', ', json_decode($user->preferred_neighborhoods, true))) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div class="mb-4">
                        <label for="age" class="block text-sm font-medium text-gray-700">العمر</label>
                        <input type="number" id="age" name="age" value="{{ old('age', $user->age) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div class="flex items-center justify-between">
                        <a href="{{ route('profile.show') }}" class="text-gray-500 hover:text-gray-700">إلغاء</a>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">حفظ التعديلات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
