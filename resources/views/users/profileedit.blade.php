@extends('layout.app')

@section('content')
<div class="container flex w-full  px-5 ">

    <div class="bg-green w-1/2">
        <div class="container mx-auto">
            <div class="flex flex-col items-center">
             <form action="{{ route('users.show' , $user->id) }}" method="POST">
                @csrf
                @method('put')
              <div class="flex flex-row justify-between w-full">
                <div class="flex flex-col">
                  <div class="col-md-6">
                    <label for="name">名前</label>
                    <input type="name" class="form-control" id="name" value="{{ $user->name }}" name="name">
                  </div>
                </div>
              </div>
              <div class="mt-4 w-full">
                <div class="flex flex-col">
                  <div class="col-md-6">
                    <label for="email">メールアドレス</label>
                    <input type="email" class="form-control" id="email" value="{{ $user->email }}" name="email">
                  </div>
                </div>
                <div class="mt-2">
                  <div class="col-md-6">
                    <label for="bio">自己紹介</label>
                    <textarea class="form-control" id="bio" rows="5" name='bio'>{{ $user->bio }}</textarea>
                  </div>
                </div>
                <div class="mt-2">
                  <div class="col-md-6">
                    <label for="languages">得意な言語</label>
                    <input type="text" class="form-control" id="languages" value="{{ $user->languages }}" >
                  </div>
                </div>
                <div class="mt-2">
                  <div class="col-md-6">
                    <label for="learning_languages">学習中の言語</label>
                    <input type="text" class="form-control" id="learning_languages" value="{{ $user->learning_languages }}">
                  </div>
                </div>
                <div class="mt-2">
                   <div class="col-md-6">
                    <label for="career">経歴</label>
                    <textarea class="form-control" id="career" rows="5" name='career'>{{ $user->career }}</textarea>
                   </div>
                   <div class="col-md-6 text-center">
                    {{-- <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">更新</a> --}}
                   <button type="submit" class="btn btn-pri">更新</button>
                   </div> 
                </div>
              </div>
             </form> 
            </div>
          </div> 
          
        
    </div>
@endsection