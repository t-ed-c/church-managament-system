// Add a simple greeting based on the time of day
const welcomeMessage = document.querySelector('.welcome-message');
if (welcomeMessage) {
    const hour = new Date().getHours();
    let greeting = 'Hello';

    if (hour < 12) {
        greeting = 'Good morning';
    } else if (hour < 18) {
        greeting = 'Good afternoon';
    } else {
        greeting = 'Good evening';
    }

    // Get the user's name from the existing text content
    const userName = welcomeMessage.textContent.replace('Hello ', '').replace(' :)', '');

    // Update the welcome message with the new greeting
    welcomeMessage.textContent = `${greeting}, ${userName} :)`;
} else {
    console.error("Welcome message element not found!");
}

// Add a fade-in animation for the memory verse
const memoryVerse = document.querySelector('.memory-verse');
if (memoryVerse) {
    memoryVerse.style.opacity = 0;
    let opacity = 0;
    const fadeInInterval = setInterval(() => {
        opacity += 0.05;
        memoryVerse.style.opacity = opacity;
        if (opacity >= 1) clearInterval(fadeInInterval);
    }, 50);
} else {
    console.error("Memory verse element not found!");
}