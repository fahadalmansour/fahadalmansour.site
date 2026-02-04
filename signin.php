<?php
require_once __DIR__ . '/auth.php';

// Already logged in? Go to dashboard
if (is_authenticated()) {
    header('Location: dashboard.php');
    exit;
}

$error = '';
$locked_out = false;

// Check if locked out from too many failed attempts
if (isset($_SESSION['login_attempts']) && $_SESSION['login_attempts'] >= 5) {
    if (time() - $_SESSION['login_lockout'] < 900) { // 15 min lockout
        $locked_out = true;
        $error = 'Too many failed attempts. Please try again later.';
    } else {
        unset($_SESSION['login_attempts'], $_SESSION['login_lockout']);
    }
}

if (!$locked_out && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['csrf_token'] ?? '';
    if (!verify_csrf_token($token)) {
        $error = 'Invalid request. Please try again.';
    } else {
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        if (attempt_login($username, $password)) {
            unset($_SESSION['login_attempts'], $_SESSION['login_lockout']);
            header('Location: dashboard.php');
            exit;
        } else {
            $_SESSION['login_attempts'] = ($_SESSION['login_attempts'] ?? 0) + 1;
            if ($_SESSION['login_attempts'] >= 5) {
                $_SESSION['login_lockout'] = time();
                $error = 'Too many failed attempts. Please try again later.';
            } else {
                $error = 'Invalid username or password.';
            }
            usleep(500000);
        }
    }
}

$csrf = get_csrf_token();
?>
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Fahad Almansour</title>
  <link rel="icon" type="image/svg+xml" href="/favicon.svg">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          fontFamily: {
            sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
          },
        },
      },
    }
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-950 text-gray-100 antialiased font-sans min-h-screen flex flex-col">

  <!-- Gradient accent line at top -->
  <div class="h-0.5 bg-gradient-to-r from-emerald-500 via-blue-500 to-violet-500"></div>

  <div class="flex-1 flex items-center justify-center px-6 py-12">
    <div class="w-full max-w-sm">
      <div class="text-center mb-8">
        <a href="index.html" class="inline-block">
          <div class="w-20 h-20 rounded-full bg-gradient-to-r from-emerald-500 to-blue-500 p-[2px] mx-auto mb-5">
            <div class="w-full h-full rounded-full bg-gray-950 flex items-center justify-center text-xl font-semibold text-white">
              FA
            </div>
          </div>
        </a>
        <h1 class="text-2xl font-bold text-white">Homelab Dashboard</h1>
        <p class="text-sm text-gray-400 mt-2">Sign in to access your infrastructure</p>
      </div>

      <?php if ($error): ?>
      <div class="mb-4 p-3 rounded-lg bg-red-500/10 border border-red-500/20 text-red-400 text-sm text-center">
        <?= htmlspecialchars($error) ?>
      </div>
      <?php endif; ?>

      <div class="bg-gray-900 rounded-2xl p-8 border border-gray-800">
        <form method="POST" class="space-y-5">
          <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf) ?>">

          <div>
            <label for="username" class="block text-sm font-medium text-gray-300 mb-2">Username</label>
            <input type="text" id="username" name="username" required autocomplete="username" autofocus
                   class="w-full px-4 py-3 rounded-xl bg-gray-950 border border-gray-700 text-white placeholder-gray-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all">
          </div>

          <div>
            <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
            <input type="password" id="password" name="password" required autocomplete="current-password"
                   class="w-full px-4 py-3 rounded-xl bg-gray-950 border border-gray-700 text-white placeholder-gray-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all">
          </div>

          <button type="submit"
                  class="w-full py-3 px-4 bg-emerald-500 hover:bg-emerald-400 text-white shadow-lg shadow-emerald-500/25 rounded-xl text-sm font-semibold transition-all focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 focus:ring-offset-gray-950">
            Sign In
          </button>
        </form>
      </div>

      <p class="mt-6 text-center text-xs text-gray-500">
        <a href="index.html" class="hover:text-gray-300 transition-colors">&larr; Back to site</a>
      </p>
    </div>
  </div>

</body>
</html>
