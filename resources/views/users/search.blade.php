<!-- resources/views/users/search.blade.php -->

@extends('layout.user-header')

@section('content')

<div class="container mx-auto mt-10">
    <div class="flex flex-col space-y-10">
        <!-- 検索フォーム -->
        <div class="bg-white rounded-xl shadow-lg p-6 w-full">
            <h1 class="text-3xl text-indigo-900 text-center my-4"><strong>エンジニア検索</strong></h1>
            <form action="{{ route('users.search') }}" method="GET">
                <div class="w-full flex justify-center">
                    <select id="language" name="language" class="w-4/5 h-10 border-2 border-black-900 focus:outline-none focus:border-black-500 rounded px-3 py-1">
                        @foreach ($languages as $language)
                            <option value="{{ $language->id }}" {{ request('language') == $language->id ? 'selected' : '' }}>
                                {{ $language->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center mt-5">
                    <button type="submit" class="bg-sky-500 text-white rounded-xl px-3 py-1 h-10">検索する</button>
                </div>
            </form>
        </div>

        <!-- 検索結果 -->
        <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900">検索結果</h5>
            </div>
            @if ($users->isEmpty())
                <p class="flow-root">該当するユーザーが見つかりませんでした。</p>
            @else
                <ul role="list" class="flow-root divide-y divide-gray-200">
                    @foreach ($users as $user)
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center">
                                <img class="w-8 h-8 rounded-full" src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->photo }} image">
                                <div class="flex-1 min-w-0 ms-4">
                                    <a href="{{ route('profile.show', ['id' => $user->id ]) }}">
                                        <p class="text-sm font-medium text-gray-900 truncate">{{ $user->name }}</p>
                                    </a>
                                    <p class="text-sm text-gray-500 truncate">{{ $user->email }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
 
@endsection