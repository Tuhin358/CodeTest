@extends('admin.admin_master')
@section('admin.content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>




<style>
    .container-fluid .card .h1{
        margin-left: 14px;
    }

</style>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">News Post</h1>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    @php
                        Alert::toast($error,'error')
                    @endphp
                @endforeach
            @endif

            <div class="text-end ml-4">
                <a href="{{ route('create') }}" class="btn btn-success">
                   + Add New
                </a>
            </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1">News Post </i>

                    </div>
                    <input type="text" name="search" id="search" class="mb-3 form-controller" placeholder="Search Here">


                    <div class="card-body">
                        <table class="table" >
                            {{--  id="datatablesSimple_sample" class="display " cellspacing="0" width="100%" data-mdb-selectable="true" data-mdb-multi="true"  --}}
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
                                        {{--  {{route('post.edit',$row->id) }}  --}}
                                        {{--  <a href=" " class="btn-danger btn onconfirmDelete" onclick="return confirm('Are you sure?')">Delete</a>  --}}
                                        <a href="{{ route('post.destroy',$row->id) }}" type="button" class="btn-danger btn onconfirmDelete"onclick="return confirm('Are you sure?')" >Delete</a>
                                        {{--  {{ route('post.destroy',$row->id) }}  type="button" --}}
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>

                        </table>
                        {!! $posts->links() !!}
                    </div>
                    @include('post.post_js')
                </div>

        </div>
    </main>

<!-- Modal -->

    <script>
        image.onchange = evt => {
            const [file] = image.files
            if (file) {
                blah.style = 'display:block',
                    blah.src = URL.createObjectURL(file)
            }
        }
    </script>




@endsection
