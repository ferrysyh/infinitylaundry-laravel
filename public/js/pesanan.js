const checkboxes = document.querySelectorAll('.checkmark');
const deleteButtons = document.querySelectorAll('.delete-button');
const riwayatPemesanan = document.getElementById('riwayat-pemesanan');

const historyData = [];

deleteButtons.forEach((button, index) => {
    button.addEventListener('click', () => {
        const row = button.parentElement.parentElement;
        row.remove();
    });
});

checkboxes.forEach((checkbox, index) => {
    checkbox.addEventListener('change', () => {
        const row = checkbox.parentElement.parentElement;
        if (checkbox.checked) {
            const noPesanan = row.querySelector('td:nth-child(1)').textContent;
            const tanggalPemesanan = row.querySelector('td:nth-child(2)').textContent;
            const status = "Dalam Proses"; 

            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${noPesanan}</td>
                <td>${tanggalPemesanan}</td>
                <td>${status}</td>
            `;
            historyData.push(newRow);
            riwayatPemesanan.appendChild(newRow);

            row.remove();
        }
    });
});
