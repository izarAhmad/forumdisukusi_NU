@extends('layout.main')
@section('header')
<script src="https://cdn.tiny.cloud/1/ww3b1mbzh7h81ythi8uxn2ngykqtf5idot9ycql9y71j4qg5/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection
@section('title')
    <h1>DATA TABLE JAWABAN</h1>
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
			<li >
				<a href="{{url('/Pertanyaan')}}">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Data Pertanyaan</span>
				</a>
			</li>
			<li class="active">
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

    <div class="card">
                <div class="card-header">
                    <button class="btn  btn-primary"  data-toggle="modal" data-target="#exampleModal">Tambah data [+]</button>
                      <a href="/exportJawaban" class="btn btn-danger btn-sm ml-5">Export PDF</a>
                    <a href="/ExcelJawaban" class="btn btn-success mr-2 btn-sm">Export Excel</a>
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
                    <table class="table table-responsive">
                    <thead>
                        <tr>
                        <th style="width: 10px">no</th>
                        <th>Nama User</th>
                        <th>judul</th>
                        <!-- <th>Pertanyaan</th> -->
                        <th>Jawaban</th>
                        <th style="width: 400px" >Tags</th>
                        <th style="width: 280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($jawaban as $jwb)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$jwb->user->profile->nama_lengkap}}</td>
                            <td>{!!$jwb->pertanyaan->judul!!}</td>
                            <!-- <td>{!!$jwb->pertanyaan->isi!!}</td> -->
                            <td>{!!$jwb->isi!!}</td>
                            <td>
                                @foreach ($jwb->pertanyaan->tags as $tag)
                                <button class="btn btn-primary btn-sm">{{$tag->tag_name ? $tag->tag_name:'No tags' }}</button>
                                @endforeach
                            </td>
                        <td>
                            <a href="jawaban/{{$jwb->id}}/edit" class="btn  btn-primary">UPDATE</a>
                            <form action="/hapus/{{$jwb->id}}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                            <button  class="submit btn badge-danger">hapus </button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right text-secondary">
                        {{$jawaban->links()}}
                    </ul>
                </div>
                </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Jawaban</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="jawaban" method="POST">
        @csrf
        <div class="form-group @error('profile') is-invalid @enderror">
            <label for="inputGroupSelect01">nama profile</label>
            <select name="profile" id="inputGroupSelect01" class="form-control">
            @foreach ($profile as $prof)
                <option value="{{$prof->id}}">{{$prof->nama_lengkap}}</option>
            @endforeach
            </select>
            @error('profile')
            <div class="invalid-feedback mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group @error('Pertanyaan') is-invalid @enderror">
            <label for="inputGroupSelect01">Pertanyaan</label>
            <select name="pertanyaan" id="inputGroupSelect01" class="form-control">
            @foreach ($pertanyaan as $per)
                <option value="{{$per->id}}">{!!$per->isi!!}</option>
            @endforeach
            </select>
            @error('Pertanyaan')
            <div class="invalid-feedback mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Jawaban</label>
            <textarea type="Jawaban" class="form-control  @error('Jawaban') is-invalid @enderror" name="Jawaban" id="exampleInputPassword1" placeholder="masukan Jawaban"></textarea>
            
            @error('Jawaban')
            <div class="invalid-feedback mt-2">{{ $message }}</div>
            @enderror
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


