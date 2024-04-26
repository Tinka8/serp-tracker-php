<?php 

/**
 * Get CSS classes based on query param
 * 
 * @return string CSS classes
 */
function switch_theme(): string {
    if (isset($_GET['theme']) && $_GET['theme'] === 'dark') {
        return 'bg-zinc-800 text-zinc-100';
    } else {
        return 'bg-white text-black';
    }
}


/**
 * Set CSS class for current page
 * 
 * @return string CSS classes 
 */
function set_active_page($current_page): string {
    if ($_SERVER['REQUEST_URI'] === $current_page) { 
        return 'aria-current="page"' 
        . ' class="border-b border-slate-500 px-2 py-2 text-sm font-medium"'; 
    } else {
        return 'class="hover:border-b hover:border-slate-500 px-2 py-2 text-sm font-medium"';
    }
}