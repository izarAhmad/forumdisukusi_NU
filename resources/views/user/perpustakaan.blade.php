@extends('layout.home')
@section('content')
    <main class="main"> 
        <header class="header">    
          <div class="header__wrapper">
            <form action="/perpustakaan/search"   class="search" method="GET">   	
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
                name="search"
                placeholder="Cari Kitab"
                value="{{ old('search') }}"
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
        <br>
        <h2>File Kitab</h2>
        <br>
        <section class="section">
            <div class="project">
                 <div class="project__item">
                     <div class="card card-success card-outline">
                        <div class="card-body">
                          <table class="table table-bordered table-responsive">
                              <thead>
                                  <tr>
                                      <th width="100%">Nama Kitab</th>
                                      <th  width="100%">Download</th>   
                                  </tr>
                              </thead>
                              <tbody>
                                  @if($medias->count())
                                      @foreach($medias as $media)
                                          <tr> 
                                              <td>  {{ $media->name }}</td>
                                              <td align="center"><a href="{{ url('uploads/' . $media->file) }}" download><img src="https://img.icons8.com/external-wanicon-lineal-color-wanicon/50/000000/external-download-seo-and-web-wanicon-lineal-color-wanicon.png"/></a></</td>  
                                          </tr>
                                      @endforeach
                                  @else
                                      <tr>
                                          <td align="center" colspan="3">Belum ada file</td>
                                      </tr>
                                  @endif
                              </tbody>
                          </table>
                      
                        </div>

                            <div class="card-footer clearfix">
                                            <ul class="pagination pagination-sm m-0 float-right text-secondary">
                                            {{$medias->links()}}
                                            </ul>
                              </div>
                      </div>
                    </div>
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
            </button> 
            </a>
          </div>
        </section>
      </aside>
        </div>
@include('sweetalert::alert')
@endsection