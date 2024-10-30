<a {{ $attributes }} class="flex items-center text-white text-sm md:text-base gap-6 {{ request()->fullUrlIs(url($href)) ? 'underline' : '' }}">
  {{ $slot }}
</a>
