    <table class="table" >

        <thead>
        <tr>
        <tr>
            <th>N/A</th>
            <th>Title</th>
            <th>Content</th>
            <th>Image</th>
            <th>Action</th>
        </tr>

        </tr>
        </thead>

        <tbody >
            @foreach ($posts as $key=>$row)
            <tr>
                <td>{{$key+1 }}</td>
                <td>{{$row->title }}</td>
                <td>{{$row->content }}</td>
                <td><img src="{{ asset($row->image)}}" width="50px" height="70px"></td>
                <td>
                    <a href="{{route('post.edit',$row->id) }}" class="btn-secondary btn">Edit</a>
                    <a href="{{ route('post.destroy',$row->id) }}" type="button" class="btn-danger btn onconfirmDelete"onclick="return confirm('Are you sure?')" >Delete</a>

                </td>
            </tr>
            @endforeach

        </tbody>

    </table>
    {!! $posts->links() !!}


