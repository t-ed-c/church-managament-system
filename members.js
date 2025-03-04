
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle sidebar functionality
        const toggleSidebar = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        let sidebarOpen = true;

        toggleSidebar.addEventListener('click', function() {
            if (sidebarOpen) {
                sidebar.classList.remove('w-64');
                sidebar.classList.add('w-20');
                
                // Hide text in sidebar links
                const sidebarText = document.querySelectorAll('#sidebar span');
                sidebarText.forEach(span => {
                    span.style.display = 'none';
                });
                
                // Change icon
                toggleSidebar.innerHTML = '<i class="fas fa-chevron-right"></i>';
            } else {
                sidebar.classList.remove('w-20');
                sidebar.classList.add('w-64');
                
                // Show text in sidebar links
                const sidebarText = document.querySelectorAll('#sidebar span');
                sidebarText.forEach(span => {
                    span.style.display = 'inline';
                });
                
                // Change icon
                toggleSidebar.innerHTML = '<i class="fas fa-chevron-left"></i>';
            }
            
            sidebarOpen = !sidebarOpen;
        });
    });