<?php require_once __DIR__ . '/../layout/Head.php'; ?>

<body>
    <form action="/authenticate" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Login</button>
    </form>
</body>

</html>