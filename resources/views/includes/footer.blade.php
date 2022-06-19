@props(["links" => true])
<footer class="footer footer-center p-10 bg-base-200 text-base-content border-t">
  @if($links)
    <div class="grid grid-flow-col gap-4">
      <a href="/about" class="link link-hover ">About</a> 
      <a href="/login" class="link link-hover">Login</a>
    </div> 
  @endif
  <div>
    <div class="grid grid-flow-col gap-4">
      <a href="mailto:support@passworld.co.uk" target="_blank">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><title>Send an email</title>
          <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
        </svg>
      </a> 
    </div>
  </div> 
  <div>
    <p>Copyright © {{now()->year}} - Passworld</p>
  </div>
</footer>