
@extends('layout.main')
<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">{{Auth()->user()->profile->nama_lengkap}}</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="{{url('/profile')}}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Data User</span>
				</a>
			</li>
			<li>
				<a href="{{url('/Pertanyaan')}}">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Data Pertanyaan</span>
				</a>
			</li>
			<li>
				<a href="{{url('/jawaban')}}">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Data Jawaban</span>
				</a>
			</li>
			<li class="active">
				<a href="{{url('/media')}}">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Data perpustakaan</span>
				</a>
			</li>
			<li>
				<a href="{{url('/forum')}}">
					<i class='bx bxs-group' ></i>
					<span class="text">Kembali ke Forum</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
@section('content')

    @if(session()->has('message'))
        <p>{{ session()->get('message') }}</p>
    @endif
<div class="card">
    <div class="card-header">
    <form class="responsive" action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="group">
             <label for="file">Upload File</button></label>
           <input type="file" id="file" name="file">
            @if($errors->has('file'))
                <small class="error">{{ $errors->first('file') }}</small>
            @endif
        </div>
        <div class="group">
            <button class="save btn btn-success">Upload</button>
        </div>
    </form>
    <div class="card-body">
        <p>Cari Data Kitab :</p>
	<form class ="input-group mb-3 "action="/media/cari" method="GET">
		<input type="text"  class="form-control" name="cari" aria-describedby="button-addon2" placeholder="search Media .." value="{{ old('cari') }}">
		 <button class="btn btn-primary" id="button-addon2">CARI</button>
    </form>
    <table class="table table-bordered table-responsive ">
    
        <thead>
            <tr>
                <td  width="100%">File</td>
                <td width="100%">Download</td>
                <td width="1005">Tindakan</td>
            </tr>
        </thead>
        <tbody>
            @if($medias->count())
                @foreach($medias as $media)
                    <tr>
                        <td>
                            <div>Nama: {{ $media->name }}</div>
                            <div>File: {{ $media->file }}</div>
                            <div>Ekstensi: {{ $media->extension }}</div>
                            <div>Ukuran: {{ $media->size }}</div>
                            <div>Mime: {{ $media->mime }}</div>
                        </td>
                        <td align="center"><button type="button" class="btn btn-dark"><a href="{{ url('uploads/' . $media->file) }}" download>Download</a></button></td>
                        <td align="center">
                            <button class="submit btn badge-danger" form="delete-file" onclick="return confirm('Apakah anda yakin ingin menghapus file?')">Hapus</button>
                            <form action="{{ route('media.destroy', $media->id) }}" method="post" id="delete-file">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td align="center" colspan="3">Belum ada file</td>
                </tr>
            @endif
        </tbody>
    </table>
    <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right text-secondary">
                    {{$medias->links()}}
                    </ul>
                </div>
</div>

    </div>
    
</div>
@endsection