@extends('layout.app')

@section('content')


  <div class="bg-white shadow-md rounded-md overflow-hidden max-w-lg mx-auto mt-16">
    <div class="bg-gray-100 py-2 px-4">
        <h2 class="text-2xl font-semibold text-gray-800">マッチリスト一覧</h2>
    </div>
    <ul class="divide-y divide-gray-200">
      @foreach ($users as $user)
        <li class="flex items-center py-4 px-6">
            <span class="text-gray-700 text-lg font-medium mr-4">1.</span>
            <img class="w-12 h-12 rounded-full object-cover mr-4" src="https://randomuser.me/api/portraits/women/72.jpg"
                alt="User avatar">
            <div class="flex-1">
                <h3 class="text-lg font-medium text-gray-800">{{ $user->name }}</h3>
            </div>

            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">プロフィールを見る</button>


        </li>
      @endforeach
    
    </ul>
</div>


@endsection