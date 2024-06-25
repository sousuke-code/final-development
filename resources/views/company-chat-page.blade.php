@extends('layout.app')

@section('content')

<div class="container">
 
    
    <!-- Main Chat Area -->
    <div class="flex-1" id="chat">
        <!-- Chat Header -->
        <header class="bg-white p-4 text-gray-700">
          
            <h1 class="text-2xl font-semibold">{{ $user -> name }}</h1>
        </header>
        
        <!-- Chat Messages -->
        <div class="h-screen overflow-y-auto p-4 pb-36" >

          @foreach ($chats as $chat)
           @if ($chat['sender_type'] === 'user')

          <div class="flex mb-4 cursor-pointer">
           <div class="w-9 h-9 rounded-full flex items-center justify-center mr-2">
             <img src="https://placehold.co/200x/ffa8e4/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato" alt="User Avatar" class="w-8 h-8 rounded-full">
           </div>
           <div class="flex max-w-96 bg-white rounded-lg p-3 gap-3">
             <p class="text-gray-700">{{ $chat['message'] }}</p>
           </div>
         </div>

          @else

          <div class="flex justify-end mb-4 cursor-pointer">
           <div class="flex max-w-96 bg-indigo-500 text-white rounded-lg p-3 gap-3">
             <p>{{ $chat['message'] }}</p>
           </div>
           <div class="w-9 h-9 rounded-full flex items-center justify-center ml-2">
             <img src="https://placehold.co/200x/b7a8ff/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato" alt="My Avatar" class="w-8 h-8 rounded-full">
           </div>
         </div>

         @endif
        @endforeach
        
          
          <div id="messages"></div>

           
           
           
           
           
        </div>


      
        
      
        <!-- Chat Input -->
        <footer class="bg-white border-t border-gray-300 p-4 ">
          <div class="flex items-center">
              <input type="text" id="messageInput" name="message_body" placeholder="Write your message!" class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-12 bg-gray-200 rounded-md py-3">
              <button type="button" onclick="sendMessage()" class="inline-flex items-center justify-center rounded-lg px-4 py-3 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none">
                  <span class="font-bold">Send</span>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 ml-2 transform rotate-90">
                      <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
                  </svg>
              </button>
          </div>
      </footer>



        
        

    </div>
</div>



<script>
  var ably = new Ably.Realtime('RDsvvw._52ZGw:EtJ6boEsAMFoPyXk47IJOfFBNfVMWl3MhJ260QKu2V4'); 
  var channel = ably.channels.get('chatting'); 
  var messagesDiv = document.getElementById('messages');
  var messageInput = document.getElementById('messageInput'); 

  channel.subscribe('messageEvent', function(message) { 
    var messageElement = document.createElement('div'); 
    if (message.data.sender_type === 'company') {
        // 自分が送信したメッセージ
        messageElement.innerHTML = `
            <div class="flex justify-end mb-4 cursor-pointer">
                <div class="flex max-w-96 bg-indigo-500 text-white rounded-lg p-3 gap-3">
                    <p>${message.data.text}</p>
                </div>
                <div class="w-9 h-9 rounded-full flex items-center justify-center ml-2">
                    <img src="https://placehold.co/200x/b7a8ff/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato" alt="My Avatar" class="w-8 h-8 rounded-full">
                </div>
            </div>
        `;
    } else {
        // 自分以外が送信したメッセージ
        messageElement.innerHTML = `
          <div class="flex mb-4 cursor-pointer">
           <div class="w-9 h-9 rounded-full flex items-center justify-center mr-2">
             <img src="https://placehold.co/200x/ffa8e4/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato" alt="User Avatar" class="w-8 h-8 rounded-full">
           </div>
           <div class="flex max-w-96 bg-white rounded-lg p-3 gap-3">
             <p class="text-gray-700">${message.data.text}</p>
           </div>
         </div>
        `;
    }
      messagesDiv.appendChild(messageElement);
  });
 

  function sendMessage() {
      var message = messageInput.value.trim();
      var userId = {{ $userId }}; 
      var companyId = {{ Auth::id() }};
 

      if (message !== '') {

          var messageData = {
              text: message,
              sender_type: 'company', // または 'user' など適切な送信者タイプ
              sender: 'local'
          };

          channel.publish('messageEvent',messageData);

          fetch('/companies/chat/messages', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN' : '{{ csrf_token() }}'

            },
            body: JSON.stringify({
                message: message,
                user_id: userId,
                company_id: companyId
            })
          })
          .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
            })
          .then(data => {
                console.log(data);
            })
          .catch(error => {
                console.error('Error:', error);
            });

          messageInput.value = '';
          
      }
  }
</script>
  
@endsection