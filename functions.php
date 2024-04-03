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
        return 'bg-zinc-200';
    }
}