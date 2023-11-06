<x-app-layout>

    <h1>FAQs</h1>

@foreach ($faqs->groupBy('category.name') as $category => $faqsInCategory)
    <h2>{{ $category }}</h2>
    <ul>
        @foreach ($faqsInCategory as $faq)
            <li class="faq-question">
                <div class="question">
                    {{ $faq->question }}
                </div>
                <div class="answer">
                    {{ $faq->answer }}
                </div>
            </li>
        @endforeach
    </ul>
@endforeach

<a href="{{ route('faqs.create') }}">Create FAQ</a>

<style>
    /* Add some CSS for styling the questions and answers */
    .faq-question .question {
        cursor: pointer;
        color: blue;
        text-decoration: underline;
        margin-bottom: 10px;
    }

    .faq-question .answer {
        display: none;
        overflow: hidden;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('.faq-question .question').click(function () {
            var answer = $(this).next('.answer');
            if (answer.is(':visible')) {
                answer.slideUp();
            } else {
                $('.faq-question .answer').slideUp();
                answer.slideDown();
            }
        });
    });
</script>
</x-app-layout>