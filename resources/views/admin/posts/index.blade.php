@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>All Posts</h1>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Text</th>
                        <th scope="col">Status</th>
                        <th scope="col">Buttons</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td class="text-truncate" style="max-width: 150px;">{{$post->title}}</td>
                        <td class="text-truncate" style="max-width: 150px;"><a href="{{route('admin.posts.show', $post->id)}}">{{$post->slug}}</a></td>
                        <td class="text-truncate" style="max-width: 200px;">{{$post->content}}</td>
                        <td>
                            @if ($post->published)
                                <span class="badge badge-pill badge-success">Published</span>
                            @else
                                <span class="badge badge-pill badge-secondary">Unpublished</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-outline-info">Modify</a>
                            <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Cancel</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 