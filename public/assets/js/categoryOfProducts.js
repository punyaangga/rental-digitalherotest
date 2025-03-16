$(document).ready(function() {
    // Tangkap event perubahan pada dropdown produk
    $('#product-select').change(function() {
        // Ambil data kategori dari opsi yang dipilih
        var selectedCategory = $(this).find(':selected').data('category');
        // Set nilai input kategori produk
        $('#category-input').val(selectedCategory);
    });
    });
