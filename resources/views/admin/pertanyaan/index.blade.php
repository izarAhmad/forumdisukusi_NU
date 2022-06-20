@extends('layout.main')

@section('title')
    <h1>DATA TABLE PERTANYAAN</h1>
@endsection
@section('header')
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
@endsection
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
			<li class="active">
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
			<li>
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
<nav>
    <i class='bx bx-menu' ></i>
			<a href="#" class="nav-link ">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="{{ Auth::user()->profile->getAvatar() }}">
			</a>
            <small> {{ Auth::user()->name }}</small>
		</nav>
    <main>
                <div class="card-header">
                    <button class="btn  btn-primary"  data-toggle="modal" data-target="#exampleModal">Tambah data [+]</button>
                    <a href="/exportPertanyaan" class="btn btn-danger btn-sm ml-5">Export PDF</a>
                    <a href="/ExcelPertanyaan" class="btn btn-success mr-2 btn-sm">Export Excel</a>
                    <div class="float-right">
                    @if (session('sukses'))
                    <div class="alert alert-success" style="margin-top: -8%">
                    {{ session('sukses') }}
                    </div>
                    @endif
                    @if (session('eror'))
                    <div class="alert alert-danger" style="margin-top: -8%">
                    {{ session('eror') }}
                    </div>
                    @endif
                    </div>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                        <th style="width: 10px">no</th>
                        <th>Nama </th>
                        <th>judul Pertanyaan</th>
                        <!-- <th>Pertanyaan</th> -->
                        <th style="width: 280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($pertanyaan as $per)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$per->user->profile->nama_lengkap}}</td>
                        <td>
                            {{$per->judul}}
                        </td>
                        <!-- <td>{!!$per->isi!!}</td> -->
                        <td>
                            <a href="Pertanyaan/{{$per->id}}" class="btn  btn-success">SHOW</a>
                            <a href="Pertanyaan/{{$per->id}}/edit" class="btn  btn-primary">UPDATE</a>
                            <form action="Pertanyaan/{{$per->id}}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                            <button  class="submit btn btn-danger">hapus </button>
                            </form>
                        </td>

                    @endforeach
                        </tr>
                    </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right text-secondary">
                    {{$pertanyaan->links()}}
                    </ul>
                </div>
</main>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah pertanyaan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="Pertanyaan" method="POST">
        @csrf
        <div class="form-group @error('profile') is-invalid @enderror">
            <label for="inputGroupSelect01">nama profile</label>
            <select name="profile" id="inputGroupSelect01" class="form-control">
            @foreach ($user as $prof)
                <option value="{{$prof->id}}">{{$prof->profile->nama_lengkap}}</option>
            @endforeach
            </select>
            @error('profile')
            <div class="invalid-feedback mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Pertanyaan</label>
            <input type="text" class="form-control  @error('judul') is-invalid @enderror" name="judul" id="exampleInputPassword1" placeholder="Masukan pertanyaan">
            @error('judul')
            <div class="invalid-feedback mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">isi</label>
            <textarea name="isi" class="form-control" id="isi">{!! old('isi', $isi ?? '') !!}</textarea>
            @error('isi')
            <div class="invalid-feedback mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="tags">tags</label>
            <input type="text" class="form-control" id="tags" name="tags" value="{{old('tags','')}}" placeholder="berita terkini">
        </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">back</button>
            <button type="submit" class="btn btn-primary">simpan</button>
        </div>
        </form>
        </div>
    </div>
    </div>
@include('sweetalert::alert')
@endsection


