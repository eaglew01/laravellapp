<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('About Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <H1>GENERAL IDEA</H1>
                    <p>I builded a website where the user can find vacancies.</p>
                    <br>
                    <h1>GITHUB</h1>
                    <p><a href="https://github.com/eaglew01/laravellapp.git">Link to github</a></p>
                    <br><br>
                    <h1>RESOURCES</h1>
                    <h2>I used the following resources:</h2>
                    <br>
                    <p>Information on CRUD</p>
                    <a href="https://techvblogs.com/blog/laravel-9-crud-application-tutorial-with-example#google_vignette">https://techvblogs.com/blog/laravel-9-crud-application-tutorial-with-example#google_vignette</a>
                    <br><br>                    
                    <p>Information on Contact Form</p>
                    <a href="https://welcm.uk/blog/creating-a-contact-form-for-your-laravel-website">https://welcm.uk/blog/creating-a-contact-form-for-your-laravel-website</a>
                    <br><br>
                    <p>General Laravel documentation</p>
                    <a href="https://laravel.com/docs/10.x">https://laravel.com/docs/10.x</a>
                    <br><br>
                    <p>General Laravel Orchid documentation</p>
                    <a href="https://orchid.software/en/docs/">https://orchid.software/en/docs/</a>
                    <br><br>
                    <p>AI HELPER</p>
                    <a href="https://chat.openai.com/">https://chat.openai.com/</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>