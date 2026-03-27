@props(['color' => ''])

<div class="flex items-center gap-2">
    <svg {{ $attributes->merge(['class' => 'fill-indigo-600']) }} viewBox="0 0 640 512" xmlns="http://www.w3.org/2000/svg">
        <path d="M623.1 136.9l-282.7-101.2c-13.7-4.9-28.8-4.9-42.5 0L16.9 136.9C6.5 140.6 0 150.4 0 161.5s6.5 20.9 16.9 24.6l110.1 39.4c-12 21.1-19 45.3-19 71.3V336c0 10.3 5.6 19.8 14.7 24.9l160 88c11.5 6.3 25.1 6.3 36.6 0l160-88c9.1-5.1 14.7-14.6 14.7-24.9V296.8c0-26-7-50.2-19-71.3l110.1-39.4c10.4-3.7 16.9-13.5 16.9-24.6s-6.5-20.9-16.9-24.6zM320 448L160 360V304c0-44.2 35.8-80 80-80h160c44.2 0 80 35.8 80 80v56L320 448z"/>
    </svg>
    <span class="text-2xl font-bold text-slate-800 tracking-tight hidden sm:block">
        <span class="{{$color}}">Edu</span><span class="text-indigo-600">Connect</span>
    </span>
</div>
