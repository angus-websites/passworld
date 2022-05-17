@section('title', 'About')
@section('description', "Learn about passworld")
<x-app-layout>
  <x-page-container>
    <x-headings.h1>Heading 1</x-headings.h1>
    <p>Some content goes here</p>
    <x-headings.h2>Heading 2</x-headings.h2>
    <x-headings.h3>Heading 3</x-headings.h3>
    <p>Some information about heading 3 goes here</p>
    <x-headings.h3>Heading 3</x-headings.h3>
    <p>Some information about heading 3 goes here</p>
    <x-headings.h3>Heading 3</x-headings.h3>
    <p>Some information about heading 3 goes here</p>


    <x-button-group class="justify-center">
      <x-button class="btn-success">Success</x-button>
      <x-button class="btn-info">Info</x-button>
      <x-button class="btn-warning">Warning</x-button>
      <x-button class="btn-error">Error</x-button>
    </x-button-group>
  </x-page-container>
</x-app-layout>
