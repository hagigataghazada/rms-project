document.addEventListener('DOMContentLoaded', function() {
    const menuItems = document.querySelectorAll('.menu-item');

    menuItems.forEach(item => {
        item.addEventListener('click', function(e) {
            const dropdownMenu = this.querySelector('.dropdown-menu');

            if (e.target.tagName === 'A') {
                return;
            }

            menuItems.forEach(i => {
                if (i !== this) {
                    i.classList.remove('active');
                    i.querySelector('.dropdown-menu').classList.remove('show');
                }
            });

            this.classList.toggle('active');
            dropdownMenu.classList.toggle('show');

            e.stopPropagation();
        });
    });

    document.addEventListener('click', function(e) {
        if (!e.target.closest('.menu-item')) {
            menuItems.forEach(i => {
                i.classList.remove('active');
                i.querySelector('.dropdown-menu').classList.remove('show');
            });
        }
    });
});
