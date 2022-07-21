@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>All Tags</h1>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Buttons</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                    <tr>
                        <td>{{$tag->name}}</td>
                        <td>
                            <a href="{{route('admin.tags.show', $tag->id)}}">{{$tag->slug}}</a>
                        </td>
                        <td>
                            <a href="{{route('admin.tags.edit', $tag->id)}}" class="btn btn-outline-info">Modify</a>
                            <form action="{{route('admin.tags.destroy', $tag->id)}}" method="POST">
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