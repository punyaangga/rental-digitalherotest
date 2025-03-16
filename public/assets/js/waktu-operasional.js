document.addEventListener('DOMContentLoaded', function() {
    // Event listener untuk menambah form hari buka
    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('add-form-open')) {
            const formContainer = document.getElementById('dynamic-form-open');
            const formGroup = e.target.closest('.form-group-open');
            if (formContainer && formGroup) {
                const newForm = formGroup.cloneNode(true);
        
                // Bersihkan nilai input pada form yang baru
                newForm.querySelectorAll('input').forEach(input => input.value = '');
                newForm.querySelectorAll('select').forEach(select => select.selectedIndex = 0);
                 // Kosongkan label pada form yang baru
                 newForm.querySelectorAll('.form-label').forEach(label => label.textContent = '');

                // Ganti tombol "+" dengan tombol "Hapus" pada form baru
                newForm.querySelector('.add-form-open').innerHTML = '-';
                newForm.querySelector('.add-form-open').classList.replace('btn-success', 'btn-danger');
                newForm.querySelector('.add-form-open').classList.replace('add-form-open', 'remove-form-open');
        
                formContainer.appendChild(newForm);
            }
        }
    
        // Event listener untuk menghapus form (open)
        if (e.target && e.target.classList.contains('remove-form-open')) {
            e.target.closest('.form-group-open').remove();
        }
    });
    //END Event listener untuk menambah form hari buka
    

    // Event listener untuk menambah form hari tutup
    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('add-form-close')) {
            const formContainer = document.getElementById('dynamic-form-close');
            const formGroup = e.target.closest('.form-group-close');
            if (formContainer && formGroup) {
                const newForm = formGroup.cloneNode(true);

                // Kosongkan nilai input pada form yang baru
                newForm.querySelectorAll('input').forEach(input => input.value = '');
                newForm.querySelectorAll('select').forEach(select => select.selectedIndex = 0);
                
                // Kosongkan label pada form yang baru
                newForm.querySelector('.form-label').textContent = '';

                // Ganti tombol "+" dengan tombol "Hapus" pada form baru
                newForm.querySelector('.add-form-close').innerHTML = '-';
                newForm.querySelector('.add-form-close').classList.replace('btn-success', 'btn-danger');
                newForm.querySelector('.add-form-close').classList.replace('add-form-close', 'remove-form-close');

                formContainer.appendChild(newForm);
            }
        }

        // Event listener untuk menghapus form (close)
        if (e.target && e.target.classList.contains('remove-form-close')) {
            e.target.closest('.form-group-close').remove();
        }
    });
     // END Event listener untuk menambah form hari tutup
});
