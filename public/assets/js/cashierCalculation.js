function getCSRFToken() {
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
}
function formatInputRupiah(input) {
    let value = input.value;

    // Menghapus karakter non-digit
    value = value.replace(/[^0-9]/g, '');

    // Menambahkan format Rupiah
    input.value = formatRupiah(value);
}

function formatRupiah(value) {
    if (!value) return 'Rp 0';
    return 'Rp ' + parseInt(value, 10).toLocaleString('id-ID', {
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    });
}



function searchProduct(query) {
    if (!query || query.trim().length === 0) {
        displayResults(null, 'Silakan masukan barcode atau nama produk');
    return;
    }

    $.ajax({
        url: `/cashier/${query}`,
        method: 'GET',
        data: {
            query: query,
        },
        success: function(response) {
            displayResults(response);
        },
        error: function(xhr) {
            console.log(xhr.responseText); // Handle error
        }
    });
}

function displayResults(products, errorMessage = null) {
    var resultDiv = document.getElementById('searchResults');
    resultDiv.innerHTML = ''; // Kosongkan hasil sebelumnya

    if (errorMessage) {
        resultDiv.style.display = 'block';
        resultDiv.innerHTML = `<p class="text-danger">${errorMessage}</p>`;
        return;
    }

    // Cek apakah products bukan array atau array-nya kosong
    if (!Array.isArray(products) || products.length === 0) {
        resultDiv.style.display = 'block';
        resultDiv.innerHTML = '<p class="text-danger">Barang tidak ditemukan.</p>';
        return;
    }

    // Jika terdapat produk yang ditemukan
    resultDiv.style.display = 'block';
    var resultHtml = '';
    products.forEach(function(product) {
        resultHtml += `
            <div class="card mb-3 product-card" style="max-width: 100%;" data-product='${JSON.stringify(product)}'>
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="${product.ms_product_image}" class="img-fluid img-search-style" alt="${product.ms_product_name}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Barcode : ${product.sp_barcode}</h5>
                            <p class="card-text">Nama Produk : ${product.ms_product_name}</p>
                            <p class="card-text">Warna : ${product.mc_name}</p>
                            <p class="card-text">Tipe : ${product.sp_type}</p>
                            <p class="card-text">Stok: ${product.sp_qty} Kg</p>
                        </div>
                    </div>
                </div>
            </div>
        `;
    });
    resultDiv.innerHTML = resultHtml;
    // Tambahkan event listener untuk setiap card
    document.querySelectorAll('.product-card').forEach(card => {
        card.addEventListener('click', function () {
            var productData = JSON.parse(this.getAttribute('data-product'));
            saveProductToDatabase(productData);
        });
    });
}
function saveProductToDatabase(product) {
    $.ajax({
        url: storeProductUrl, // Gunakan variabel global
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken, // Gunakan CSRF token
        },
        data: {
            product: product,
        },
        success: function (response) {
            console.log(response);
            if (response.success) {
                refreshTable(); // Refresh data di tabel
            } else {
                alert('Gagal menyimpan produk ke database.');
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText); // Debugging error
            alert('Terjadi kesalahan.');
        }
    });
}

