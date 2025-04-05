<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        if (searchInput) {
            searchInput.focus();  // Fokuskan elemen input
            searchInput.setSelectionRange(searchInput.value.length, searchInput.value.length);  // Tempatkan cursor di akhir
        }
    });

    let debounceTimeout;

    document.getElementById('searchInput').addEventListener('input', function(event) {
        // Clear timeout sebelumnya jika ada input lagi sebelum delay selesai
        clearTimeout(debounceTimeout);

        // Set delay untuk menjalankan event setelah 1 detik (1000ms)
        debounceTimeout = setTimeout(function() {
            const query = event.target.value;
            const url = new URL(window.location.href);
            url.searchParams.set('search', query);
            url.searchParams.set('page', 1);
            window.history.replaceState({}, '', url);

            // Delay sebelum memuat ulang halaman (misalnya, 1 detik = 1000ms)
            window.location.reload();
        }, 1000); // 1000ms (1 detik) delay
    });
</script>
