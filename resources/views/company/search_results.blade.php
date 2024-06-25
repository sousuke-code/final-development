@extends('layout.app')

@section('content')


<div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">検索結果</h5>
        <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
            View all
        </a>
   </div>
   @if ($users->isEmpty())

   <div class="flow-root">
    <p>該当するユーザーが見つかりませんでした。</p>
   </div>

   @else
   <div class="flow-root">
        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($users as $user)


            <li class="py-3 sm:py-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                           {{ $user->name }}
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            {{ $user->email }}
                        </p>
                    </div>
                   

                    <form action="{{ route('companies.sendScout', ['userId' => $user->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-blue-900 hover:bg-gray-100 text-white rounded px-4 py-2" >スカウトを送る</button>
                    </form>
                </div>
            </li>
            @endforeach
           
            
            
           
        </ul>
        @endif
   </div>
</div>

    {{-- <h1>検索結果</h1>
    @if ($users->isEmpty())
        <p>該当するユーザーが見つかりませんでした。</p>
    @else
        <ul>
            @foreach ($users as $user)
                <li>{{ $user->name }}</li>
                <form action="{{ route('companies.sendScout', ['userId' => $user->id]) }}" method="POST">
                    @csrf
                    <button type="submit">スカウトを送る</button>
                </form>
            @endforeach
        </ul>
    @endif --}}


@endsection