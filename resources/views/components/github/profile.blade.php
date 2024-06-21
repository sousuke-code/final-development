<div class="mt-4 mb-4 border border-gray-800 rounded-lg bg-gray-100">
  <p class="ml-4 mt-2 font-semibold text-lg text-gray-500">GitHub Profile:</p>
  <div class="flex ml-2 py-4">
      <a href="{{ $githubUser->user['html_url'] }}" target="_blank">
          <img
              src="{{ $githubUser->avatar }}"
              width="120"
              height="120"
              alt="Avatar: {{ $githubUser->nickname }}"
              title="{{ $githubUser->name }}"
              class="ml-4 rounded-full"
          />
      </a>
      <ul class="ml-4 text-gray-500">
          <li>Name: <a href="{{ $githubUser->user['html_url'] }}" target="_blank">{{ $githubUser->nickname }}</a></li>
          <li>Email: {{ $githubUser->email }}</li>
          <li>
              <span>followers: {{ $githubUser->user['followers'] }}</span>
              <span class="ml-4">following: {{ $githubUser->user['following'] }}</span>
          </li>
          <li>bio: {{ $githubUser->user['bio'] }}</li>
          <li>location: {{ $githubUser->user['location'] }}</li>
      </ul>
  </div>
</div>