<x-app-layout>
<x-slot name="title">Notifications — FreshTrack</x-slot>

<div x-data="notifCenter()" x-init="init()">

{{-- ── PAGE HEADER ── --}}
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-7 fade-up">
    <div>
        <h1 class="text-[26px] font-black text-gray-900">Notification Center</h1>
        <p class="text-[13.5px] text-gray-500 mt-0.5">All system alerts, AI recommendations, and activity logs</p>
    </div>
    <div class="flex items-center gap-3">
        <button @click="markAllRead()"
                class="btn btn-outline btn-md text-[13px] flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
            </svg>
            Mark All Read
        </button>
        <button @click="clearAll()"
                class="btn btn-outline btn-md text-[13px] text-red-500 hover:bg-red-50 hover:border-red-300 flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
            </svg>
            Clear All
        </button>
    </div>
</div>

{{-- ── SUMMARY STRIP ── --}}
<div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-6 fade-up delay-1">
    @php
    $strips = [
        ['Total',    '14', 'g-violet', 'M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9'],
        ['Critical', '3',  'g-rose',   'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z'],
        ['Unread',   '6',  'g-amber',  'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
        ['Today',    '10', 'g-green',  'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
    ];
    @endphp
    @foreach($strips as [$label,$count,$grad,$path])
    <div class="card p-4 flex items-center gap-3 shimmer">
        <div class="icon-ring">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $path }}"/>
            </svg>
        </div>
        <div>
            <p class="text-[20px] font-black text-gray-900 leading-none">{{ $count }}</p>
            <p class="text-[11.5px] text-gray-500 font-medium">{{ $label }}</p>
        </div>
    </div>
    @endforeach
</div>

{{-- ── FILTER TABS ── --}}
<div class="flex flex-wrap gap-2 mb-6 fade-up delay-2">
    @php
    $tabs = [
        ['all',      'All',      '14', 'M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9'],
        ['critical', 'Critical', '3',  'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z'],
        ['warning',  'Warning',  '5',  'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z'],
        ['info',     'Info',     '4',  'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
        ['success',  'Success',  '2',  'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
    ];
    @endphp
    @foreach($tabs as [$key,$label,$count,$iconPath])
    <button @click="activeFilter = '{{ $key }}'"
            :class="activeFilter === '{{ $key }}'
                ? 'g-violet text-white shadow-md border-transparent'
                : 'bg-white text-gray-600 border-gray-200 hover:border-violet-300 hover:text-violet-700 hover:bg-violet-50'"
            class="flex items-center gap-2 px-4 py-2.5 rounded-xl text-[12.5px] font-semibold border transition-all">
        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $iconPath }}"/>
        </svg>
        {{ $label }}
        <span :class="activeFilter === '{{ $key }}' ? 'bg-white/20 text-white' : 'bg-gray-100 text-gray-500'"
              class="text-[10px] font-bold px-1.5 py-0.5 rounded-full transition-colors">
            {{ $count }}
        </span>
    </button>
    @endforeach
</div>

