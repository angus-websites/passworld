@section('title', 'Account')
<x-app-layout>
  @include('includes.flash')
  <div class="my-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:my-16 lg:my-20 lg:px-8 xl:my-25">
    <div class="sm:text-center lg:text-left">
      <x-text.page-title title="Account" subtitle="View or update your account information"/>
    </div>
    <div class="max-w-xl mt-10 sm:mx-auto lg:mx-0">
      <form method="POST" action="{{{ route('account.update') }}}">
          @csrf
          <!--Email-->
          <div class="form-control mb-6">
            <label class="label">
              <span class="label-text">Email</span>
            </label> 
            <input type="email" disabled="disabled" class="input input-bordered" value="{{$user->email}}">
          </div>

          <!--Current password-->
          <div class="form-control mb-6">
            <label class="label">
              <span class="label-text">Current password</span>
            </label> 
            <input type="password" class="input input-bordered" name="current_password" required>
          </div>

          <!--New password-->
          <div class="form-control mb-6">
            <label class="label">
              <span class="label-text">New password</span>
            </label> 
            <input type="password" class="input input-bordered" name="new_password" required>
          </div>

          <!--Confirm-->
          <div class="form-control mb-6">
            <label class="label">
              <span class="label-text">Confirm</span>
            </label> 
            <input type="password" class="input input-bordered" name="confirm_password" required>
          </div>


          <!--Submit button-->
          <button type="submit" class="btn btn-primary">Save</button>
      </form>
    </div>

  </div>
</x-app-layout>