$(function () {
    // Fungsi untuk format ke dalam Rupiah
    function formatRupiah(angka) {
        if (angka === null) return 'Rp 0';
        return 'Rp ' + parseFloat(angka).toLocaleString('id-ID', {
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        });
    }
    // Fungsi untuk menghitung total pembayaran
    function calculateTotalPayment() {
        let total = 0;
        $('.data-tables tbody tr').each(function() {
            var qty = $(this).find('.input-qty').val(); // Mengambil jumlah
            var priceText = $(this).find('td:eq(5)').text(); // Mengambil harga
            var price = parseFloat(priceText.replace(/Rp\s|,|\./g, '')); // Menghapus Rp, titik, dan koma
            var totalItem = qty * price; // Menghitung total per item
            total += totalItem; // Menambahkan ke total pembayaran
        });
        $('#totalPayment').text(formatRupiah(total)); // Menampilkan total pembayaran
    }

    // get data from controller to datatable
    var table = $('.data-tables').DataTable({
        processing: true,
        serverSide: true,
        ajax: cashierIndexUrl,
        columns: [
            {
                data: 'no',
                name: 'no',
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            {data: 'sp_barcode', name: 'sp_barcode'},
            {data: 'ms_product_name', name: 'ms_product_name'},
            {
                data: 'do_qty',
                name: 'do_qty',
                render: function (data, type, row) {
                    // Membuat kolom jumlah sebagai input number
                    return `<input type="number" class="form-control input-qty" value="${data}" min="1" data-id="${row.id}" />`;
                }
            },
            {
                data: 'do_unit',
                name: 'do_unit',
                render: function (data, type, row) {
                    // Membuat kolom satuan sebagai select dropdown
                    return `
                        <select class="form-control select-unit" data-id="${row.id}">
                            <option value="kg" ${data === 'kg' ? 'selected' : ''}>kg</option>
                            <option value="roll" ${data === 'roll' ? 'selected' : ''}>roll</option>
                        </select>
                    `;
                }
            },
            {
                data: 'mp_price',
                name: 'mp_price',
                render: function (data, type, row) {
                    return formatRupiah(data);
                }
            },
            {
                data: 'total',
                name: 'total',
                render: function (data, type, row) {
                    return formatRupiah(data);
                }
            },
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    // Hitung total pembayaran setelah DataTable selesai di-draw
table.on('draw', function() {
    calculateTotalPayment(); // Update total pembayaran setiap kali data selesai dimuat
});

    // Event listener untuk perubahan input jumlah dan select satuan
    $('.data-tables').on('change', '.input-qty, .select-unit', function() {
        var id = $(this).data('id');
        var spBarcode = $(this).data('sp_barcode');
        var newQty = $(this).closest('tr').find('.input-qty').val();
        var newUnit = $(this).closest('tr').find('.select-unit').val();

        // Lakukan aksi update dengan mengirim data yang diubah ke backend
        updateProductData(id, newQty, newUnit);
    });
});
function updateProductData(id, qty, unit, spBarcode) {
    var url = updateProductUrl.replace(':id', id); // Replace :id dengan ID produk

    $.ajax({
        url: url, // URL endpoint untuk update data
        method: 'PUT',
        headers: {
            'X-CSRF-TOKEN': csrfToken // Menggunakan CSRF token
        },
        data: {
            id: id,
            qty: qty,
            unit: unit,
            sp_barcode: spBarcode // Tambahkan parameter sesuai kebutuhan
        },
        success: function (response) {
            if (response.success) {
                refreshTable(); // Refresh tabel jika berhasil
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: response.message,
                }).then(() => {
                    refreshTable();
                });
            }
        },
        error: function (xhr) {
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: xhr.responseJSON?.message || 'Terjadi kesalahan saat mengupdate data.', // Pesan error
            }).then(() => {
                refreshTable(); // Refresh tabel jika gagal
            });
        }
    });
}
function calculateChange() {
    // Ambil total pembayaran dari elemen totalPayment
    const paymentAmount = getNumericValue('paymentAmount');
    const totalPayment = parseFloat(document.getElementById('totalPayment').innerText.replace(/Rp\s|,|\./g, ''));
    const change = paymentAmount - totalPayment;
    console.log(paymentAmount);
    // Konversi input pembayaran ke angka
    // let payment = parseFloat(paymentAmount);

    // if (isNaN(paymentAmount)) {
    //     // Jika input tidak valid, kosongkan input kembalian
    //     document.getElementById('changeAmount').value = '';
    //     return;
    // }


    // Format kembalian menjadi Rupiah
    let formattedChange = change > 0 ? `Rp ${change.toLocaleString('id-ID')}` : 'Rp 0';

    // Tampilkan kembalian di input changeAmount
    document.getElementById('changeAmount').value = isNaN(change) || change < 0 ? 'Rp 0' : formatRupiah(change.toString());
}

function refreshTable() {
    $('.data-tables').DataTable().ajax.reload(null, false); // Reload table tanpa reset pagination
}