{{-- ── NOTIFICATION CARDS ── --}}
<div class="space-y-3 fade-up delay-3">
@php
$notifications = [
    [
        'type'    => 'critical',
        'grad'    => 'g-rose',
        'icon'    => 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z',
        'accentBg'=> 'bg-red-50',
        'accentBorder'=> 'border-red-200',
        'accentText'  => 'text-red-700',
        'badge'   => 'badge-red',
        'badgeLabel'=> 'Critical',
        'border'  => 'border-l-4 border-red-400',
        'title'   => 'Low Stock Alert',
        'subtitle'=> 'Pomelo stock critically low',
        'body'    => 'Pomelo (POM-034) has only 8 kg remaining. Current daily demand is 20 kg/day. Stock will be completely depleted within 12 hours if not restocked immediately.',
        'time'    => '2 min ago',
        'read'    => false,
        'action'  => 'Restock Now',
        'actionRoute' => 'inventory',
    ],
    [
        'type'    => 'warning',
        'grad'    => 'g-orange',
        'icon'    => 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z',
        'accentBg'=> 'bg-orange-50',
        'accentBorder'=> 'border-orange-200',
        'accentText'  => 'text-orange-700',
        'badge'   => 'badge-orange',
        'badgeLabel'=> 'Warning',
        'border'  => 'border-l-4 border-orange-400',
        'title'   => 'Spoilage Risk — High',
        'subtitle'=> 'Durian batch DUR-112 at 78% spoilage risk',
        'body'    => 'Sensor data shows temperature 28°C and humidity 75% for Durian DUR-112. AI prediction: 78% chance of spoilage within 24 hours. Potential loss: ₱18,290.',
        'time'    => '15 min ago',
        'read'    => false,
        'action'  => 'Apply Discount',
        'actionRoute' => 'spoilage',
    ],
    [
        'type'    => 'warning',
        'grad'    => 'g-amber',
        'icon'    => 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z',
        'accentBg'=> 'bg-amber-50',
        'accentBorder'=> 'border-amber-200',
        'accentText'  => 'text-amber-700',
        'badge'   => 'badge-amber',
        'badgeLabel'=> 'Warning',
        'border'  => 'border-l-4 border-amber-400',
        'title'   => 'Spoilage Risk — Moderate',
        'subtitle'=> 'Mango MNG-001 at 45% spoilage risk',
        'body'    => 'Mango batch MNG-001 shows moderate spoilage indicators. Consider applying a 15% discount to accelerate sales and minimize losses.',
        'time'    => '32 min ago',
        'read'    => false,
        'action'  => 'View Details',
        'actionRoute' => 'spoilage',
    ],
    [
        'type'    => 'info',
        'grad'    => 'g-indigo',
        'icon'    => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z',
        'accentBg'=> 'bg-violet-50',
        'accentBorder'=> 'border-violet-200',
        'accentText'  => 'text-violet-700',
        'badge'   => 'badge-violet',
        'badgeLabel'=> 'AI Insight',
        'border'  => '',
        'title'   => 'AI Forecast Ready',
        'subtitle'=> 'New 7-day demand forecast generated',
        'body'    => 'FreshTrack AI has generated an updated sales forecast for June 24–30. Mango demand predicted to increase 38% this weekend. Recommend increasing stock by 30 kg.',
        'time'    => '1 hr ago',
        'read'    => false,
        'action'  => 'View Forecast',
        'actionRoute' => 'forecast',
    ],
    [
        'type'    => 'info',
        'grad'    => 'g-blue',
        'icon'    => 'M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z',
        'accentBg'=> 'bg-blue-50',
        'accentBorder'=> 'border-blue-200',
        'accentText'  => 'text-blue-700',
        'badge'   => 'badge-blue',
        'badgeLabel'=> 'Info',
        'border'  => '',
        'title'   => 'Scanner Analysis Complete',
        'subtitle'=> 'Fruit quality scan results ready',
        'body'    => 'Image processing analysis completed for 3 fruit samples. Results: Mango (A+ Grade, 92% confidence), Banana (A Grade), Pomelo (C Grade — recommend discount).',
        'time'    => '1.5 hrs ago',
        'read'    => true,
        'action'  => 'View Results',
        'actionRoute' => 'scanner',
    ],
    [
        'type'    => 'success',
        'grad'    => 'g-green',
        'icon'    => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4',
        'accentBg'=> 'bg-green-50',
        'accentBorder'=> 'border-green-200',
        'accentText'  => 'text-green-700',
        'badge'   => 'badge-green',
        'badgeLabel'=> 'Success',
        'border'  => '',
        'title'   => 'Restock Completed',
        'subtitle'=> 'Mango batch MNG-003 (200 kg) received',
        'body'    => 'New mango batch MNG-003 has been received from Davao Fresh Farms. 200 kg added to inventory. Batch expires June 30, 2026.',
        'time'    => '2 hrs ago',
        'read'    => true,
        'action'  => 'View Inventory',
        'actionRoute' => 'inventory',
    ],
    [
        'type'    => 'success',
        'grad'    => 'g-emerald',
        'icon'    => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
        'accentBg'=> 'bg-green-50',
        'accentBorder'=> 'border-green-200',
        'accentText'  => 'text-green-700',
        'badge'   => 'badge-green',
        'badgeLabel'=> 'Success',
        'border'  => '',
        'title'   => "Sales Target Reached",
        'subtitle'=> "Today's ₱18,000 sales milestone hit",
        'body'    => "Congratulations! Today's sales have reached the ₱18,000 target at 2:30 PM — 3.5 hours ahead of schedule.",
        'time'    => '2.5 hrs ago',
        'read'    => true,
        'action'  => 'View Sales',
        'actionRoute' => 'sales',
    ],
    [
        'type'    => 'info',
        'grad'    => 'g-blue',
        'icon'    => 'M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z',
        'accentBg'=> 'bg-blue-50',
        'accentBorder'=> 'border-blue-200',
        'accentText'  => 'text-blue-700',
        'badge'   => 'badge-blue',
        'badgeLabel'=> 'Info',
        'border'  => '',
        'title'   => 'Weather Alert',
        'subtitle'=> 'High humidity warning for Davao City',
        'body'    => 'Philippine Atmospheric Agency reports 78% humidity expected for the next 48 hours. This increases spoilage risk for Durian and Mango. Take preventive action.',
        'time'    => '3 hrs ago',
        'read'    => true,
        'action'  => 'View Spoilage',
        'actionRoute' => 'spoilage',
    ],
    [
        'type'    => 'info',
        'grad'    => 'g-indigo',
        'icon'    => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z',
        'accentBg'=> 'bg-violet-50',
        'accentBorder'=> 'border-violet-200',
        'accentText'  => 'text-violet-700',
        'badge'   => 'badge-violet',
        'badgeLabel'=> 'AI Insight',
        'border'  => '',
        'title'   => 'Decision Support Update',
        'subtitle'=> '3 new AI recommendations available',
        'body'    => 'FreshTrack AI has generated 3 new business recommendations: (1) Sell Mango first, (2) Restock Pomelo, (3) Apply 10% discount on Pineapple.',
        'time'    => '5 hrs ago',
        'read'    => true,
        'action'  => 'View AI Advice',
        'actionRoute' => 'decision-support',
    ],
    [
        'type'    => 'info',
        'grad'    => 'g-blue',
        'icon'    => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z',
        'accentBg'=> 'bg-blue-50',
        'accentBorder'=> 'border-blue-200',
        'accentText'  => 'text-blue-700',
        'badge'   => 'badge-blue',
        'badgeLabel'=> 'Info',
        'border'  => '',
        'title'   => 'User Activity',
        'subtitle'=> 'Pedro Reyes recorded 5 new transactions',
        'body'    => 'Cashier Pedro Reyes has recorded 5 transactions totaling ₱4,820 between 10:00 AM and 12:30 PM today.',
        'time'    => '6 hrs ago',
        'read'    => true,
        'action'  => 'View Transactions',
        'actionRoute' => 'sales',
    ],
];
@endphp

