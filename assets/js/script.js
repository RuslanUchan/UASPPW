// Function
function triggerModalHandler(m, tm) {
	tm.addEventListener('click', () => {
		m.style.display = 'block';
	});
}

function closeModalHandler(m, cm) {
	cm.addEventListener('click', () => {
		m.style.display = 'none';
	});
}

function windowModalHandler(m) {
	// Click anywhere outside modal
	window.addEventListener('click', (e) => {
		if (e.target == m) {
			m.style.display = 'none';
		}
	});
}

// Get modal
const modal = document.getElementsByClassName('modal');

// Get trigger
const triggerModal = document.getElementsByClassName('trigger-modal');

// Get modal-close
const closeModal = document.getElementsByClassName('modal-close');

// Loop through modal object
for(let i = 0; i < modal.length; i++) {
	triggerModalHandler(modal[i], triggerModal[i]); // Trigger modal
	closeModalHandler(modal[i], closeModal[i]); // Trigger modal-close
	windowModalHandler(modal[i]);
}