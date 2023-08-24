@extends('admin.admin_master')
@section('admin.content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
        <form class="form-horizontal" action="{{ route('post.update',$posts->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="old_img" value="{{$posts->image}}">
            <fieldset>
                <div class="text-end">
                    <a href="{{ route('all.post') }}" class="btn btn-success">
                       All Post
                    </a>
                </div>
                <div class="control-group">
                    <label class="control-label" for="date01">Title</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge"  name="title" value="{{ $posts->title}}" required>
                    </div>
                </div>

                <div class="control-group ">
                    <label class="control-label" for="textarea2">Content </label>
                    <div class="controls">
                        <textarea class="cleditor" name="content" rows="3" value="" required>{{ $posts->content}}</textarea>
                    </div>

                </div>

                <div class="control-group">
                    <label class="control-label">File Upload</label>
                    <div class="form-group">
                        <img src="{{ asset($posts->image) }}" width="100px" height="70px">
                    </div>
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

@endsection




