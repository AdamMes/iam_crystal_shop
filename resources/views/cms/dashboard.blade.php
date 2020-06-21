@extends('cms.cms_master')

@section('cms_content')

  @include('utils/cms_header',['title' => 'Dashboard','icon' => 'fas fa-fw fa-tachometer-alt'])
  <div class="row">
      <div class="col">
          <p><i>Dashboard Content...</i></p>
      </div>
  </div>

@endsection
