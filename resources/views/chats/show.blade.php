@extends('layout.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-xl font-bold mb-4">チャット</h1>
    <div class="messages mb-4">
        @foreach ($messages as $message)
            <div class="{{ $message->sender_type === 'user' ? 'text-left' : 'text-right' }}">
                <p>{{ $message->message }}</p>
                <p class="text-sm text-gray-500">{{ $message->created_at }}</p>
            </div>
        @endforeach
    </div>
    <form action="{{ route('company_chat.storeMessage', $chat) }}" method="POST">
        @csrf
        <textarea name="message" rows="4" class="w-full p-2 border border-gray-300 rounded mb-4"></textarea>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">送信</button>
    </form>
</div>
@endsection