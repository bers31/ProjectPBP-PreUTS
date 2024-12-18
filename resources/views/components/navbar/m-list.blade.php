<a {{ $attributes }} class="block text-white hover:bg-white hover:text-[#DE2227] hover:rounded-2xl  py-2 {{ request()->fullUrlIs(url($href)) ? 'underline' : '' }}">
  {{ $slot }}
</a>
