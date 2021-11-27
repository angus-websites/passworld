@section('title', 'A$$word')
<x-app-layout>
  <div class="my-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:my-16 lg:my-20 lg:px-8 xl:my-25">
    <div class="sm:text-center lg:text-left">
      <x-text.page-title title="Common Passwords" subtitle="View the most common passwords in use today"/>

      <!-- This example requires Tailwind CSS v2.0+ -->
      <div class="flex flex-col mt-10">

        <div class="overflow-x-auto">
          <table class="table w-full table-zebra">
            <thead>
              <tr>
                <th></th> 
                <th>Password</th> 
                <th>Time to crack</th> 
              </tr>
            </thead> 
            <tbody>
              @foreach($commonPasswords as $password)
                <tr>
                  <td>
                    {{$password->pos}}
                  </td>
                  <td>
                    {{$password->content}}
                  </td>
                  <td>
                    Dunno
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
