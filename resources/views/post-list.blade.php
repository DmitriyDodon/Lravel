@extends('layout')
@section('content')
<div class="container-flex py-3 px-3">
    <table class="table table-bordered border-primary">
    <tr align="center">
        <td width="10%">
            Title
        </td>
        <td width="10%">
            User
        </td>
        <td width="16%">
            Category
        </td>
        <td width="16%">
            Tag
        </td>
        <td width="34%">
            Body
        </td>
        <td width="10%">
            Updated
        </td>
    </tr>

        @forelse($posts as $post)
            <tr>
                <td>
                    {{ $post->title }}
                </td>
                <td>
                    {{ $post->user->name }}
                </td>
                <td>
                    {{ $post->category->title }}
                </td>
                <td>
                    {{ implode(', ' , $post->tags()->pluck('title')->toArray()) }}
                </td>
                <td>
                    {{ $post->body }}
                </td>
                <td>
                    @php
                        $date = new DateTime();
                        /** @var $post */
                        $date = $post->updated_at;
                        echo 'Was updated at: '.$date->format('G:i d.M.y');
                    @endphp
                </td>
            </tr>
        @empty
            There is no posts
        @endforelse
    </table>
</div>
<div class="container py-4 ">
    @include('pagination' , compact('posts'))
</div>

@endsection

