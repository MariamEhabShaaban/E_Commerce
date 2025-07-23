<?php require view('partials/header.php'); ?>

  <div class="bg-white shadow-2xl rounded-2xl p-8 w-full max-w-md">
    <h2 class="text-3xl font-bold text-center text-blue-600 mb-6">Create Account</h2>

    <form action="/store_user" method="POST" class="space-y-5">
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="text" name="email" id="email" 
               class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" />
      </div>
      <?php if (isset($errors['email'])): ?>
        <p class="text-red-500 text-xs">
          <?= $errors['email'] ?>
        </p>
      <?php endif ?>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" name="password" id="password" 
               class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" />
      </div>

      <div>
        <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password" 
               class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" />
      </div>
      <?php if (isset($errors['password'])): ?>
        <p class="text-red-500 text-xs">
          <?= $errors['password'] ?>
        </p>
      <?php endif ?>

      <button type="submit"
              class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition duration-200">
        Register
      </button>

      <p class="text-sm text-center text-gray-600 mt-4">
        Already have an account?
        <a href="/login" class="text-blue-600 hover:underline">Login here</a>
      </p>
    </form>
  </div>


<?php require view('partials/footer.php'); ?>
