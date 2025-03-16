<div class="container mt-3">
    <h2 class="mb-3">Keranjang Belanja</h2>

    <div class="row">
        <!-- Daftar Produk -->
        <div class="col-md-8">
            @if (!empty($data['detailOrder']) && count($data['detailOrder']) > 0)

                @foreach ($data['detailOrder'] as $index => $detailOrder)

                    <form method="POST" action="{{ route('chart.update',$detailOrder['created_by'])}}">
                        @csrf
                        @method('PUT')
                        <div class="card mb-4 p-3 shadow-sm">
                            <div class="row align-items-center">
                                <!-- Gambar Produk -->
                                <input type="hidden" name="id_order[]" value="{{ $detailOrder['id'] }}">
                                <input type="hidden" name="id_product[]" value="{{ $detailOrder['id_product'] }}">
                                <div class="col-md-2 text-center">
                                    <img src="{{ asset($detailOrder['ms_product_image']) }}" alt="Produk" class="img-fluid rounded">
                                </div>

                                <!-- Detail Produk -->
                                <div class="col-md-4">
                                    <h5 class="mb-1">{{ $detailOrder['ms_product_name'] }}</h5>
                                    <p class="text-muted small">Kategori: {{ $detailOrder['category_name'] }}</p>
                                    <span class="price text-success fw-bold" id="normalPrice-{{ $index }}" data-price="{{ $detailOrder['mp_price'] }}">
                                        Per jam(HPJ) : Rp {{ number_format($detailOrder['mp_price'], 0, ',', '.') }}
                                    </span>
                                    <p class="text-muted text-primary" id="adjustedPrice-{{ $index }}">HPJ * Waktu: Rp 0</p>
                                    <p class="text-muted small weekend-price" id="weekendPrice-{{ $index }}"
                                        data-weekend-price="{{ $data['weekendPrice']->mp_price ?? 0 }}" style="display: none;">
                                        Biaya Tambahan: Rp {{ number_format($data['weekendPrice']->mp_price ?? 0, 0, ',', '.') }}
                                    </p>

                                </div>

                                <!-- Input Tanggal & Waktu Booking -->
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label class="form-label fw-semibold">Tanggal Booking</label>
                                            <input type="date" name="detail_order_date[]" class="form-control booking-date" data-index="{{ $index }}" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label fw-semibold">Jam Mulai</label>
                                            <input type="time" name="detail_order_time_start[]" class="form-control booking-start" data-index="{{ $index }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Jam Selesai</label>
                                            <input type="time" name="detail_order_time_end[]" class="form-control booking-end" data-index="{{ $index }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                @endforeach

            @else
                <div class="text-center p-5">
                    <h4 class="text-muted">Keranjang kosong</h4>
                </div>
            @endif
        </div>

        <!-- Ringkasan Pembayaran -->
        <div class="col-md-4">
            <div class="cart-summary card shadow-sm p-4" style="position: sticky; top: 10px;">
                <h5 class="mb-3">Ringkasan Belanja</h5>
                <div class="d-flex justify-content-between">
                    <span>Subtotal</span>
                    <strong class="price" id="subtotal">Rp 0</strong>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Tambahan</span>
                    <strong class="price" id="additional">Rp 0</strong>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <strong>Total</strong>
                    <strong class="price" id="total">Rp 0</strong>
                </div>
                <button class="btn btn-success w-100 mt-3">Checkout</button>
            </div>
        </div>
    </form>
    </div>
</div>

<!-- JavaScript -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
    function updateTotal() {
        let subtotal = 0;
        let additional = 0;

        document.querySelectorAll(".booking-date").forEach(input => {
            let index = input.dataset.index;
            let normalPriceElement = document.getElementById(`normalPrice-${index}`);
            let weekendPriceElement = document.getElementById(`weekendPrice-${index}`);
            let adjustedPriceElement = document.getElementById(`adjustedPrice-${index}`);

            let normalPrice = parseInt(normalPriceElement.dataset.price) || 0;
            let weekendPrice = parseInt(weekendPriceElement.dataset.weekendPrice) || 0;

            let selectedDate = new Date(input.value);
            let dayOfWeek = selectedDate.getDay();

            let startTimeInput = document.querySelector(`.booking-start[data-index="${index}"]`);
            let endTimeInput = document.querySelector(`.booking-end[data-index="${index}"]`);
            let startTime = startTimeInput.value;
            let endTime = endTimeInput.value;
            let duration = 1;

            if (startTime && endTime) {
                let startHour = parseInt(startTime.split(":")[0]);
                let endHour = parseInt(endTime.split(":")[0]);

                if (endHour > startHour) {
                    duration = endHour - startHour;
                } else {
                    alert("Jam selesai harus lebih besar dari jam mulai.");
                    endTimeInput.value = ""; // Reset input jam selesai
                    return;
                }
            }

            let totalPrice = normalPrice * duration;
            adjustedPriceElement.innerText = `HPJ * Waktu: Rp ${totalPrice.toLocaleString("id-ID")}`;
            subtotal += totalPrice;

            if (!isNaN(selectedDate) && (dayOfWeek === 0 || dayOfWeek === 6)) {
                weekendPriceElement.style.display = "block";
                additional += weekendPrice;
            } else {
                weekendPriceElement.style.display = "none";
            }
        });

        document.getElementById("subtotal").innerText = `Rp ${subtotal.toLocaleString("id-ID")}`;
        document.getElementById("additional").innerText = `Rp ${additional.toLocaleString("id-ID")}`;
        document.getElementById("total").innerText = `Rp ${(subtotal + additional).toLocaleString("id-ID")}`;
    }

    document.querySelectorAll(".booking-date, .booking-start, .booking-end").forEach(input => {
        input.addEventListener("change", updateTotal);
    });

    updateTotal();
});

</script>