<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vacatures') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2><strong>Vacatures</strong></h2>
                    <br>
                    @foreach ($vacancies as $vacancy)
                        <div class="flex items-start"> {{-- Use flex container --}}
                            <div class="mr-4"> {{-- Add margin to the left for spacing --}}
                                <img src="{{ asset('storage/images/' . $vacancy->image) }}" alt="{{ $vacancy->id }}" style="max-width: 200px; height: auto;" />
                            </div>
                            <div class="flex-grow"> {{-- Use flex-grow for remaining width --}}
                                <h3><strong>{{ $vacancy->title }}</strong></h3>
                                <p>{{ $vacancy->body }}</p>
                                <div style="margin-left: 20px;"> {{-- Add some margin for better appearance --}}
                                    {{-- Categories --}}
                                    @foreach ($vacancy->categories as $category)
                                        <span style="color: white; background-color: black; padding: 5px; margin-right: 5px; display: inline-block;">
                                            {{ $category->name }}
                                        </span>
                                    @endforeach
                                </div>
                                {{-- Geplaatst door --}}
                                <small class="float-right">Geplaatst door {{ $vacancy->user->name }} op {{ $vacancy->created_at->format('d-m-Y') }}</small>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
