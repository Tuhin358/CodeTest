@extends('admin.admin_master')
@section('admin.content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="row-fluid sortable">
<div class="box span12">
    <div class="box-header" data-original-title>

        <p class="alert-success">
            @php
                $message=Session::get('message');
                if($message){
                    echo $message;
                }else{
                    Session::put('message',null);
                }
            @endphp
        </p>
        <h2><i class="halflings-icon edit "></i><span class="break"></span>Post Data</h2>

    </div>

    <div class="box-content">
        <form class="form-horizontal" action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">

            @csrf
            <fieldset>
                <div class="text-end">
                    <a href="{{ route('all.post') }}" class="btn btn-success">
                       All Post
                    </a>
                </div>
                <div class="control-group">
                    <label class="control-label" for="date01">Title</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge"  name="title" required>
                    </div>
                </div>

                <div class="control-group ">
                    <label class="control-label" for="textarea2">Content </label>
                    <div class="controls">
                        <textarea type="text" class="input-xlarge" name="content" rows="3" required></textarea>
                    </div>

                </div>

                <div class="control-group">
                    <label class="control-label">File Upload</label>
                    <div class="controls">
                        <input type="file" name="image"  required>
                    </div>
                </div>



                <div class="form-actions ">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </fieldset>
        </form>

    </div>
</div><!--/span-->
</div><!--/row-->
</div><!--/row-->


<script>
     //Paginetion for page
     $(document).on('click','.pagination a',function(e){
        e.preventDefault();
        let page=$(this).attr('href').split('page=')[1]
        post(page)

       })
       function post(page){
        $.ajax({
            url:"/pagination/paginate-data?page="+page,
            success:function(res){
                $('.card-body').html(res);

            }

        })
       }
</script>

 //Search function
 $(document).on('keyup',function(e){
    e.preventDefault();
    let search_string = $('#search').val();
    $.ajax({
        url:"{{ route('search.post') }}",
        method:'GET',
        data:{search_string:search_string},
        success:function(res){
            $('.card-body').html(res);
        }

    });
   })






   @endsection




