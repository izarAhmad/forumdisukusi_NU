@extends('layout.home')
@section('header')

<script src="https://cdn.tiny.cloud/1/ww3b1mbzh7h81ythi8uxn2ngykqtf5idot9ycql9y71j4qg5/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
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
         <ul class="project">
             <li class="project__item">
    
        <div class="card-header">
            <h3 class="card-title text-dark">Masukan pertanyaan anda</h3>
        </div>
       
<div class="card card-success card-outline">
   <div class="card">
        <!-- /.card-header -->
        <!-- form start -->
        <form action="/forum/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                 <div class="form-group">
                     <label for="judul">Masukan judul</label>
                    <input type="text" class="form-control  @error('judul') is-invalid @enderror" name="Judul" placeholder="masukan judul" id="judul">
                </div>
                <div class="form-group">
                        <label for="exampleInputPassword1">Masukan pertanyaan anda</label>
                        <textarea name="isi" id="isi" class="form-control my-editor"></textarea>
                        @error('isi')
                        <div class="invalid-feedback mt-2">{{ $message }}</div>
                        @enderror
                        
                    </div>
                <a href="/forum" type="submit" class="btn btn-light mt-3">kembali</a>
                <button type="submit" class="btn btn-light mt-3">Submit</button>
            </div>
            <!-- /.card-body -->
        </form>
         </div>
        </div>
             </li>
         </ul>
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
               alt=""
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

@endsection
@section('footer')
<script>
        var editor_config = {
        path_absolute : "/",
        selector: "#isi",
        plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed paste image dropped file pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media',
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        if (type == 'image') {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.open({
            file : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no"
        });
        }
    };

    tinymce.init(editor_config);
    </script>
@endsection
