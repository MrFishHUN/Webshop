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
<h1>Add</h1>
<form action="{{route('categories.store')}}" method="POST">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" id="name">
    <br>
    <label for="description">Description</label>
    <input type="text" name="description" id="description">
    <br>
    <select name="parent_id">
        <option value="0" disabled selected>Select Parent (Optional)</option>
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    <label for="tags">Tags</label>
    <div>
        <!-- TODO: Add and remove input with js in later version -->
        <input type="text" name="tags[]">
        <input type="text" name="tags[]">
        <input type="text" name="tags[]">
    </div>
    <br>
    <button type="submit">Save</button>
</form>
@error('name')
    {{ $message }} <br>
@enderror
@error('description')
    {{ $message }} <br>
@enderror
@error('parent_id')
    {{ $message }} <br>
@enderror
@error('tags')
    {{ $message }} <br>
@enderror
</body>
</html>
