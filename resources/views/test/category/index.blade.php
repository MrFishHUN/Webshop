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
    <h1>Category List</h1>
    @isset($success)
        <p>{{ $success }}</p>
    @endisset
    <a href="{{ route('categories.create') }}">Create Category</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Tags</th>
            <th>Parent</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
        </tr>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>@if(isset($category->tags))
                        @foreach($category->tags as $tag)
                            {{ $tag }},
                        @endforeach
                    @endif</td>
                <td>{{ $category->parent->name ?? 'No Parent' }}</td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
                <td>
                    <a href="{{ route('categories.edit', ['category' => $category->id]) }}">Edit</a>
                    <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
            </tr>
        @endforeach
    </table>
</body>
</html>
