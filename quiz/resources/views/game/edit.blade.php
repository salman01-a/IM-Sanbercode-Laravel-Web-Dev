<!doctype html>

<html lang="en">

<head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Edit Data</title>

</head>

<body>

    <h2>Edit Data Game</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/game/{{ $game->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="title">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $game->name }}">
        </div>
        <div class="form-group mb-3">
            <label for="body">Gameplay</label>
            <textarea class="form-control" name="gameplay" id="description" cols="30" rows="10">{{ $game->gameplay }}</textarea>
        </div>
        <div class="form-group mb-3">
            <label for="title">Developer</label>
            <input type="text" class="form-control" name="developer" id="developer" placeholder=""
                value="{{ $game->developer }}">
        </div>
        <div class="form-group mb-3">
            <label for="title">year</label>
            <input type="number" class="form-control" name="year" id="year" placeholder=""
                value="{{ $game->year }}">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

</body>

</html>
