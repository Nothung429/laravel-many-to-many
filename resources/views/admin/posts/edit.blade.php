@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Modify</h1>
            </div>
            <div class="card-body">
                <form action="{{route('admin.posts.update', $post->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title', $post->title)}}">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Text</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10">{{old('content', $post->content)}}</textarea>
                        @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">Categoria</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" id="category" name="category_id">
                            <option value="">Seleziona Categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <h5>Tags</h5>
                        @foreach ($tags as $tag)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="{{$tag->slug}}" value="{{$tag->id}}" name="tags[]" {{in_array($tag->id, old('tags', $postTags)) ? 'checked' : ''}}>
                            <label class="form-check-label" for="{{$tag->slug}}">{{$tag->name}}</label>
                        </div>
                        @endforeach
                        @error('tags')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="published" name="published">
                        <label class="form-check-label" for="published">Publish</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Modify</button>
                </form>
            </div>
        </div>
    </div>
@endsection 