@foreach($notifications as $i => $n)
<div x-show="activeFilter === 'all' || activeFilter === '{{ $n['type'] }}'"
     x-transition:enter="transition ease-out duration-200"
     x-transition:enter-start="opacity-0 translate-y-2"
     x-transition:enter-end="opacity-100 translate-y-0"
     class="card p-0 overflow-hidden card-lift {{ $n['border'] }} {{ $n['read'] ? 'opacity-75' : '' }}"
     :class="dismissed.includes({{ $i }}) ? 'hidden' : ''">
    <div class="flex items-stretch">
        {{-- Colored icon column --}}
        <div class="{{ $n['accentBg'] }} {{ $n['accentBorder'] }} border-r flex items-start justify-center pt-5 px-4 flex-shrink-0" style="min-width:64px">
            <div class="w-10 h-10 {{ $n['grad'] }} rounded-xl shadow-md flex items-center justify-center flex-shrink-0">
                <svg class="w-4.5 w-[18px] h-[18px] text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $n['icon'] }}"/>
                </svg>
            </div>
        </div>
        {{-- Content --}}
        <div class="flex-1 min-w-0 p-5">
            <div class="flex items-start justify-between gap-3 mb-2">
                <div class="flex items-center gap-2 flex-wrap">
                    <span class="badge {{ $n['badge'] }} text-[10.5px]">{{ $n['badgeLabel'] }}</span>
                    <h3 class="font-bold text-gray-900 text-[14.5px]">{{ $n['title'] }}</h3>
                    @if(!$n['read'])
                        <span class="w-2 h-2 bg-violet-500 rounded-full flex-shrink-0 inline-block pulse-dot"></span>
                    @endif
                </div>
                <div class="flex items-center gap-2 flex-shrink-0">
                    <span class="text-[11.5px] text-gray-400 font-medium">{{ $n['time'] }}</span>
                    <button @click="dismissed.push({{ $i }})"
                            class="p-1 rounded-lg text-gray-300 hover:text-gray-500 hover:bg-gray-100 transition-colors" title="Dismiss">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
            <p class="text-[13px] font-semibold text-gray-700 mb-1">{{ $n['subtitle'] }}</p>
            <p class="text-[12.5px] text-gray-500 leading-relaxed mb-4">{{ $n['body'] }}</p>
            <div class="flex items-center gap-2 flex-wrap">
                <a href="{{ route($n['actionRoute']) }}"
                   class="btn btn-sm text-[12px] {{ !$n['read'] ? $n['grad'].' text-white' : 'btn-outline' }} flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                    {{ $n['action'] }}
                </a>
                @if(!$n['read'])
                <button class="btn btn-outline btn-sm text-[12px] flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    Mark as Read
                </button>
                @endif
                @if($n['read'])
                <span class="flex items-center gap-1 text-[11.5px] text-gray-400 font-medium">
                    <svg class="w-3.5 h-3.5 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    Read
                </span>
                @endif
            </div>
        </div>
    </div>
