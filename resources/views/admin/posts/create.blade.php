@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Create a New Post</div>

    @if(count($errors) > 0)
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item text-danger">
                    {{ $error }}
                </li>
            @endforeach 
        </ul>
    @endif

    <div class="panel-body">
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="featured_image">Featured Image</label>
                <input type="file" name="featured_image" class="form-control" />
            </div>

            <div class="form-group">
                <label for="category">Select a Category</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name  }}</option>
                    @endforeach
                </select>
            </div>

            @foreach($tags as $tag)
            {{-- <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="checkbox">
                <label class="form-check-label" for="checkbox">
                    {{ $tag->tag }}  
                </label>
            </div> --}}

            <div class="checkbox">
                <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{ $tag->tag }}</label>
            </div>
            @endforeach

            <div class="form-group">
                <label for="content">Content</label>
                <textarea type="text" name="content" id="content" class="form-control" rows="20"></textarea>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <input type="submit" value="Store Post" class="btn btn-success center" />
                </div>
            </div>

        </form>
    </div>
</div>

@stop

@section('styles')
<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@stop

@section('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script>
    $(document).ready(function() {
        $('#content').summernote();
    });
</script>

@stop
