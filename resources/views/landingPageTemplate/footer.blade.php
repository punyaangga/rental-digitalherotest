<div class="container-fluid">
    <div class="row">
      <div class="col-md-6 copyright">
        @foreach ($setting as $settings)
        @if ($settings['app_category'] == 'author')
        <p>© {{date('Y').' '.$settings['app_values']}} Foodmart. All rights reserved.</p>
        @endif
        @endforeach
      </div>
    </div>
  </div>


