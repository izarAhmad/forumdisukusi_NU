@extends('layout.home')
@section('header')
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
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
                 <a
              href="/manager/{{Auth::user()->id}}/edit"
                <span class="profile__name"> {{ Auth::user()->name }}</span>
                 </a>

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
         <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>{{Auth::user()->count()}}</h1>
                        <span>Member</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                      </svg>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>{{ $count->count()}}</h1>
                        <span>Pertanyaan</span>
                    </div>
                    <div>
                      
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-patch-question" viewBox="0 0 16 16">
                    <path d="M8.05 9.6c.336 0 .504-.24.554-.627.04-.534.198-.815.847-1.26.673-.475 1.049-1.09 1.049-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.71 1.71 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745z"/>
                    <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
                    <path d="M7.001 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0z"/>
                  </svg>    
                        
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>{{ $jawaban->count() }}</h1>
                        <span>Pertanyaan Sudah Dijawab</span>
                    </div>
                    <div>
                        <img src="https://img.icons8.com/external-bearicons-glyph-bearicons/64/ffffff/external-faq-frequently-asked-questions-faq-bearicons-glyph-bearicons-2.png"/>
                    </div>
                </div>

                
            </div>
        <section class="section">
         
          <header class="section__header">
            <h2 class="section__title">Tanya Yuk</h2>
            <div class="section__control">
              
              <button
              
                class="section__button section__button--painted focus--box-shadow"
                type="button"
                aria-label="Add New project"
              >
              <a href="/forum/create" type="submit">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  role="presentation"
                >
                  <path
                    d="M19,11H13V5a1,1,0,0,0-2,0v6H5a1,1,0,0,0,0,2h6v6a1,1,0,0,0,2,0V13h6a1,1,0,0,0,0-2Z"
                  />
                </svg>
              </a>
              </button>
            </div>
          </header>
          
          <ul class="project">
            @foreach ($pertanyaan as $tanya)
             <li class="project__item">
              <a href="/forum/show/{{$tanya->id}}" class="project__link focus--box-shadow">
                <div class="project__wrapper">
                  <div class="project__element project__icon">
                    <div
                      class="icon icon--rajah"
                      aria-label="Icon for the project 'Book cover design'"
                    >
                      <img src="https://img.icons8.com/external-bearicons-glyph-bearicons/64/000000/external-question-frequently-asked-questions-faq-bearicons-glyph-bearicons-4.png"
                        viewBox="0 0 24 24"
                        role="presentation"
                      >
                        <path
                          d="M15,6H9A1,1,0,0,0,8,7v4a1,1,0,0,0,1,1h6a1,1,0,0,0,1-1V7A1,1,0,0,0,15,6Zm-1,4H10V8h4Zm3-8H5A1,1,0,0,0,4,3V21a1,1,0,0,0,1,1H17a3,3,0,0,0,3-3V5A3,3,0,0,0,17,2Zm1,17a1,1,0,0,1-1,1H6V4H17a1,1,0,0,1,1,1Z"
                        />
                      </svg>
                    </div>
                  </div>
                  <div class="project__element project__inform">
                    <span class="project__inform-name">{{$tanya->judul}}</span>
                    <p>{{$tanya->user->name}}</p>
                  </div>
                  <div class="project__element project__photo">
                    
                    <ul class="photo">
                      
                      <li class="photo__item">
                        <img src="{{$tanya->user->profile->getAvatar()}}"
                          alt="profile"
                        />
                      </li>
                    </ul>
                  </div>
                  <div class="project__element project__date">
                    <time class="date" datetime="2020-05-05T10:00:00"
                      >Di tanya {{$tanya->created_at->diffForHumans()}}</time
                    >
                  </div>
                  <div class="project__element project__status">
                    <span class="status status--published"><i class="far fa-comment ml-2"></i> {{$tanya->jawaban->count()}}</span>
                  </div>
                  <div class="project__element project__setting">
                    <button
                      class="setting setting--rotate focus--box-shadow"
                      type="button"
                    >
                      <svg
                        enable-background="new 0 0 515.555 515.555"
                        height="512"
                        viewBox="0 0 515.555 515.555"
                        width="512"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="m303.347 18.875c25.167 25.167 25.167 65.971 0 91.138s-65.971 25.167-91.138 0-25.167-65.971 0-91.138c25.166-25.167 65.97-25.167 91.138 0"
                        />
                        <path
                          d="m303.347 212.209c25.167 25.167 25.167 65.971 0 91.138s-65.971 25.167-91.138 0-25.167-65.971 0-91.138c25.166-25.167 65.97-25.167 91.138 0"
                        />
                        <path
                          d="m303.347 405.541c25.167 25.167 25.167 65.971 0 91.138s-65.971 25.167-91.138 0-25.167-65.971 0-91.138c25.166-25.167 65.97-25.167 91.138 0"
                        />
                        
                      </svg>
                    </button>
                  </div>
                </div>
              </a>
            </li>
            @endforeach
          </ul>
         <br>
                    <ul class="pagination pagination-sm m-0 float-right text-secondary">
                    {{$pertanyaan->links()}}
                    </ul>
                
                </section>
      </main>
        
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
               alt="NU"
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
