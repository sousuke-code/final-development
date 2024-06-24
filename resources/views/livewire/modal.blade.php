<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

    
    @if($showModal)
    <div class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 text-center sm:p-0">
            <div class="fixed inset-0 bg-gray-700 bg-opacity-50 transition-opacity"></div>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                <div class="bg-white px-6 pt-5 pb-4">
                    <h3 class="text-xl leading-6 font-semibold text-gray-900">
                       New Chat List
                    </h3>
                    <div class="mt-4">
                        @if ($chats->isEmpty())
                            <p class="text-gray-500">No messages found.</p>
                        @else
                            <ul class="space-y-2">
                                @foreach ($chats as $chat)
                                    <li class="bg-gray-100 p-2 rounded-lg shadow">
                                        
                                            <span class="font-medium"><a class="text-blue-500 hover:underline" href="{{ route('companies.chat',['id' => $chat->user_id ])}}">{{ $chat->user->name }} </a></span>さんからメッセージが来ました。
                                      
                                            <span class="text-gray-500">{{ $chat->created_at }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse">
                    <button wire:click="closeModal()" type="button" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 transition-colors hover:bg-gray-100 sm:w-auto">
                        閉じる
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>