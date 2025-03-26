<footer class="bg-slate-800 text-white py-6">
    <div class="container mx-auto text-center">
        <p>&copy; 2024 Blogify. All Rights Reserved.</p>
    </div>
</footer>

<!-- Script for Mobile Menu Toggle -->
<script>
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
<script>
    // Open the reply modal
    document.getElementById('openReplyModal').addEventListener('click', function() {
        document.getElementById('replyModal').classList.remove('hidden');
    });

    // Close the reply modal
    document.getElementById('closeReplyModal').addEventListener('click', function() {
        document.getElementById('replyModal').classList.add('hidden');
    });
</script>
</body>

</html>
