<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Edit</h1>
<form action="{{route('categories.update', ['category' => $category])}}" method="POST">
    @csrf
    @method('PUT')
    <lable>Name</lable>
    <input type="text" name="name" value="{{$category->name}}">
    <br>
    <lable>Description</lable>
    <input type="text" name="description" value="{{$category->description}}">
    <br>
    <select name="parent_id">
        <option value="0" disabled selected>Select Parent (Optional)</option>
        @foreach($categories as $category)
            <option value="{{$category->id}}" @if($category->id == $category->parent_id) selected @endif>{{$category->name}}</option>
        @endforeach
    </select>
    <lable>Tags</lable>
    @isset($category->tags)
        @foreach($category->tags as $tag)
            <input type="text" name="tags[]" value="{{$tag}}">
        @endforeach
    @endisset
    <br>
    <button type="submit">Save</button>
</form>
@error('error')
    {{ $message }}
@enderror
@error('name')
    {{ $message }}
@enderror
</body>
</html>
