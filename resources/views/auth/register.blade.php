<x-guest-layout>
    <div class="min-h-screen bg-gray-50 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-lg shadow-md">
            <div>
                <div class="flex justify-center">
                </div>
                <h2 class="mt-6 text-center text-3xl font-bold text-gray-900">Create Your Account</h2>
                <p class="mt-2 text-center text-sm text-gray-600">Join the NGO Connect community</p>
            </div>

            <form method="POST" action="{{ route('register') }}" x-data="{ role: '' }" class="mt-8 space-y-6">
                @csrf

                <!-- Common Fields -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input id="phone" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="phone" :value="old('phone')" required />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input id="address" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="address" :value="old('address')" required />
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input id="password_confirmation" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Role Selection -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Are you registering as an NGO?</label>
                    <div class="mt-2 flex space-x-6">
                        <label class="flex items-center">
                            <input type="radio" name="role" value="ngo" x-model="role" class="form-radio text-red-500" />
                            <span class="ml-2 text-sm text-gray-700">Yes (NGO)</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="role" value="supporter" x-model="role" class="form-radio text-red-500" />
                            <span class="ml-2 text-sm text-gray-700">No (Supporter)</span>
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>

                <!-- Supporter Fields (Conditional) -->
                <div x-show="role === 'supporter'" class="space-y-4">
                    <div>
                        <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                        <input id="date_of_birth" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="date" name="date_of_birth" :value="old('date_of_birth')" />
                        <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
                    </div>

                    <div>
                        <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                        <select id="gender" name="gender" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Select Gender</option>
                            <option value="0">Male</option>
                            <option value="1">Female</option>
                            <option value="2">Other</option>
                        </select>
                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                    </div>

                    <div>
                        <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                        <textarea id="bio" name="bio" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('bio') }}</textarea>
                        <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                    </div>

                    <div>
                        <label for="skills" class="block text-sm font-medium text-gray-700">Skills (optional)</label>
                        <input id="skills" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="skills" :value="old('skills')" />
                        <x-input-error :messages="$errors->get('skills')" class="mt-2" />
                    </div>
                </div>

                <!-- NGO Fields (Conditional) -->
                <div x-show="role === 'ngo'" class="space-y-4">
                    <div>
                        <label for="registration_no" class="block text-sm font-medium text-gray-700">Registration Number</label>
                        <input id="registration_no" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="registration_no" :value="old('registration_no')" />
                        <x-input-error :messages="$errors->get('registration_no')" class="mt-2" />
                    </div>

                    <div>
                        <label for="founded_date" class="block text-sm font-medium text-gray-700">Founded Date</label>
                        <input id="founded_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="date" name="founded_date" :value="old('founded_date')" />
                        <x-input-error :messages="$errors->get('founded_date')" class="mt-2" />
                    </div>

                    <div>
                        <label for="mission" class="block text-sm font-medium text-gray-700">Mission</label>
                        <textarea id="mission" name="mission" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('mission') }}</textarea>
                        <x-input-error :messages="$errors->get('mission')" class="mt-2" />
                    </div>

                    <div>
                        <label for="website" class="block text-sm font-medium text-gray-700">Website (optional)</label>
                        <input id="website" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="url" name="website" :value="old('website')" />
                        <x-input-error :messages="$errors->get('website')" class="mt-2" />
                    </div>

                    <div>
                        <label for="categories" class="block text-sm font-medium text-gray-700">Categories (select multiple)</label>
                        <select id="categories" name="categories[]" multiple class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="Education">Education</option>
                            <option value="Health">Health</option>
                            <option value="Environment">Environment</option>
                            <option value="Human Rights">Human Rights</option>
                            <option value="Animal Welfare">Animal Welfare</option>
                            <option value="Poverty Alleviation">Poverty Alleviation</option>
                            <option value="Disaster Relief">Disaster Relief</option>
                            <option value="Women Empowerment">Women Empowerment</option>
                            <option value="Child Welfare">Child Welfare</option>
                        </select>
                        <x-input-error :messages="$errors->get('categories')" class="mt-2" />
                    </div>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-black hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Register
                    </button>
                </div>

                <div class="text-center">
                    <a href="{{ route('login') }}" class="font-medium text-red-500 hover:text-red-700">Already have an account? Login</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>