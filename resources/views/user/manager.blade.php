@extends('layout.home')

@section('title')
    <h1>EDIT TABLE PROFILE</h1>
@endsection
@section('content')

<main class="main">

<header class="header">
    
    <div class="header__wrapper">
    <form action="/forum/question"   class="search" method="GET">
        
        <button class="search__button focus--box-shadow" type="submit" >
        <svg
            class="search__icon"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
        >
            <path
            d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z"
            />
        </svg>
        </button>
        <input
        class="search__input focus--box-shadow"

        type="text"
        name="question"
        placeholder="Cari Pertanyaan"
        value="{{ old('question') }}"
        />
    </form>
    <div class="profile">
        <button class="profile__button">
        <span class="profile__name"> {{ Auth::user()->name }}</span>
        <img
            class="profile__img"
            src="{{ Auth::user()->profile->getAvatar() }}"
            alt="Profile picture"
            loading="lazy"
        />
        </button>
    </div>
    </div>
</header>
    <section class="section">
                        
        <div class="project">
            <div class="project__item">
                <br>
                <h2>Profile Anda</h2>
                <br>
                    <div class="card card-success card-outline">
                        <div class="text-center  ">
                            <div class="pt-2 mt-2">
                                <img src="{{ Auth::user()->profile->getAvatar() }}" class="img-fluid  img-thumbnail img-responsive  rounded mb-4"  width="270"alt="User Image">
                            </div>
                    
                        </div>
                        
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="/manager/{{$user->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputEmail1">username</label>
                        <input type="text" class="form-control  @error('username') is-invalid @enderror" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan nama profile"
                        value="{{$user->name}}">
                        @error('username')
                        <div class="invalid-feedback mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">nama profile</label>
                        <input type="text" class="form-control  @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan nama profile" value="{{$user->profile->nama_lengkap}}">
                        @error('nama_lengkap')
                        <div class="invalid-feedback mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">email</label>
                        <input  type="text" class="form-control  @error('email') is-invalid @enderror" name="email" id="exampleInputPassword1" placeholder="Masukan pertanyaan"
                        value="{{$user->email}}" disabled>
                        @error('email')
                        <div class="invalid-feedback mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">Ganti Foto profile</label>
                        <input type="file" class="form-control  @error('foto') is-invalid @enderror" name="foto" id="exampleInputPassword1" placeholder="masukan judul" value="">
                        @error('foto')
                        <div class="invalid-feedback mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    {{--  <div class="form-group">
                        <label for="exampleInputPassword1">password baru</label>
                        <input type="text" class="form-control  @error('password') is-invalid @enderror" name="password" id="exampleInputPassword1" placeholder="pasword baru" value="">
                        @error('password')
                        <div class="invalid-feedback mt-2">{{ $message }}</div>
                        @enderror
                    </div>--}}
                        </div>
                            
                            <div class="modal-footer">
                                <a href="/forum" type="button" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">simpan</button>
                            </div>
                            </form>
                        </div>
                <!-- /.card-body -->
                        
            </div>
        </div>
   
    
    </section>
</main>
<div class="mobile-display">
<aside class="aside">
        <section class="section">
          <div class="aside__control">
            <button
              class="aside__button focus--box-shadow"
              type="button"
              aria-label="Close profile settings"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                role="presentation"
              >
                <path
                  d="M17,11H9.41l3.3-3.29a1,1,0,1,0-1.42-1.42l-5,5a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l5,5a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L9.41,13H17a1,1,0,0,0,0-2Z"
                />
              </svg>
            </button>
            <button
              class="aside__button aside__button--notification focus--box-shadow"
              type="button"
              aria-label="You have new feedback"
              
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                role="presentation"
              >
                <path
                  d="M18,13.18V10a6,6,0,0,0-5-5.91V3a1,1,0,0,0-2,0V4.09A6,6,0,0,0,6,10v3.18A3,3,0,0,0,4,16v2a1,1,0,0,0,1,1H8.14a4,4,0,0,0,7.72,0H19a1,1,0,0,0,1-1V16A3,3,0,0,0,18,13.18ZM8,10a4,4,0,0,1,8,0v3H8Zm4,10a2,2,0,0,1-1.72-1h3.44A2,2,0,0,1,12,20Zm6-3H6V16a1,1,0,0,1,1-1H17a1,1,0,0,1,1,1Z"
                />
                 
              </svg>
             
            </button>
          </div>
          <div class="profile-main">
            <button
              class="profile-main__setting focus--box-shadow"
              type="button"
            >
              <img
                
               src="{{asset('Admin/images/nu.jpg')}}"
               alt="Jessica's photo"
               width="200"
               height="200"
              /> 
            </button>
          
            <h1 class="profile-main__name">Forum Diskusi NU</h1>
          </div>
          <hr>
        
         
          <ul class="statistics">
            <li class="statistics__entry">
              <a class="statistics__entry-description" href="#">Whatsapp</a
              ><span class="statistics__entry-quantity"><a href="https://wa.me/6285866714337?text=Assalamualaikum"> <img src="https://img.icons8.com/color/48/000000/whatsapp--v3.png"/></a></span>
            </li>
            <li class="statistics__entry">
              <a class="statistics__entry-description" href="#">Youtube</a
              ><span class="statistics__entry-quantity"><img src="https://img.icons8.com/color/48/000000/youtube-play.png"/></span>
            </li>
            <li class="statistics__entry">
              <a class="statistics__entry-description" href="#">Instagram</a
              ><span class="statistics__entry-quantity"><img src="https://img.icons8.com/cute-clipart/48/000000/instagram-new.png"/></span>
            </li>
          </ul>
          <div class="banner">
            <p class="banner__description">Tanyakan Masalah Agamamu</p>
            <a href="/forum/create" ><button class="banner__button" type="button"> 
              Tanya
             
            </button> </a>
          </div>
        </section>
      </aside>
</div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

        </div>
    </div>
    </div>
@endsection
