<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-teal-600 hover:bg-teal-700 text-white font-semibold py-2 px-4 border border-teal-600 hover:border-transparent rounded']) }}
        onclick="{{ (isset($delete) && $delete) ? "return confirm('Are you sure you want to delete this item?');" : '' }}"
    >
    {{ $slot }}
</button>
