const form = document.querySelector('#booking-form');
const siteToast = document.querySelector('#site-toast');
const siteToastText = document.querySelector('#site-toast-text');
const siteToastClose = document.querySelector('#site-toast-close');

function hideSiteToast() {
    if (!siteToast) return;
    siteToast.classList.add('hidden');
}

function showSiteToast(text, timeout = 3000) {
    if (!siteToast) return;
    siteToastText.textContent = text;
    siteToast.classList.remove('hidden');
    clearTimeout(showSiteToast._timeout);
    showSiteToast._timeout = setTimeout(() => hideSiteToast(), timeout);
}

if (siteToastClose) {
    siteToastClose.addEventListener('click', hideSiteToast);
}

function formatDate(dateStr) {
    const d = new Date(dateStr + 'T00:00:00');
    const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    return days[d.getDay()] + ', ' + d.getDate() + ' ' + months[d.getMonth()] + ' ' + d.getFullYear();
}

if (form) {
    form.addEventListener('submit', (e) => {
        e.preventDefault();

        const name = document.querySelector('#name').value.trim();
        const phone = document.querySelector('#phone').value.trim();
        const date = document.querySelector('#date').value;
        const time = document.querySelector('#time').value;
        const guests = document.querySelector('#guests').value;
        const table = document.querySelector('#table').value;
        const notes = document.querySelector('#notes').value.trim();

        if (!name || !phone || !date || !time || !guests) {
            showSiteToast('Harap isi semua field wajib.');
            return;
        }

        const formattedDate = formatDate(date);
        const tableText = table ? `Tipe Meja: ${table}\n` : '';
        const notesText = notes ? `Catatan: ${notes}\n` : '';

        const message = `Halo Warung Makan Mba Neni, saya ingin reservasi meja:\n\nNama: ${name}\nNo. WhatsApp: ${phone}\nTanggal: ${formattedDate}\nJam: ${time}\nJumlah Tamu: ${guests} orang\n${tableText}${notesText}\nMohon konfirmasi ketersediaan. Terima kasih.`;

        const PHONE = (document.querySelector('meta[name="whatsapp-number"]')?.content) || '6285810405551';

        async function submit() {
            const tokenEl = document.querySelector('meta[name="csrf-token"]');
            try {
                const resp = await fetch('/booking', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': tokenEl ? tokenEl.getAttribute('content') : '',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        name,
                        phone,
                        date,
                        time,
                        guests: Number(guests),
                        table_type: table || null,
                        notes: notes || null
                    })
                });
                const json = await resp.json();
                if (resp.ok && json.success) {
                    showSiteToast('Booking berhasil dicatat. Mengarahkan ke WhatsApp untuk konfirmasi...', 4500);
                    window.open(`https://wa.me/${PHONE}?text=${encodeURIComponent(message)}`, '_blank');
                    form.reset();
                } else {
                    showSiteToast(json.message || 'Gagal menyimpan booking.', 4000);
                }
            } catch {
                showSiteToast('Gagal menghubungi server.', 4000);
            }
        }

        submit();
    });
}

// Set default date to tomorrow (and default time to now)
function setDefaults() {
    const dateInput = document.querySelector('#date');
    if (dateInput) {
        const tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        dateInput.value = tomorrow.toISOString().split('T')[0];
    }
    const timeInput = document.querySelector('#time');
    if (timeInput) {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        timeInput.value = hours + ':' + minutes;
    }
}

setDefaults();

// Extended form reset to restore defaults
const bookingForm = document.querySelector('#booking-form');
if (bookingForm) {
    bookingForm.addEventListener('reset', () => {
        setTimeout(setDefaults, 0);
    });
}
