@php
$route = request()->route()->getName();
$navGroups = [
    'Overview' => [
        ['dashboard',        '📊', 'Dashboard',         'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
    ],
    'Commerce' => [
        ['pos',              '🛒', 'Point of Sale',      'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z'],
        ['sales',            '💰', 'Sales',              'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
        ['inventory',        '📦', 'Inventory',          'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'],
        ['reports',          '📄', 'Reports',            'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
    ],
    'AI & Analytics' => [
        ['forecast',         '🔮', 'AI Forecast',        'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
        ['spoilage',         '⚠️', 'Spoilage',           'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z'],
        ['scanner',          '📷', 'Image Processing',   'M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z'],
        ['decision-support', '🧠', 'Decision Support',   'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z'],
        ['analytics',        '📈', 'Analytics',          'M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z'],
    ],
    'System' => [
        ['users',            '👥', 'User Management',    'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z'],
        ['settings',         '⚙️', 'Settings',           'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z'],
        ['notifications',    '🔔', 'Notifications',      'M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9'],
    ],
];
@endphp

<aside x-bind:class="sidebarOpen ? 'w-[260px]' : 'w-[72px]'"
       class="sidebar bg-white border-r border-[rgba(124,58,237,.08)] shadow-[2px_0_20px_rgba(124,58,237,.06)] flex flex-col h-screen flex-shrink-0 z-40 overflow-hidden">

    {{-- Logo --}}
    <div class="flex items-center h-[68px] px-4 border-b border-[rgba(124,58,237,.06)] flex-shrink-0">
        <div class="flex items-center gap-3 min-w-0">
            <div class="w-10 h-10 g-violet rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg shadow-violet-300/40">
                <span class="text-xl">🍋</span>
            </div>
            <div x-show="sidebarOpen" x-transition:enter="transition-opacity duration-200 delay-100" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="min-w-0">
                <p class="font-black text-[15px] text-gray-900 leading-tight" style="font-family:Poppins,sans-serif">FruitIQ</p>
                <p class="text-[11px] text-violet-500 font-medium truncate">Davao City · AI Platform</p>
            </div>
        </div>
    </div>

    {{-- Navigation --}}
    <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-0.5">
        @foreach($navGroups as $groupName => $items)
            <div x-show="sidebarOpen" x-transition class="nav-group">{{ $groupName }}</div>
            <div x-show="!sidebarOpen" class="h-3"></div>

            @foreach($items as [$r, $emoji, $label, $iconPath])
            @php $active = $route === $r; @endphp
            <a href="{{ route($r) }}" data-tip="{{ $label }}"
               class="nav-link {{ $active ? 'active' : '' }}">
                <span class="text-base w-5 flex-shrink-0 text-center leading-none {{ $active ? '' : 'group-hover:scale-110' }}">{{ $emoji }}</span>
                <span x-show="sidebarOpen" x-transition:enter="transition-opacity duration-200 delay-75" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity duration-75" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="truncate text-[13.5px]">{{ $label }}</span>
                @if($active)
                    <span x-show="sidebarOpen" class="ml-auto w-1.5 h-1.5 bg-white/60 rounded-full flex-shrink-0"></span>
                @endif
            </a>
            @endforeach
        @endforeach

        <div class="pt-3 mt-2 border-t border-[rgba(124,58,237,.08)]">
            <a href="{{ route('login') }}" data-tip="Logout"
               class="nav-link text-red-500 hover:bg-red-50 hover:text-red-600">
                <span class="text-base w-5 flex-shrink-0 text-center">🚪</span>
                <span x-show="sidebarOpen" x-transition class="truncate text-[13.5px]">Logout</span>
            </a>
        </div>
    </nav>

    {{-- User card --}}
    <div x-show="sidebarOpen" x-transition class="border-t border-[rgba(124,58,237,.06)] p-3 flex-shrink-0">
        <div class="flex items-center gap-3 p-3 bg-[#F5F3FF] rounded-2xl cursor-pointer hover:bg-violet-100/60 transition-colors">
            <div class="w-9 h-9 g-violet rounded-full flex items-center justify-center text-white text-xs font-black flex-shrink-0 shadow-md shadow-violet-200">JD</div>
            <div class="min-w-0 flex-1">
                <p class="text-[12.5px] font-semibold text-gray-900 truncate">Juan Dela Cruz</p>
                <p class="text-[11px] text-violet-500 truncate font-medium">Owner · Administrator</p>
            </div>
            <div class="w-2 h-2 bg-green-400 rounded-full flex-shrink-0 pulse-dot ring-2 ring-white"></div>
        </div>
    </div>
    <div x-show="!sidebarOpen" class="border-t border-[rgba(124,58,237,.06)] p-3 flex justify-center flex-shrink-0">
        <div class="w-9 h-9 g-violet rounded-full flex items-center justify-center text-white text-xs font-black shadow-md shadow-violet-200">JD</div>
    </div>
</aside>
