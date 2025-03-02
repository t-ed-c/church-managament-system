
        const welcomeMessage = document.querySelector('.welcome-message');
        const hour = new Date().getHours();
        let greeting = 'Hello';

        if (hour < 12) {
            greeting = 'Good morning';
        } else if (hour < 18) {
            greeting = 'Good afternoon';
        } else {
            greeting = 'Good evening';
        }

        welcomeMessage.textContent = `${greeting}, ${welcomeMessage.textContent.split(',')[1]}`;

        // Add a fade-in animation for the memory verse
        const memoryVerse = document.querySelector('.memory-verse');
        memoryVerse.style.opacity = 0;
        let opacity = 0;
        const fadeInInterval = setInterval(() => {
            opacity += 0.05;
            memoryVerse.style.opacity = opacity;
            if (opacity >= 1) clearInterval(fadeInInterval);
        }, 50);