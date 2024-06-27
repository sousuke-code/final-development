@extends('layout.header')

@section('content')


    <div class="bg-green w-1/2">
          <div class="flex justify-center mt-20 px-8 ">
            <form class="max-w-2xl" action="{{ route('users.update' , ['user'=>$user->id]) }}" method="POST">
              
              @csrf
              @method('put')
                <div class="flex flex-wrap border shadow rounded-lg p-3 dark:bg-gray-600">
                    <h2 class="text-xl text-gray-600 dark:text-gray-300 pb-2">アカウント情報</h2>
        
                    <div class="flex flex-col gap-2 w-full border-gray-400">
        
                        <div>
                            <label class="text-gray-600 dark:text-gray-400" for="name">名前
                            </label>
                            <input
                                class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow dark:bg-gray-600 dark:text-gray-100"
                                type="name" id="name" placeholder="{{ $user->name }}" name="name" value="{{ $user->name }}">
                        </div>
        
                        <div>
                            <label class="text-gray-600 dark:text-gray-400" for="email">メールアドレス</label>
                            <input
                                class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow dark:bg-gray-600 dark:text-gray-100"
                                type="email" id="email" name="email" placeholder="{{$user->email}}" value="{{ $user->email }}">
                        </div>
        
                        <div>
                            <label class="text-gray-600 dark:text-gray-400" for="bio">自己紹介</label>
                            <textarea
                                class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow dark:bg-gray-600 dark:text-gray-100"
                                name="bio">{{ $user->bio }}</textarea>
                        </div>

                        <div class="flex justify-end">
                         
                            <button
                                class="py-1.5 px-3 m-1 text-center bg-violet-700 border rounded-md text-white  hover:bg-violet-500 hover:text-gray-100 dark:text-gray-200 dark:bg-violet-700"
                                type="submit">保存する</button>

                        </div>
                    </div>
                </div>
            </form>
        </div>
        
@endsection