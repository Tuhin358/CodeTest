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
                        <textarea class="cleditor" name="content" rows="3" value="{{ $posts->content}}" required></textarea>
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

  {{--  <script>
    $(document).ready(function() {
        $('#categorySelect').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: '{{ route("get-subcategories", ":category_id") }}'.replace(':category_id', category_id),

                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#subcategorySelect').empty();
                        $('#subcategorySelect').append('<option value="">Select Subcategory</option>');
                        $.each(data, function(key, value) {
                            $('#subcategorySelect').append('<option value="' + value.id + '">' + value.subcategory_bn + '</option>');
                        });

                    }
                });
            } else {
                alert("danger");

            }
        });
    });
</script>  --}}
             // District section
{{--
 <script>
    $(document).ready(function() {
        $('#districtSelect').on('change', function() {
            var dis_id = $(this).val();
            if (dis_id) {
                $.ajax({
                    url: '{{ route("get-subdistricts", ":dis_id") }}'.replace(':dis_id', dis_id),
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#subdistrictSelect').empty();
                        $('#subdistrictSelect').append('<option value="">Select Subdistrict</option>');
                        $.each(data, function(key, value) {
                            $('#subdistrictSelect').append('<option value="' + value.id + '">' + value.subdistrict_bn + '</option>');
                        });
                    }
                });
            } else {
                $('#subdistrictSelect').empty();
                $('#subdistrictSelect').append('<option value="">Select Subdistrict</option>');
            }
        });
    });
</script>  --}}






@endsection




