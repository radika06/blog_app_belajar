@extends('admin.master') 
@section('content')
<div class="row mt-5 mb-5"> 
<div class="col-lg-12 margin-tb"> 
<div class="float-left"> 
<h2>Admin Approve</h2>  
</div> 
</div> 
</div> 
@if ($message = Session::get('success')) 
<div class="alert alert-success"> 
<p>{{ $message }}</p> 
</div> 
@endif 
<table class="table table-bordered"> 
<tr> 
<th width="10px" class="text-center">No</th> 
<th>Nama</th> 
<th>Comment</th>
<!-- <th>Action</th> -->
<th width="200px"class="text-center">Action</th> 
</tr> 
@foreach ($posts as $post) 
<tr>
<td>{{ $post->id }}</td> 
<td>{{ $post->name }}</td> 
<td>{{ $post->comment }}</td>
<!-- <td>{{ $post->content }}</td>  -->
<td class="text-center"> 
<form action="{{ route('posts.destroy',$post->id) }}" method="POST"> 
<a class="btn btn-info btn-sm" href="{{ route('posts.show',$post->id) }}">Approve</a> 
<a class="btn btn-primary btn-sm" href="{{ route('posts.update',$post->id) }}">Reject</a> 
@csrf 
<!-- @method('DELETE') 
<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button> --> 
</form> 
</td> 
</tr> 
@endforeach 
</table> 

{!! $posts->links() !!} 
@endsection