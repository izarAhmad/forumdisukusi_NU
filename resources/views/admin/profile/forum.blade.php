@extends('layout.main')
<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">{{Auth()->user()->profile->nama_lengkap}}</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
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

       <!-- main -->

            <main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				<!-- <a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a> -->
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>1020</h3>
						<p>New Order</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>{{Auth::user()->count()}}</h3>
						<p>User</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>$2543</h3>
						<p>Total Sales</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Orders</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table class="table table-responsive">
						<thead>
							<tr>
								<th>No</th>
								<th>Foto</th>
								<th>Username</th>
								<th>Email</th>
                                <!-- <th>Role</th> -->
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($user as $pro)

						<tr>
							<td>{{$loop->iteration}}</td>
							<td><img src="{{$pro->profile->getAvatar() }}"class=" img-circle img-size-40  mr-2  " alt="user-image"></td>
							<td>{{$pro->name}}</td>
							<td>{{$pro->email}}</td>
							<!-- <td>{{$pro->role}}</td> -->
							
							<td><a  href="profile/{{$pro->id}}"><span class="status completed">Show</span></a>
							<a  href="profile/{{$pro->id}}/edit"><span class="status process ">Edit</span></a>
							
							
								<form action="profile/{{$pro->id}}" method="POST" class="d-inline">
									@method('delete')
									@csrf
									<button class="status pending">Hapus</button>
								</form>
							<td>
						</tr>
								@endforeach
						</tbody>
					</table>
				</div>
                
				<ul class="pagination pagination-sm m-0 float-right text-secondary">
                    {{$user->links()}}
                    </ul>
			</div>
		</main>
  
    @include('sweetalert::alert')
@endsection
