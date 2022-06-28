<div class='w-fit my-2'>
    <a {{ $attributes->merge(['class' => 'bg-teal-600 hover:bg-teal-700 text-white font-semibold py-2 px-4 border border-teal-600 hover:border-transparent rounded']) }}>
        {{ $slot }}
    </a>
</div>