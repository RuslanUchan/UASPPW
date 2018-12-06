// 
// Modal Hak Akses
// 
// Get modal
const modalHakAkses = document.getElementById('modal-hak-akses');

// Get trigger
const trgModalHakAkses = document.getElementById('trg-modal-hak-akses');

// Get modal-close
const closeModalHakAkses = document.getElementsByClassName('modal-close')[0];

// Trigger modal
trgModalHakAkses.addEventListener('click', () => {
	modalHakAkses.style.display = 'block';
});

// Trigger modal-close
closeModalHakAkses.addEventListener('click', () => {
	modalHakAkses.style.display = 'none';
});

// Click anywhere outside modal
window.addEventListener('click', (e) => {
	if (e.target == modalHakAkses) {
		modalHakAkses.style.display = 'none';
	}
});

// 
// Modal Tambah Kategori
// 
