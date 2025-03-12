<!-- Script for Profile Dropdown -->
<script>
    const profileButton = document.getElementById('profile-menu-button');
    const profileMenu = document.getElementById('profile-menu');

    profileButton.addEventListener('click', () => {
        profileMenu.classList.toggle('hidden');
    });

    document.addEventListener('click', (event) => {
        if (!profileButton.contains(event.target) && !profileMenu.contains(event.target)) {
            profileMenu.classList.add('hidden');
        }
    });
</script>

</body>

</html>
