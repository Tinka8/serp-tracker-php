<?php 

include_once __DIR__ . '/../../functions.php';



$current_page = $_SERVER['REQUEST_URI'];

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>SERP tracker</title>
</head>
<body>
    <div class="wrapper <?php echo switch_theme() ?> pt-10">
        <header class="container max-w-screen-md mx-auto">
            <h1 class="text-2xl font-bold">
                SERP tracker
            </h1>

            <nav>
                <ul class="flex space-x-4">
                    <li>
                        <a 
                            href="/"
                            class="<?php echo $_SERVER['REQUEST_URI'] === '/' ? 'underline' : '' ?>">
                            Home</a
                        >
                    </li>
                    <li>
                        <a 
                            href="/scrape.php"
                            class="<?php echo $_SERVER['REQUEST_URI'] === '/scrape.php' ? 'underline' : '' ?>">
                            Scrape</a
                        >
                    </li>
                    <li>
                        <a 
                            href="/login.php"
                            class="<?php echo $_SERVER['REQUEST_URI'] === '/login.php' ? 'underline' : '' ?>">
                            Login</a
                        >
                    </li>
                    <li>
                        <a 
                            href="/profile.php"
                            class="<?php echo $_SERVER['REQUEST_URI'] === '/profile.php' ? 'underline' : '' ?>">
                            Profile</a
                        >
                    </li>
                    <li>
                        <a 
                            href="/register.php"
                            class="<?php echo $_SERVER['REQUEST_URI'] === '/register.php' ? 'underline' : '' ?>">
                            Register</a
                        >
                    </li>
                </ul>
            </nav>
        </header>
    </div>

    <div class="min-h-full">
        <nav class="bg-zinc-200 text-black">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <a href="/" class="text-sm"><span class="block font-semibold -mb-2 text-base">SERP</span>tracker</a>
                        </div>
                        <div class="hidden md:block">
                            <ul class="ml-10 flex items-baseline space-x-4">
                                <li>
                                    <a 
                                        href="/" 
                                        <?php echo $_SERVER['REQUEST_URI'] === '/' ? 
                                        set_active_page($current_page) : '' ?>>
                                        Home</a
                                    >
                                </li>
                                <li>
                                    <a 
                                        href="/scrape.php" 
                                        <?php echo $_SERVER['REQUEST_URI'] === '/scrape.php' ? 
                                        set_active_page($current_page) : '' ?>>
                                        Scrape</a
                                    >
                                </li>
                                <li>
                                    <a 
                                        href="/login.php" 
                                        <?php echo $_SERVER['REQUEST_URI'] === '/login.php' ? 
                                        set_active_page($current_page) : '' ?>>                                  
                                        Login</a
                                    >
                                </li>
                              
                                <a href="#" class="hover:bg-zinc-400 hover:bg-opacity-75 rounded-md px-4 py-2 text-sm font-medium">Sites</a>
                                <a href="#" class="hover:bg-zinc-400 hover:bg-opacity-75 rounded-md px-4 py-2 text-sm font-medium">Keywords</a>
                                <a href="#" class="hover:bg-zinc-400 hover:bg-opacity-75 rounded-md px-4 py-2 text-sm font-medium">Reports</a>
                                <a href="#" class="hover:bg-zinc-400 hover:bg-opacity-75 rounded-md px-4 py-2 text-sm font-medium">About</a>
                            </ul>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <button type="button" class="relative rounded-full bg-indigo-600 p-1 text-indigo-200 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-indigo-600">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">View notifications</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                </svg>
                            </button>

                            <!-- Profile dropdown -->
                            <div class="relative ml-3">
                                <div>
                                    <button type="button" class="relative flex max-w-xs items-center rounded-full bg-indigo-600 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-indigo-600" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="absolute -inset-1.5"></span>
                                        <span class="sr-only">Open user menu</span>
                                        <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    </button>
                                </div>

                                <!--
                                Dropdown menu, show/hide based on menu state.

                                Entering: "transition ease-out duration-100"
                                    From: "transform opacity-0 scale-95"
                                    To: "transform opacity-100 scale-100"
                                Leaving: "transition ease-in duration-75"
                                    From: "transform opacity-100 scale-100"
                                    To: "transform opacity-0 scale-95"
                                -->
                                <div class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button type="button" class="relative inline-flex items-center justify-center rounded-md bg-indigo-600 p-2 text-indigo-200 hover:bg-indigo-500 hover:bg-opacity-75 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-indigo-600" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <!-- Menu open: "hidden", Menu closed: "block" -->
                            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <!-- Menu open: "block", Menu closed: "hidden" -->
                            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </div>


    <header class="bg-white shadow-sm">
    <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6 lg:px-8">
        <h1 class="text-lg font-semibold leading-6 text-gray-900">Dashboard</h1>
    </div>
    </header>
    <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <!-- Your content -->
    </div>
    </main>
    </div>

    