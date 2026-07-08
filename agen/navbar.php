<?php
?>
<!-- Sidebar Desktop -->
<aside class="d-none d-lg-flex flex-column flex-shrink-0 text-white sidebar-desktop"
    style="width: 280px; min-height: 100vh; position: sticky; top: 0;">
    <?php include 'navbar_content.php'; ?>
</aside>

<!-- Mobile Toggle Navbar (hamburger only, top-left) -->
<nav class="d-lg-none" id="mobile-nav">
    <button class="btn btn-mobile-toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas" aria-label="Toggle menu">
        <i class="bi bi-list fs-2 text-dark"></i>
    </button>
</nav>

<!-- Sidebar Mobile (Offcanvas) — tanpa backdrop/overlay -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarOffcanvas"
    data-bs-backdrop="false" data-bs-scroll="true" style="width: 280px;">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title fw-bold">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
        <?php include 'navbar_content.php'; ?>
    </div>
</div>

<script>
(function () {
    var oc = document.getElementById('sidebarOffcanvas');
    var nav = document.getElementById('mobile-nav');
    if (!oc || !nav) return;
    oc.addEventListener('show.bs.offcanvas', function () { nav.style.display = 'none'; });
    oc.addEventListener('hidden.bs.offcanvas', function () { nav.style.display = ''; });
})();
</script>
