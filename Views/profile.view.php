<?php
require view('partials/header.php');
require view('partials/nav.php');

// make sure $email is defined before this view is loaded
?>

<div class="flex justify-center items-center min-h-screen bg-gray-100 px-4">
  <div class="bg-white shadow-xl rounded-2xl p-10 text-center max-w-2lg w-full">
    <h1 class="text-3xl font-bold text-blue-600 mb-4">
      Hello, <?= htmlspecialchars($email) ?> 👋
    </h1>
    <p class="text-gray-600">Welcome In our Website</p>
  </div>
</div>

<?php require view('partials/footer.php'); ?>
