<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="{{ ('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="min-h-screen flex flex-col justify-center py-6 sm:py-12">
    <div class="relative px-4 py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="absolute inset-0">
            <div class="w-full h-full bg-gradient-to-r from-blue-500 to-blue-300 absolute"></div>
        </div>

        <div class="relative bg-white rounded-lg shadow-md p-6 max-w-4xl mx-auto">
            <h2 class="text-2xl font-bold mb-4">Edit Profile</h2>

            @if (session('status'))
                <div class="mb-4 text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
{{--                @method('PUT')--}}

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}"
                               class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm"
                        >
                        @error('name')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}"
                               class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm"
                        >
                        @error('email')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                        <input id="phone" name="phone" type="text" value="{{ old('phone', $user->phone) }}"
                               class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm"
                        >
                        @error('phone')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                        <textarea id="bio" name="bio"
                                  class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm"
                        >{{ old('bio', $user->bio) }}</textarea>
                        @error('bio')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-4">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-white shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
