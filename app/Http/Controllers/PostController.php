<?php


namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class PostController
{
    public function show()
    {
        $posts = Post::paginate(5);
        return view('post-list', compact('posts'));
    }

    public function usersChoise()
    {
        $users = User::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('form/users', compact('users', 'categories', 'tags'));
    }

    public function users($author)
    {
        $user = User::find($author);
        $posts = Post::where('user_id', $user->id)->paginate(5);
        return view('post-list', compact('posts'));
    }

    public function categories($category)
    {
        $category = Category::find($category);
        $posts = Post::where('category_id', $category->id)->paginate(5);
        return view('post-list', compact('posts'));
    }


    public function tags()
    {
        $tag = Tag::where('title', $_GET['title'])->first() ?? '';
        if ($tag !== '') {
            return new RedirectResponse('/tag/' . $tag->id);
        } else {
            echo 'There is no such tag';
        }
    }

    public function tag($tag)
    {
        $tag = Tag::find($tag);
        $posts = $tag->posts()->paginate(5);
        return view('post-list', compact('posts'));
    }


    public function author_with_category($author, $category)
    {
        $posts = Post::where('category_id' , $category)->where('user_id' , $author)->paginate(5);
        return view('post-list', compact('posts'));
    }

    public function author_with_category_with_tag($author, $category , $tag)
    {
        $posts = Post::where('category_id' , $category)
            ->where('user_id' , $author)
            ->whereHas('tags' , function (Builder $query) use ($tag){
                $query->where('tags.id' , $tag);
            })
            ->paginate(5);

        return view('post-list', compact('posts'));
    }





}
