<?php require view('partials/header.php'); ?>

<div class="bg-white shadow-2xl rounded-2xl p-8 w-full max-w-md">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">E_Commerce</h2>
     <?php if (isset($_SESSION['register'])): ?>
            <div
                class="text-center mb-5 px-4 py-3 rounded border 
              <?php echo $_SESSION['register'] === 'Registed Successfully' ? 'bg-green-10 text-green-800 border-green-300' : 'bg-red-100 text-red-800 border-red-300'; ?>">
                <?= $_SESSION['register']; endif ?>
                
        

    <form action="/attempt_login" method="POST" class="space-y-5">
       
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="text" name="email" id="email"
                class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <?php if (isset($errors['email'])): ?>
            <p class="text-red-500 text-xs">
                <?= $errors['email'] ?>
            </p>
        <?php endif ?>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password"
                class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <?php if (isset($errors['password'])): ?>
            <p class="text-red-500 text-xs">
                <?= $errors['password'] ?>
            </p>
        <?php endif ?>



        <button type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition duration-200">
            Login
        </button>
    </form>

    <p class="mt-6 text-center text-sm text-gray-600">
        Don’t have an account?
        <a href="/register" class="text-blue-600 font-medium hover:underline">Sign up</a>
    </p>
</div>
<?php require view('partials/footer.php'); ?>