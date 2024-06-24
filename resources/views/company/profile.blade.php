@extends('layout.app')

@section('content')

<div class="bg-white-100 min-h-screen">
  
  
  <div class="flex flex-row pt-24 px-10 pb-4">
    <div class="w-2/12 mr-6">
      <div class="bg-white rounded-xl shadow-lg mb-6 px-6 py-4 flex hover:bg-gray-100">
        <a href="{{ route('companies.edit', ['id' =>  Auth()->id()]) }}"  class="flex items-center">
          <p class="font-semibold ">
            マイページ編集
          </p>

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 ml-3">
              <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
            </svg>
        </a>
      </div>
      
      <div class="bg-white rounded-xl shadow-lg mb-6 px-6 py-4 flex hover:bg-gray-100">
        <a href="" class="flex items-center">
          <p class="font-semibold">マッチリスト</p>

          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 ml-3">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </a>
      </div>
    </div>
    
    <div class="w-10/12">
      <div class="flex flex-row">
        <div class="bg-no-repeat bg-white-400 border border-black-300 rounded-xl w-7/12 mr-2 p-6" >
          @foreach ($company->images ?? [] as $image)
          <img src="{{ asset('storage/' . $image) }}" alt="企業画像" class="rounded-md object-cover mb-4" style="width: 200px; height: 200px;">
           @endforeach
        </div>

        <div class="bg-no-repeat bg-white-200 border border-black-300 rounded-xl w-5/12 ml-2 p-6" >
          <p class="text-5xl text-indigo-900">mail box <br><strong>23</strong></p>
          
          @livewire('modal')
        </div>
      </div>

      <div class="flex flex-row h-70 mt-6">
        <div class="bg-white rounded-xl shadow-lg px-6 py-4 w-full">

          <h1 class="text-3xl text-indigo-900 text-center mt-4 mb-10"><strong>エンジニア検索</strong></h1>
          <form action="{{ route('companies.search') }}" method="GET">
            <!-- フォームの内容 -->
            <div class="w-full items-center justify-center flex">
              {{-- <select id="言語の選択" name="language"
              class="w-4/5 h-10 border-2 border-black-900 focus:outline-none focus:border-black-500 text-black-500 rounded px-2 md:px-3 py-0 md:py-1 tracking-wider">
                  <option value="All" selected>ALL</option>
                  <option value="HTML">HTML</option>
                  <option value="CSS">CSS</option>
                  <option value="Java">Java</option>
                  <option value="JavaScript">JavaScript</option>
                  <option value="PHP">PHP</option>
                  <option value="Python">Python</option>
                  <option value="C">C</option>
                  <option value="C++">C++</option>
                  <option value="C#">C#</option>
              </select> --}}

              <select id="language" name="language"
              class="w-4/5 h-10 border-2 border-black-900 focus:outline-none focus:border-black-500 text-black-500 rounded px-2 md:px-3 py-0 md:py-1 tracking-wider" >
              @foreach ($languages as $language)
              <option value="{{ $language->id }}" >
                  {{ $language->name }}
              </option>
              @endforeach
           </select>
              

          </div>

{{-- 邪魔だったのでいったんコメントアウトしました↓ --}}

          {{-- <div class="w-full mt-5 flex items-center justify-center">
            <select id="ポートフォリオの選択" name="portfolio"
            class="w-4/5 h-10 border-2 border-black-900 focus:outline-none focus:border-indigo-500 text-black-500 rounded px-2 md:px-3 py-0 md:py-1 tracking-wider">
                <option value="All" selected>ポートフォリオ有</option>
                <option value="Freemium">ポートフォリオ無</option>
            </select>
        </div>
           --}}
          <div class="text-center mt-5">
            <button type="submit" class="bg-sky-500 text-white rounded-xl px-2 md:px-3 py-0 md:py-1 h-10">検索する</button>
          </div>
          </form>
           
      </div>



  
      
    </div>
  </div>
</div>


@endsection