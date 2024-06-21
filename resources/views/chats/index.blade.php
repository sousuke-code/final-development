@extends('layout.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-xl font-bold mb-4">チャット一覧</h1>
    <ul>
        @foreach ($chats as $chat)
            <li>
                <a href="{{ route('company_chat.show', $chat) }}">
                    チャットID: {{ $chat->id }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
@endsection