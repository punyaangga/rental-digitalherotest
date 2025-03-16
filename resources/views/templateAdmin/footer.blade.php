@foreach ($setting as $settings)
   @if ($settings['app_category'] == 'app name')
   <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
        <p class="text-muted mb-1 mb-md-0">Copyright © 2023 <a href="https://www.nobleui.com" target="_blank">{{$settings['app_values']}}</a>.</p>
        <p class="text-muted">Handcrafted Fantiya Dev</p>
    </footer>	
   @endif 
@endforeach



