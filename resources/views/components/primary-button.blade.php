<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-yellow-600 dark:bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-black dark:text-gray-800 uppercase tracking-widest hover:bg-yellow-500 dark:hover:bg-yellow-500 focus:bg-yellow-500 dark:focus:bg-yellow-500 active:bg-yellow-600 dark:active:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 dark:focus:ring-offset-yellow-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
