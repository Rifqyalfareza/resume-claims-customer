<?php 
// $adminLogin = $_SESSION['username'] ?? 'null';
$loginID = $_SESSION['id_admin'] ?? 'null';
if($loginID == 1 or $loginID == 2){
  $adminLoginSukses = 'Mr. Cece';
}else{
  $adminLoginSukses = 'Mr. Nanang';
}
?>
<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
  <div class="px-3 py-4 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start rtl:justify-end">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
          <span class="sr-only">Open sidebar</span>
          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
          </svg>
        </button>
        <a href="?page=dashboard" class="flex ms-2 md:me-24">
          <img src="../../src/assets/sjm.png" class="h-5 me-3" alt="SJM" />
          <span class="self-center text-sm font-bold sm:text-md whitespace-nowrap text-blue-700 dark:text-white">QA Apps</span>
        </a>
      </div>
      <div class="flex items-center">
        <div class="flex items-center ms-3">
          <div class="me-5">
            <h6 class="dark:text-white">
              <span id="time" class="sm:hidden"></span>
              <span class="hidden md:inline">
                <span id="greeting"></span>, <?= $adminLoginSukses ?>
              </span>
            </h6>
          </div>
          <div>
            <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-blue-500 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
              <span class="sr-only">Open user menu</span>
              <img class="w-8 h-8 rounded-full" src="../../src/assets/profile.png" alt="user photo">
            </button>
          </div>
          <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-sm shadow-sm dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
            <div class="px-4 py-3" role="none">
              <p class="text-sm text-gray-900 dark:text-white" role="none">
                <?= $adminLoginSukses ?> ( <?php if($loginID == 1 or $loginID == 2){echo 'QA';}else{echo 'Ass. MGR';} ?> )
              </p>
              
              <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                PT Sebastian Jaya Metal
              </p>
            </div>
            <ul class="py-1" role="none">
              <li>
                <a href="?page=dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
              </li>
              <!-- <li>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Settings</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Earnings</a>
              </li>
              <li> -->
                <a href="#" onclick="logout()" class="block px-4 py-2 text-sm text-red-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>
<script>
  function logout(){
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, logout!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'logout.php'
      }
    })
  }

  function getTime(){
    const now = new Date();
    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0');
    const timeString = `${hours}:${minutes}:${seconds}`;
    
    let greeting;
    if (now.getHours() < 10) {
      greeting = 'Good Morning';
    } else if (now.getHours() < 18) {
      greeting = 'Good Afternoon';
    } else {
      greeting = 'Good Evening';
    }

    document.getElementById('time').textContent = timeString;
    document.getElementById('greeting').textContent = greeting;
  }
  
  getTime();
  setInterval(getTime, 1000); // Update time every second
</script>