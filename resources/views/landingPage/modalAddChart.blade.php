<!-- Modal Booking -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel">Booking Tanggal & Jam</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Pilih tanggal untuk <strong id="product-name"></strong></p>
                <input type="text" id="booking-date" class="form-control mb-3" placeholder="Pilih tanggal" readonly>
                <input type="text" id="booking-time" class="form-control mb-3" placeholder="Pilih waktu" readonly>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success">Konfirmasi</button>
            </div>
        </div>
    </div>
</div>