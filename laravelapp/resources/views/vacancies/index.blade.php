<x-app-layout>

    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Vacancies edit</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('vacancies.create') }}"> Create Vacancy</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title vacancy</th>
                    <th>Body</th>
                    <th>userID</th>
                    <th width="150">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vacancies as $vacancy)
                    <tr>
                        <td>{{ $vacancy->id }}</td>
                        <td>{{ $vacancy->title }}</td>
                        <td>{{ $vacancy->body }}</td>
                        <td>{{ $vacancy->user_id}}</td>

                        <td>
                            <form action="{{ route('vacancies.destroy',$vacancy->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('vacancies.edit',$vacancy->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $vacancies->links() !!}
    </div>
</body>
</x-app-layout>