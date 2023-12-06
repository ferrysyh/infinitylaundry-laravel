// Memilih semua elemen ceklis dan tombol hapus
const checkboxes = document.querySelectorAll('.checkmark');
const deleteButtons = document.querySelectorAll('.delete-button');
const riwayatPemesanan = document.getElementById('riwayat-pemesanan');

// Menginisialisasi objek riwayat pesanan
const historyData = [];

// Menambahkan event listener untuk setiap tombol hapus
deleteButtons.forEach((button, index) => {
    button.addEventListener('click', () => {
        // Hapus baris di "Pesanan Masuk"
        const row = button.parentElement.parentElement;
        row.remove();
    });
});

// Menambahkan event listener untuk setiap elemen ceklis
checkboxes.forEach((checkbox, index) => {
    checkbox.addEventListener('change', () => {
        const row = checkbox.parentElement.parentElement;
        if (checkbox.checked) {
            // Pindahkan data ke "Riwayat Pemesanan"
            const noPesanan = row.querySelector('td:nth-child(1)').textContent;
            const tanggalPemesanan = row.querySelector('td:nth-child(2)').textContent;
            const status = "Dalam Proses"; // Sesuaikan status sesuai kebutuhan

            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${noPesanan}</td>
                <td>${tanggalPemesanan}</td>
                <td>${status}</td>
            `;
            historyData.push(newRow);
            riwayatPemesanan.appendChild(newRow);

            // Hapus baris di "Pesanan Masuk"
            row.remove();
        }
    });
});
