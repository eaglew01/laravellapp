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
                        <div>
                            <h3><strong>{{ $vacancy->title }}</strong></h3>
                            <p>{{ $vacancy->body }}</p>
                            <small>Geplaatst door {{$vacancy->user->name}} op {{ $vacancy->created_at->format('d-m-Y') }} </small>
                            <br><hr>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
