<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profiles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>User Profile</h1>
                    <div>
                        <select id="name-dropdown">
                            <option value="">Select a user</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <form id="profile-form">
                        
                        @if($user->image)
                                    <img src="{{ asset('storage/images/'.$user->image) }}" style="height: 50px;width:100px;">
                                    @else 
                                    <span>No image found!</span>
                                    @endif
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" readonly>
                        <br>
                        <label for="birthday">Birthday:</label>
                        <input type="text" id="birthday" name="birthday" readonly>
                        <br>
                        
                        <label for="email">Email:</label>
                        <input type="text" id="email" name="email" readonly>
                        <br>
                        <label for="aboutMe">About Me:</label>
                        <textarea id="aboutMe" name="aboutMe" readonly></textarea>

                    </form>
                    <script src="{{ asset('js/profile.js') }}"></script>
   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
