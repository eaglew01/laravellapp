<x-app-layout>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-2">
        <h1>FAQs</h1>

        @foreach ($faqs->groupBy('category.name') as $category => $faqsInCategory)
            <h2>{{ $category }}</h2>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Question</th>
                        <th>Answer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($faqsInCategory as $faq)
                        <tr class="faq-question">
                            <td class="question">
                                {{ $faq->question }}
                            </td>
                            <td class="answer">
                                {{ $faq->answer }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
        <div class="pull-right mb-2">
        <a class="btn btn-success" href="{{ route('faqs.create') }}">Ask a question</a>
        </div>
        </div>

    </body>

</x-app-layout>
