@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{-- 
@if(session('messageFunction'))
    @if(session('messageFunction') == 'Data Berhasil Ditambahkan!' || session('messageFunction') == 'Data Berhasil Dihapus!' || session('messageFunction') == 'Data Berhasil Diperbarui!')
        <div class="alert alert-success">
            {{ session('messageFunction') }}
        </div> 
    @else
        <div class="alert alert-danger">
            {{ session('messageFunction') }}
        </div>
    @endif
@endif --}}