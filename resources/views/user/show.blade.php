    @extends('layout.home')
    @section('title')
        <title>forum diskusi</title>
    @endsection
    @section('header')
      <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
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
                   <h2 class="section__title">Pertanyaan :</h2>
                   <br>
                   
    <div class="card card-widget card-success card-outline">
                <div class="card-header">
                    <div class="user-block">
                    <img class="img-circle" src="{{$pertanyaan->user->profile->getAvatar()}}" alt="User Image">
                    <span class="username"><a href="#">{{$pertanyaan->user->profile->nama_lengkap}}</a></span>
                    <span class="description">{{$pertanyaan->created_at->diffForHumans()}}</span>
                    </div>
                    <!-- /.user-block -->
                    <?php $if_null = App\Models\Pertanyaan::where('user_id','=', $pertanyaan->user->id)->first() ?>
                    @if ($if_null->user_id==Auth::user()->id || Auth::user()->role === 'admin')
                    <div class="card-tools">
                    <div class="btn-group">
                        <button type="button" class="btn btn-tool dropdown-toggle text-dark" data-toggle="dropdown">
                        <i class="fas fa-wrench"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                        <a href="/forum/edit/{{$pertanyaan->id}}" class="dropdown-item">Edit</a>
                        <form action="/forum/hapus/{{$pertanyaan->id}}" method="POST">
                            @csrf
                            <input type="submit" value="Delete" class="dropdown-item btn btn-light btn-sm">
                        </form>
                        </div>
                    </div>
                    </div>
                    @else

                    @endif
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- post text -->
                    <p>{!!$pertanyaan->isi!!}</p>
                    <!-- Attachment -->
                    <!-- /.attachment-block -->

                    
                </div>
            </div>    
            <h2>Jawaban :</h2>
            
            <br>

@foreach ($pertanyaan->jawaban as $jwb)

        <div class="card card-widget card-success card-outline">
                <div class="card-header">
                    <div class="user-block">
                    <img class="img-circle" src="{{$jwb->user->profile->getAvatar()}}" alt="User Image">
                    <span class="username"><a href="#">{{$jwb->user->profile->nama_lengkap}}</a></span>
                    <span class="description">{{$jwb->created_at->diffForHumans()}}</span>
                    </div>
                    <!-- /.user-block -->
                    <?php $if_null = App\Models\jawaban::where('user_id','=', $jwb->user->id)->first() ?>
                    @if ($if_null->user_id==Auth::user()->id || Auth::user()->role == 'admin')
                    <div class="card-tools">
                    <div class="btn-group">
                        <button type="button" class="btn btn-tool dropdown-toggle text-dark" data-toggle="dropdown">
                        <i class="fas fa-wrench"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                        <a href="/forum/edit2/{{$jwb->id}}" class="dropdown-item">Edit</a>
                        </form>
                        <form action="/forum/hapus/{{$jwb->id}}" method="POST">
                            @method('delete')
                            @csrf
                            <input type="submit" value="Delete" class="dropdown-item btn btn-light btn-sm">
                        </form>
  </div>
                        </div>
                    </div>
                   @else
                   
                    @endif
                 
                      
                    
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- post text -->
                 
                     
                    <p> {!!$jwb->isi!!} </p>
                     
                   
                   
                    
                </div>
                
            </div>
                 </div>
                 </div>
        </section>
       
@endforeach

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
               alt="nu"
               width="200"
               height="200"
               
              /> 
            </button>
             
            <h1 class="profile-main__name">Forum Diskusi NU</h1>
            <hr>
          <div class="banner">
            <p class="banner__description">Tanyakan Masalah Agamamu</p>
            <a href="/forum/create" ><button class="banner__button" type="button"> 
              Tanya
             
            </button> </a>
          </div>
          </div>
          
        </section>
      </aside>
</div>

    @endsection
@section('footer')
    <script>
     var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
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
