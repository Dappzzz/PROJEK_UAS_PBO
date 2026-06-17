<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ZXYAN Footwear</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="ASSETS/css/style.css">
</head>

<body class="bg-[url('https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?q=80&w=1925&auto=format&fit=crop')] bg-cover bg-center flex items-center justify-center h-screen font-sans relative">

    <div class="absolute inset-0 bg-black/40"></div>

    <div class="bg-white/95 backdrop-blur-md p-8 rounded-xl shadow-2xl w-full max-w-sm border-t-4 border-gray-900 relative z-10">

        <div class="flex justify-center items-center mb-6">
            <div class="bg-gray-900 text-white font-black text-3xl px-4 py-2 rounded-lg tracking-widest shadow-md">
                ZXYAN
            </div>
        </div>
        <p class="text-gray-500 text-center text-sm mb-6 font-semibold uppercase tracking-wider">Premium Footwear</p>

        <?php if (isset($error)) {
            echo "<div class='bg-red-100 text-red-600 p-3 rounded mb-4 text-sm font-bold'>$error</div>";
        } ?>

        <form action="auth.php?action=proses_login" method="POST" class="space-y-4">
            <div>
                <input type="text" name="username" placeholder="Username" required
                    class="w-full px-4 py-3 bg-gray-100 border border-transparent rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:bg-white transition shadow-inner">
            </div>
            <div>
                <input type="password" name="password" placeholder="Password" required
                    class="w-full px-4 py-3 bg-gray-100 border border-transparent rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:bg-white transition shadow-inner">
            </div>
            <button type="submit"
                class="w-full bg-gray-900 text-white font-bold py-3 px-4 rounded-lg hover:bg-gray-800 transition shadow-lg mt-2 tracking-widest">
                MASUK
            </button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-6 font-medium">
            Belum punya akun? <a href="auth.php?action=register" class="text-gray-900 font-black hover:underline">Daftar di sini</a>
        </p>
    </div>

</body>

</html>