@extends('layouts.main')
@section('container')
<div class="content">
  @livewire('staff.index')  
</div>
@endsection
@section('script')
<script>

  window.addEventListener('close-modal', event => {
  
      $('#modalCreate').modal('hide');
  
  })
  
  </script>
@endsection