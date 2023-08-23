@extends('admin.admin_master')
@section('admin.content')

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

@endsection




