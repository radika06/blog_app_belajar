@extends('admin.master') 
@section('content') 
<div class="row mt-5 mb-5"> 
<div class="col-lg-12 margin-tb"> 
<div class="float-left"> 
<h2>Create New Post</h2> 
</div> 
<div class="float-right"> 
<a class="btn btn-secondary" href="{{ url('admin/posts') }}"> Back</a> 
</div> 
</div> 
</div> 
@if ($errors->any()) 
<div class="alert alert-danger"> 
<strong>peringatan!</strong> There were some problems with your input.<br><br> 
<ul> 

@foreach ($errors->all() as $error) 
<li>{{ $error }}</li> 
@endforeach 
</ul> 
</div> 
@endif 

<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data"> 
@csrf 
<div class="row"> 
<div class="col-xs-12 col-sm-12 col-md-12"> 
<div class="form-group"> 
<strong>Title:</strong> 
<?php $id = Session::get ('id'); ?>
<input type="text" name="user_id" value="<?=$id?>" hidden> 

<input type="text" name="title" class="form-control" placeholder="Title">
</div> 
</div> 
<div class="col-xs-12 col-sm-12 col-md-12"> 
<div class="form-group"> 
<strong>Content:</strong> 
<textarea class="form-control" style="height:10px" name="content" placeholder="Content"></textarea> 
<div class="relative flex items-center min-h-screen justify-center overflow-hidden">
            <form action="{{ route('image.store') }}" method="POST" class="shadow p-12" enctype="multipart/form-data">
                @csrf
                <label class="block mb-4">
                    <span class="sr-only">Choose File</span>
                    <input type="file" name="image"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                    @error('image')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </label>
                <!-- <button type="submit" class="px-4 py-2 text-sm text-white bg-indigo-600 rounded">Submit</button> -->
            </form>
        </div>

</div> 
</div> 
<div class="col-xs-12 col-sm-12 col-md-12 text-center"> 
<button type="submit" class="btn btn-primary">Submit</button> 
</div> 
</div> 
</form> 
@endsection