</div>
@endforeach

{{-- Empty state --}}
<div x-show="dismissed.length >= {{ count($notifications) }} && activeFilter === 'all'"
     class="card p-16 text-center fade-up">
    <div class="w-16 h-16 bg-violet-50 rounded-3xl flex items-center justify-center mx-auto mb-4">
        <svg class="w-8 h-8 text-violet-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
        </svg>
    </div>
    <p class="text-[15px] font-bold text-gray-400">All clear!</p>
    <p class="text-[13px] text-gray-300 mt-1">No notifications to show.</p>
</div>

</div>{{-- end space-y-3 --}}

{{-- ── PAGINATION ── --}}
<div class="flex items-center justify-between mt-7 fade-up delay-5">
    <p class="text-[12.5px] text-gray-500">
        Showing <span class="font-bold text-gray-800">1–10</span> of
        <span class="font-bold text-gray-800">47</span> notifications
    </p>
    <div class="flex items-center gap-1.5">
        <button class="w-8 h-8 flex items-center justify-center rounded-xl text-gray-400 hover:bg-gray-100 border border-gray-200 transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>
        @foreach([1,2,3,4,5] as $p)
        <button class="w-8 h-8 flex items-center justify-center rounded-xl text-[12.5px] font-semibold transition-all {{ $p===1 ? 'g-violet text-white shadow-sm' : 'text-gray-600 hover:bg-gray-100 border border-gray-200' }}">{{ $p }}</button>
        @endforeach
        <button class="w-8 h-8 flex items-center justify-center rounded-xl text-gray-400 hover:bg-gray-100 border border-gray-200 transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
            </svg>
        </button>
    </div>
</div>

</div>{{-- end x-data --}}

@push('scripts')
<script>
function notifCenter() {
    return {
        activeFilter: 'all',
        dismissed: [],
        init() {},
        markAllRead() {
            // In a real app this would send an AJAX call
        },
        clearAll() {
            this.dismissed = Array.from({ length: {{ count($notifications) }} }, (_, i) => i);
        },
    }
}
</script>
@endpush
</x-app-layout>
