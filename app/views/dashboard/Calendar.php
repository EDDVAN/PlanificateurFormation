<?php require_once __DIR__ . '/../layout/Head.php'; ?>

<body class="flex relative flex-col md:flex-row">
    <?php include __DIR__ . '/../layout/DashSidebar.php'; ?>
    <section class="flex-1">
        <?php include __DIR__ . '/../layout/Calendar.php'; ?>
    </section>
</body>

</html>