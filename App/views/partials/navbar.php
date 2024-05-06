<?php
use Framework\Session;
?>

<!-- Nav -->
<header class="bg-blue-800 text-white p-4">
  <div class="container mx-auto flex flex-wrap justify-between items-center">
    <h1 class="text-2xl font-semibold">
      <a href="/test-project/workopia/public/">Workopia</a>
    </h1>
    <nav class="space-x-4 flex flex-wrap items-center mt-4 md:mt-0">
      <?php if (Session::has('user')): ?>

        <div class="flex justify-between items-center gap-4">
          <div>
            Welcome <?= Session::get('user')['name'] ?>
          </div>
          <form method="POST" action="/test-project/workopia/public/auth/logout">
            <button type="submit" class="text-white inline hover:underline">Logout</button>
          </form>
          <a href="/test-project/workopia/public/listings/create" class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded hover:shadow-md transition duration-300 whitespace-nowrap"><i class="fa fa-edit"></i> Post a Job</a>
        </div>
        
               
      <?php else: ?>
        <a href="/test-project/workopia/public/auth/login" class="text-white hover:underline mb-2 md:mb-0">Login</a>
        <a href="/test-project/workopia/public/auth/register" class="text-white hover:underline mb-2 md:mb-0">Register</a>
      <?php endif; ?>
      
      
      
      
      
    </nav>
  </div>
</header>