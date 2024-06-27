@extends('layout.user-header')

@section('content')
<h1>マッチリスト</h1>
 <div class="bg-white shadow-md rounded-md overflow-hidden max-w-lg mx-auto mt-16">
  <div class="bg-gray-100 py-2 px-4">
      <h2 class="text-2xl font-semibold text-gray-800">マッチリスト一覧</h2>
  </div>
  <ul class="divide-y divide-gray-200">
    @foreach ($matches as $match)
      <li class="flex items-center py-4 px-6">
          <span class="text-gray-700 text-lg font-medium mr-4">1.</span>
          <img class="w-12 h-12 rounded-full object-cover mr-4" src="https://randomuser.me/api/portraits/women/72.jpg"
              alt="User avatar">
          <div class="flex-1">
              <h3 class="text-lg font-medium text-gray-800"> {{ $match->company->name }}</p></h3>
          </div>

          <a href="{{ route('companies.show', ['id' => $match->company->id ]) }}">
              <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">プロフィールを見る</button>
          </a>


          <a href="{{ route('users.chat', ['id' => $match->company->id ]) }}">
              <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">チャット画面に移る</button>
          </a>


      </li>
    @endforeach
  
  </ul>
</div>


@endsection 
{{-- 
<ul>
    @foreach ($matches as $match)
        <li>
            <p>会社名: {{ $match->company->name }}</p>
            <p>会社画像: <img src="{{ $match->company->company_img }}" alt="{{ $match->company->name }}" style="max-width: 200px;"></p>
        </li>
    @endforeach
 </ul> --}}
 
