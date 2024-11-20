
let timeLeft = 120; // 2 minutes in seconds
const timerDisplay = document.getElementById('timer');
const resendMessage = document.getElementById('resendMessage');

function startTimer() {
  const timerInterval = setInterval(() => {
    if (timeLeft <= 0) {
      clearInterval(timerInterval);
      timerDisplay.textContent = "00:00";
      resendMessage.style.display = "block"; // Show the new message
    } else {
      const minutes = Math.floor(timeLeft / 60);
      const seconds = timeLeft % 60;
      timerDisplay.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
      timeLeft--;
    }
  }, 1000);
}

startTimer();


function moveFocus(currentInput, nextInputIndex) {
  if (currentInput.value.length === 1 && nextInputIndex < 5) {
    const nextInput = document.querySelectorAll('.otp-input')[nextInputIndex];
    nextInput.focus();
  }
}

function handleBackspace(event, currentInput, currentIndex) {
  if (event.key === 'Backspace' && currentInput.value === '') {
    const previousInput = document.querySelectorAll('.otp-input')[currentIndex - 1];
    if (previousInput) {
      previousInput.focus();
      previousInput.value = ''; // Clear the previous input
    }
  }
}