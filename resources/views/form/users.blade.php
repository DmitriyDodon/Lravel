@extends('layout')
@section('content')
    <div class="container-flex px-3 py-3" >
        <h2>Choose user:</h2>
        <ul class="list-group">
            @foreach($users as $user)
                <li class="list-group-item"><a type="submit" href="/author/{{ $user->id }}">{{ $user->name }}</a></li>
            @endforeach
        </ul>
        <h2>Choose category:</h2>
        <ul class="list-group">
            @foreach($categories as $category)
                <li class="list-group-item"><a type="submit" href="/category/{{ $category->id }}" >{{ $category->title }}</a></li>
            @endforeach
        </ul>
























        <h2>Choose tag:</h2>
        <form method="GET" action="/tag" class="form-group">
            <input class="form-control" name="title" type="text" placeholder="Enter title">
            <input type="Submit" class="btn btn-primary">
        </form>

        <h2>Choose category with user:</h2>

        <p>Type as link: /author/{author}/category/{category} and replace statements in {} with ids))))</p>
        <h2>Choose category with user and with tag:</h2>
        <p>Type as link: /author/{author}/category/{category}/tag/{tag} and replace statements in {} with ids))))</p>





    </div>

@endsection

