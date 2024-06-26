
@extends('layout.app')

@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>{{ $user->name }}</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">編集</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email">メールアドレス</label>
                            <input type="email" class="form-control" id="email" value="{{ $user->email }}" readonly>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="bio">自己紹介</label>
                            <textarea class="form-control" id="bio" rows="5" readonly>{{ $user->bio }}</textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="languages">得意な言語</label>
                            <input type="text" class="form-control" id="languages" value="{{ $user->languages }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="learning_languages">学習中の言語</label>
                            <input type="text" class="form-control" id="learning_languages" value="{{ $user->learning_languages }}" readonly>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="career">経歴</label>
                            <textarea class="form-control" id="career" rows="5" readonly>{{ $user->career }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">プロフィール画像</div>
                <div class="card-body">
                    <img src="{{ asset('storage/' . $user->profile_image) }}" class="img-fluid rounded-circle" alt="プロフィール画像">
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container flex w-full  px-5 ">

    <div class="bg-green w-1/2">
        <div class="container mx-auto">
            <div class="flex flex-col items-center">
              <div class="flex flex-row justify-between w-full">
                <div class="flex flex-col">
                  <div class="col-md-6">
                    <h2>{{ $user->name }}</h2>
                  </div>
                </div>
              </div>
              <div class="mt-4 w-full">
                <div class="flex flex-col">
                  <div class="col-md-6">
                    <label for="email">メールアドレス</label>
                    <input type="email" class="form-control" id="email" value="{{ $user->email }}" readonly>
                  </div>
                </div>
                <div class="mt-2">
                  <div class="col-md-6">
                    <label for="bio">自己紹介</label>
                    <textarea class="form-control" id="bio" rows="5" readonly>{{ $user->bio }}</textarea>
                  </div>
                </div>
                <div class="mt-2">
                  <div class="col-md-6">
                    <label for="languages">得意な言語</label>
                    <input type="text" class="form-control" id="languages" value="{{ $user->languages }}" readonly>
                  </div>
                </div>
                <div class="mt-2">
                  <div class="col-md-6">
                    <label for="learning_languages">学習中の言語</label>
                    <input type="text" class="form-control" id="learning_languages" value="{{ $user->learning_languages }}" readonly>
                  </div>
                </div>
                <div class="mt-2">
                   <div class="col-md-6">
                    <label for="career">経歴</label>
                    <textarea class="form-control" id="career" rows="5" readonly>{{ $user->career }}</textarea>
                   </div>
                </div>
              </div>
            </div>
          </div>
          
        
    </div>

    <div class="bg-blue w-1/2">
        <div class="container mx-auto p-8">
            <h1 class="text-4xl font-bold mb-8 text-center">Software Skills</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
              <div class="flex flex-col items-center border border-gray-200 rounded-lg p-4">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/Adobe_XD_logo.svg/1200px-Adobe_XD_logo.svg.png" alt="Adobe XD" class="w-16 h-16 mb-2">
                <p class="text-lg font-medium text-center">Adobe XD</p>
              </div>
              <div class="flex flex-col items-center border border-gray-200 rounded-lg p-4">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a8/HTML5_logo.svg/1200px-HTML5_logo.svg.png" alt="HTML5" class="w-16 h-16 mb-2">
                <p class="text-lg font-medium text-center">HTML5</p>
              </div>
              <div class="flex flex-col items-center border border-gray-200 rounded-lg p-4">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/CSS3_logo.svg/1200px-CSS3_logo.svg.png" alt="CSS3" class="w-16 h-16 mb-2">
                <p class="text-lg font-medium text-center">CSS3</p>
              </div>
              <div class="flex flex-col items-center border border-gray-200 rounded-lg p-4">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ab/JavaScript_logo.svg/1200px-JavaScript_logo.svg.png" alt="JavaScript" class="w-16 h-16 mb-2">
                <p class="text-lg font-medium text-center">JavaScript</p>
              </div>
              <div class="flex flex-col items-center border border-gray-200 rounded-lg p-4">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/28/Python_logo.svg/1200px-Python_logo.svg.png" alt="Python" class="w-16 h-16 mb-2">
                <p class="text-lg font-medium text-center">Python</p>
              </div>
              <div class="flex flex-col items-center border border-gray-200 rounded-lg p-4">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Java_logo.svg/1200px-Java_logo.svg.png" alt="Java" class="w-16 h-16 mb-2">
                <p class="text-lg font-medium text-center">Java</p>
              </div>
              <div class="flex flex-col items-center border border-gray-200 rounded-lg p-4">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/Git_logo.svg/1200px-Git_logo.svg.png" alt="Git" class="w-16 h-16 mb-2">
                <p class="text-lg font-medium text-center">Git</p>
              </div>
              </div>
            </div>
         </div>
    </div>

   <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
     <div class="flex flex-wrap -m-4">

    @foreach ($portfolios as $portofolio)
   
    <div class="lg:w-1/3 md:w-1/2 p-4">
          <a class="block relative h-48 rounded overflow-hidden">
            <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="https://dummyimage.com/420x260">
          </a>
          <div class="mt-4">
            <h2 class="text-gray-900 text-xs tracking-widest title-font mb-1">{{ $portofolio['title'] }}</h2>
            <h2 class="text-gray-600 title-font text-lg font-medium">{{ $portofolio['description'] }}</h2>
          </div>
        </div>
        @endforeach
     </div>
    </div>
   </section>
</div>
@endsection

{{ $portofolio['title'] }}

{{ $user['name'] }}
