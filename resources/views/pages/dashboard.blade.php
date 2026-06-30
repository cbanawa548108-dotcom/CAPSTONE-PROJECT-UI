<x-app-layout>
<x-slot name="title">Dashboard — FreshTrack</x-slot>

{{-- HERO BANNER --}}
<div class="relative rounded-3xl p-7 mb-7 overflow-hidden shadow-xl fade-up"
     style="background:linear-gradient(135deg,#7C3AED 0%,#6D28D9 45%,#059669 100%)">
    {{-- Dot grid texture --}}
    <div class="absolute inset-0 opacity-10"
         style="background-image:radial-gradient(circle,rgba(255,255,255,.8) 1px,transparent 1px);background-size:32px 32px"></div>
    {{-- Decorative SVG shapes --}}
    <div class="absolute right-6 top-0 bottom-0 flex items-center pointer-events-none select-none opacity-10">
        <svg class="w-48 h-48 text-white" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9V8h2v8zm4 0h-2V8h2v8z"/>
        </svg>
    </div>
    <div class="absolute right-40 bottom-2 pointer-events-none select-none opacity-[0.07]">
        <svg class="w-32 h-32 text-white" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17 8C8 10 5.9 16.17 3.82 21.34L5.71 22l1-2.3A4.49 4.49 0 008 20C19 20 22 3 22 3c-1 2-8 2-8 2 .29-1.18.85-2.26 1.64-3.16A9.5 9.5 0 0017 8z"/>
        </svg>
    </div>
    <div class="relative flex flex-col sm:flex-row sm:items-center justify-between gap-5">
        <div>
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 bg-white/20 rounded-2xl flex items-center justify-center flex-shrink-0 backdrop-blur-sm">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-black text-white">Good {{ now()->hour < 12 ? 'morning' : (now()->hour < 18 ? 'afternoon' : 'evening') }}, Juan Dela Cruz!</h1>
            </div>
            <p class="text-white/75 text-[14.5px] mb-4">
                {{ now()->format('l, F j, Y') }} · Here's your executive summary for today.
            </p>
            <div class="flex flex-wrap gap-3">
                <span class="flex items-center gap-1.5 text-[12px] bg-white/15 text-white font-semibold px-3.5 py-1.5 rounded-full backdrop-blur-sm border border-white/20">
                    <span class="w-1.5 h-1.5 bg-green-300 rounded-full" style="animation:pd 2.2s infinite"></span>
                    Live Data
                </span>
                <span class="flex items-center gap-1.5 text-[12px] bg-white/15 text-white font-semibold px-3.5 py-1.5 rounded-full border border-white/20">
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    FreshTrack Davao · Peak Season
                </span>
                <span class="flex items-center gap-1.5 text-[12px] bg-green-400/20 text-green-200 font-semibold px-3.5 py-1.5 rounded-full border border-green-400/25">
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/>
                    </svg>
                    28°C · Partly Cloudy
                </span>
            </div>
        </div>
        <div class="flex items-center gap-3 flex-shrink-0">
            <a href="{{ route('reports') }}"
               class="flex items-center gap-2 bg-white/15 border border-white/25 text-white text-[13px] font-semibold px-4 py-2.5 rounded-xl hover:bg-white/25 transition-all">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                </svg>
                Export Report
            </a>
            <a href="{{ route('forecast') }}"
               class="flex items-center gap-2 bg-white text-violet-700 text-[13px] font-bold px-4 py-2.5 rounded-xl hover:bg-violet-50 transition-all shadow-lg">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                View AI Forecast
            </a>
        </div>
    </div>
</div>

{{-- KPI CARDS ROW 1 — with sparklines --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-5">
@php
$kpis1 = [
    ["Today's Sales",   '₱18,450',  '+12.5%', true,  'g-violet', 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'vs yesterday',     '#7C3AED', 'salesSparkline',    [12400,14200,11800,15600,13400,16200,18450]],
    ['Monthly Revenue', '₱342,800', '+8.3%',  true,  'g-green',  'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6',                                                                                                                                                  'vs last month',    '#10B981', 'revenueSparkline',  [295000,310000,318000,325000,330000,338000,342800]],
    ['Total Inventory', '1,240 kg', '-3.2%',  false, 'g-amber',  'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4',                                                                                                               'vs last week',     '#F59E0B', 'inventorySparkline',[1380,1350,1320,1295,1270,1255,1240]],
    ['Forecast Acc.',   '96.4%',    '+1.2%',  true,  'g-blue',   'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z', 'model confidence', '#3B82F6', 'forecastSparkline', [93.2,94.1,93.8,94.5,95.1,95.8,96.4]],
];
@endphp
@foreach($kpis1 as [$label,$val,$chg,$up,$grad,$iconPath,$sub,$color,$canvasId,$sparkData])
<div class="card shimmer card-lift p-5 fade-up delay-{{ $loop->index + 1 }}">
    <div class="flex items-start justify-between mb-3">
        <div class="icon-ring">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $iconPath }}"/>
            </svg>
        </div>
        <span class="badge {{ $up ? 'badge-green' : 'badge-red' }} text-[11px] flex items-center gap-1">
            <svg class="w-2.5 h-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $up ? 'M5 15l7-7 7 7' : 'M19 9l-7 7-7-7' }}"/>
            </svg>
            {{ $chg }}
        </span>
    </div>
    <p class="text-[26px] font-black text-gray-900 leading-none mb-1">{{ $val }}</p>
    <p class="text-[12.5px] font-semibold text-gray-600">{{ $label }}</p>
    <p class="text-[11.5px] text-gray-400 mt-0.5 mb-3">{{ $sub }}</p>
    {{-- Sparkline --}}
    <canvas id="{{ $canvasId }}" height="36"
            data-values="{{ implode(',', $sparkData) }}"
            data-color="{{ $color }}"
            data-up="{{ $up ? '1' : '0' }}"
            class="sparkline-canvas w-full"></canvas>
</div>
@endforeach
</div>

{{-- KPI CARDS ROW 2 --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-7">
@php
$kpis2 = [
    ['Spoilage Rate',   '8.4%',    '-2.1%',  true,  'g-rose',   'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z',                   'below avg threshold', '#EF4444', 'spoilageSparkline',  [12.1,11.3,10.8,10.2,9.5,8.9,8.4]],
    ['Low Stock Items', '3 Items',  '+1',     false, 'g-amber',  'M13 17h8m0 0V9m0 8l-8-8-4 4-6-6',                                                                                                                            'needs attention',     '#F59E0B', 'lowstockSparkline', [1,1,2,1,3,2,3]],
    ['Expected Profit', '₱52,300', '+15.7%', true,  'g-teal',   'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'projected this month','#14B8A6','profitSparkline',   [38000,41000,43500,46200,48700,50500,52300]],
    ['AI Score',        '94/100',  '+3pts',  true,  'g-indigo', 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z', 'recommendations', '#6366F1','aiSparkline',       [88,89,90,91,91,93,94]],
];
@endphp
@foreach($kpis2 as [$label,$val,$chg,$up,$grad,$iconPath,$sub,$color,$canvasId,$sparkData])
<div class="card shimmer card-lift p-5 fade-up delay-{{ $loop->index + 5 }}">
    <div class="flex items-start justify-between mb-3">
        <div class="icon-ring">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $iconPath }}"/>
            </svg>
        </div>
        <span class="badge {{ $up ? 'badge-green' : 'badge-red' }} text-[11px] flex items-center gap-1">
            <svg class="w-2.5 h-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $up ? 'M5 15l7-7 7 7' : 'M19 9l-7 7-7-7' }}"/>
            </svg>
            {{ $chg }}
        </span>
    </div>
    <p class="text-[26px] font-black text-gray-900 leading-none mb-1">{{ $val }}</p>
    <p class="text-[12.5px] font-semibold text-gray-600">{{ $label }}</p>
    <p class="text-[11.5px] text-gray-400 mt-0.5 mb-3">{{ $sub }}</p>
    <canvas id="{{ $canvasId }}" height="36"
            data-values="{{ implode(',', $sparkData) }}"
            data-color="{{ $color }}"
            data-up="{{ $up ? '1' : '0' }}"
            class="sparkline-canvas w-full"></canvas>
</div>
@endforeach
</div>

{{-- CHARTS ROW 1 --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mb-5">
    {{-- Sales Trend --}}
    <div class="lg:col-span-2 card p-6 fade-up">
        <div class="flex items-center justify-between mb-5">
            <div>
                <h3 class="font-bold text-gray-900 text-[15px]">Sales Revenue Trend</h3>
                <p class="text-[12px] text-gray-400 mt-0.5">Daily revenue — last 14 days</p>
            </div>
            <div class="flex gap-1 bg-gray-100 rounded-xl p-1">
                @foreach(['7D','14D','30D'] as $i => $p)
                <button class="text-[12px] font-semibold px-3 py-1.5 rounded-lg transition-all {{ $i===1 ? 'bg-white text-violet-700 shadow-sm' : 'text-gray-400 hover:text-gray-700' }}">{{ $p }}</button>
                @endforeach
            </div>
        </div>
        <canvas id="salesChart" height="100"></canvas>
    </div>

    {{-- Donut --}}
    <div class="card p-6 fade-up delay-2">
        <h3 class="font-bold text-gray-900 text-[15px] mb-1">Inventory Distribution</h3>
        <p class="text-[12px] text-gray-400 mb-4">By fruit category</p>
        <canvas id="donutChart" height="150"></canvas>
        <div class="mt-4 space-y-2">
            @foreach([['Mango','38%','#7C3AED'],['Durian','22%','#10B981'],['Pineapple','15%','#3B82F6'],['Others','25%','#F59E0B']] as [$n,$p,$c])
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full flex-shrink-0" style="background:{{ $c }}"></span>
                    <span class="text-[12.5px] text-gray-600 font-medium">{{ $n }}</span>
                </div>
                <span class="text-[12.5px] font-bold text-gray-800">{{ $p }}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- CHARTS ROW 2 --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-7">
    <div class="card p-6 fade-up">
        <h3 class="font-bold text-gray-900 text-[15px] mb-1">Forecast vs Actual Sales</h3>
        <p class="text-[12px] text-gray-400 mb-4">Weekly comparison — last 5 weeks</p>
        <canvas id="forecastBarChart" height="140"></canvas>
    </div>
    <div class="card p-6 fade-up delay-2">
        <h3 class="font-bold text-gray-900 text-[15px] mb-1">Fruit Category Revenue</h3>
        <p class="text-[12px] text-gray-400 mb-4">This month breakdown</p>
        <canvas id="fruitBarChart" height="140"></canvas>
    </div>
</div>

{{-- BOTTOM: Transactions + AI Recs --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mb-7">
    {{-- Transactions table --}}
    <div class="lg:col-span-2 card overflow-hidden fade-up">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <div>
                <h3 class="font-bold text-gray-900 text-[15px]">Recent Transactions</h3>
                <p class="text-[12px] text-gray-400 mt-0.5">Today's sales activity · {{ date('M d, Y') }}</p>
            </div>
            <a href="{{ route('sales') }}" class="text-[12.5px] text-violet-600 font-semibold hover:text-violet-700 flex items-center gap-1">
                View all
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
        <table class="tbl w-full">
            <thead><tr>
                <th class="text-left">Fruit</th>
                <th class="text-left">Qty</th>
                <th class="text-left">Total</th>
                <th class="text-left">Time</th>
                <th class="text-left">Status</th>
            </tr></thead>
            <tbody>
            @php
            $transactions = [
                ['bg-violet-100','M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4','text-violet-600','Mango',       '15 kg','₱1,875','08:32 AM','Completed','badge-green'],
                ['bg-green-100', 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4', 'text-green-600', 'Pineapple',    '8 pcs','₱640',  '09:15 AM','Completed','badge-green'],
                ['bg-yellow-100','M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4','text-yellow-600','Banana',       '20 kg','₱900',  '10:02 AM','Completed','badge-green'],
                ['bg-orange-100','M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4','text-orange-600','Pomelo',       '5 pcs','₱375',  '11:20 AM','Pending',  'badge-amber'],
                ['bg-pink-100',  'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4',  'text-pink-600',  'Mangosteen',  '12 kg','₱2,160','01:45 PM','Completed','badge-green'],
                ['bg-blue-100',  'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4',  'text-blue-600',  'Lanzones',    '6 kg', '₱540',  '02:30 PM','Completed','badge-green'],
            ];
            @endphp
            @foreach($transactions as [$iconBg,$iconPath,$iconColor,$name,$qty,$total,$time,$status,$badge])
            <tr>
                <td>
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 {{ $iconBg }} rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 {{ $iconColor }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $iconPath }}"/>
                            </svg>
                        </div>
                        <span class="font-semibold text-gray-800 text-[13.5px]">{{ $name }}</span>
                    </div>
                </td>
                <td class="text-gray-500 text-[13px]">{{ $qty }}</td>
                <td class="font-bold text-gray-900 text-[13.5px]">{{ $total }}</td>
                <td class="text-gray-400 text-[12.5px]">{{ $time }}</td>
                <td><span class="badge {{ $badge }} text-[11px]">{{ $status }}</span></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{-- AI Rec + Top Sellers --}}
    <div class="space-y-5 fade-up delay-3">
        <div class="card p-5">
            <div class="flex items-center gap-3 mb-4">
                <div class="icon-ring">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 text-[14px]">AI Recommendations</h3>
                    <p class="text-[11px] text-gray-400">Updated 5 min ago</p>
                </div>
            </div>
            <div class="space-y-3">
                <div class="flex items-start gap-3 p-3.5 bg-amber-50 rounded-2xl border border-amber-200/60">
                    <div class="w-8 h-8 bg-gray-100 border border-gray-200 rounded-xl flex items-center justify-center text-gray-400 flex-shrink-0">
                        <svg class="w-4 h-4 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-[12.5px] font-bold text-amber-800">Sell Mango First</p>
                        <p class="text-[12px] text-amber-600 mt-0.5 leading-relaxed">3 batches expiring in 2 days. Discount 15% to clear stock.</p>
                        <span class="badge badge-amber text-[10px] mt-2">High Priority</span>
                    </div>
                </div>
                <div class="flex items-start gap-3 p-3.5 bg-violet-50 rounded-2xl border border-violet-200/60">
                    <div class="w-8 h-8 bg-gray-100 border border-gray-200 rounded-xl flex items-center justify-center text-gray-400 flex-shrink-0">
                        <svg class="w-4 h-4 text-violet-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-[12.5px] font-bold text-violet-800">Restock Pomelo</p>
                        <p class="text-[12px] text-violet-600 mt-0.5 leading-relaxed">Only 8 kg remaining. Demand forecast is 20 kg/day.</p>
                        <span class="badge badge-violet text-[10px] mt-2">Restock Now</span>
                    </div>
                </div>
                <div class="flex items-start gap-3 p-3.5 bg-green-50 rounded-2xl border border-green-200/60">
                    <div class="w-8 h-8 bg-gray-100 border border-gray-200 rounded-xl flex items-center justify-center text-gray-400 flex-shrink-0">
                        <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-[12.5px] font-bold text-green-800">Discount Pineapple</p>
                        <p class="text-[12px] text-green-600 mt-0.5 leading-relaxed">Demand 20% below forecast. Apply 10% discount.</p>
                        <span class="badge badge-green text-[10px] mt-2">Revenue Boost</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card p-5">
            <div class="flex items-center gap-2 mb-4">
                <div class="w-8 h-8 rounded-xl flex items-center justify-center bg-gray-100 border border-gray-200 text-gray-400 flex-shrink-0">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 3l14 9-14 9V3z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 text-[14px]">Top Sellers Today</h3>
            </div>
            <div class="space-y-3">
                @foreach([['Mango','₱4,200','#7C3AED',85],['Mangosteen','₱3,150','#10B981',64],['Banana','₱2,400','#3B82F6',49],['Pineapple','₱1,800','#F59E0B',37]] as $i => [$n,$v,$c,$p])
                <div class="flex items-center gap-3">
                    <span class="text-[12px] font-black text-gray-300 w-4">{{ $i+1 }}</span>
                    <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0" style="background:{{ $c }}20">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="{{ $c }}" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between mb-1.5">
                            <span class="text-[12.5px] font-semibold text-gray-700">{{ $n }}</span>
                            <span class="text-[12.5px] font-bold text-gray-900">{{ $v }}</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width:{{ $p }}%;background:{{ $c }}"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

{{-- LOW STOCK + WEATHER --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
    <div class="lg:col-span-2 card overflow-hidden fade-up">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <div class="flex items-center gap-3">
                <div class="icon-ring">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 text-[15px]">Low Stock Alert</h3>
                    <p class="text-[12px] text-gray-400">Immediate restocking required</p>
                </div>
            </div>
            <a href="{{ route('inventory') }}" class="text-[12.5px] text-violet-600 font-semibold hover:text-violet-700 flex items-center gap-1">
                Manage
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
        <table class="tbl w-full">
            <thead><tr>
                <th class="text-left">Fruit</th><th class="text-left">Stock</th>
                <th class="text-left">Required</th><th class="text-left">Level</th>
                <th class="text-left">Status</th><th class="text-left">Action</th>
            </tr></thead>
            <tbody>
            @foreach([
                ['bg-orange-100','text-orange-600','Pomelo',    '8 kg', '50 kg',16,'Critical','badge-red'],
                ['bg-pink-100',  'text-pink-600',  'Mangosteen','14 kg','40 kg',35,'Low Stock','badge-amber'],
                ['bg-blue-100',  'text-blue-600',  'Lanzones',  '22 kg','50 kg',44,'Low Stock','badge-amber'],
            ] as [$iconBg,$iconColor,$name,$stock,$req,$pct,$status,$badge])
            <tr>
                <td>
                    <div class="flex items-center gap-2.5">
                        <div class="w-9 h-9 {{ $iconBg }} rounded-xl flex items-center justify-center">
                            <svg class="w-4 h-4 {{ $iconColor }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <span class="font-semibold text-gray-800 text-[13.5px]">{{ $name }}</span>
                    </div>
                </td>
                <td class="font-bold {{ $pct < 20 ? 'text-red-600' : 'text-amber-600' }} text-[13.5px]">{{ $stock }}</td>
                <td class="text-gray-500 text-[13px]">{{ $req }}</td>
                <td>
                    <div class="flex items-center gap-2">
                        <div class="progress-bar w-20">
                            <div class="progress-fill {{ $pct < 20 ? 'bg-red-500' : 'bg-amber-400' }}" style="width:{{ $pct }}%"></div>
                        </div>
                        <span class="text-[12px] font-semibold text-gray-500">{{ $pct }}%</span>
                    </div>
                </td>
                <td><span class="badge {{ $badge }} text-[11px]">{{ $status }}</span></td>
                <td><button class="btn btn-violet btn-sm text-[12px]">Restock</button></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{-- Weather + Quick Actions --}}
    <div class="space-y-5 fade-up delay-4">
        <div class="card p-5 overflow-hidden relative" style="background:linear-gradient(135deg,#EDE9FE,#F5F3FF)">
            <div class="absolute right-4 top-4 opacity-20">
                <svg class="w-20 h-20 text-violet-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/>
                </svg>
            </div>
            <p class="text-[11px] font-bold text-violet-600 uppercase tracking-wider mb-2">Weather · Davao City</p>
            <p class="text-4xl font-black text-gray-900">28°C</p>
            <p class="text-[13px] text-gray-600 font-medium mt-1">Partly Cloudy</p>
            <div class="grid grid-cols-2 gap-3 mt-4">
                @foreach([
                    ['M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253','Humidity','78%'],
                    ['M14 5l7 7m0 0l-7 7m7-7H3','Wind','12 km/h'],
                    ['M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10','Feels Like','31°C'],
                    ['M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z','UV Index','7 High'],
                ] as [$iconPath,$label,$val])
                <div class="bg-white/70 rounded-xl p-2.5 text-center border border-violet-100">
                    <svg class="w-3.5 h-3.5 text-violet-400 mx-auto mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $iconPath }}"/>
                    </svg>
                    <p class="text-[10.5px] text-gray-500">{{ $label }}</p>
                    <p class="text-[13px] font-bold text-gray-800 mt-0.5">{{ $val }}</p>
                </div>
                @endforeach
            </div>
            <div class="mt-3 bg-amber-50 border border-amber-200 rounded-xl p-3">
                <div class="flex items-start gap-2">
                    <svg class="w-4 h-4 text-amber-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    <p class="text-[11.5px] text-amber-700 font-semibold">High humidity may accelerate spoilage. Monitor Durian & Mango closely.</p>
                </div>
            </div>
        </div>

        <div class="card p-5">
            <p class="text-[12px] font-bold text-gray-500 uppercase tracking-wider mb-3">Quick Actions</p>
            <div class="grid grid-cols-2 gap-2.5">
                @php
                $quickActions = [
                    ['M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z',     'Open POS',     route('pos')],
                    ['M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4',                                                                                            'Add Stock',    route('inventory')],
                    ['M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z','New Sale',    route('sales')],
                    ['M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',                                      'Reports',      route('reports')],
                    ['M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z','Forecast',   route('forecast')],
                    ['M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z','AI Advice', route('decision-support')],
                ];
                @endphp
                @foreach($quickActions as [$iconPath,$label,$routeUrl])
                <a href="{{ $routeUrl }}"
                   class="flex items-center gap-2 p-3 bg-[#F5F3FF] rounded-xl hover:bg-violet-100 border border-violet-100 hover:border-violet-300 transition-all text-[12.5px] font-semibold text-violet-700 hover:text-violet-800 group">
                    <svg class="w-4 h-4 flex-shrink-0 text-violet-500 group-hover:text-violet-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $iconPath }}"/>
                    </svg>
                    {{ $label }}
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

@push('scripts')
<style>
@keyframes pd{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.5;transform:scale(1.3)}}
</style>
<script>
const gc = 'rgba(124,58,237,.06)';
Chart.defaults.font.family = 'Inter';

// ── Sparklines ────────────────────────────────────────────────
document.querySelectorAll('.sparkline-canvas').forEach(canvas => {
    const values = canvas.dataset.values.split(',').map(Number);
    const color  = canvas.dataset.color;
    const up     = canvas.dataset.up === '1';
    new Chart(canvas, {
        type: 'line',
        data: {
            labels: values.map((_,i) => i),
            datasets: [{
                data: values,
                borderColor: up ? color : '#EF4444',
                backgroundColor: up
                    ? color.replace(')',', 0.08)').replace('rgb','rgba')
                    : 'rgba(239,68,68,0.06)',
                borderWidth: 2,
                fill: true,
                tension: 0.4,
                pointRadius: 0,
                pointHoverRadius: 0,
            }]
        },
        options: {
            responsive: true,
            animation: { duration: 800, easing: 'easeInOutQuart' },
            plugins: { legend: { display: false }, tooltip: { enabled: false } },
            scales: { x: { display: false }, y: { display: false } },
            elements: { line: { borderCapStyle: 'round' } }
        }
    });
});

// ── Sales trend ───────────────────────────────────────────────
new Chart(document.getElementById('salesChart'), {
    type: 'line',
    data: {
        labels: ['Jun 10','11','12','13','14','15','16','17','18','19','20','21','22','23'],
        datasets: [{
            label: 'Revenue (₱)',
            data: [12400,15200,11800,18600,14300,16900,13200,19400,15800,17300,14600,21000,18200,18450],
            borderColor: '#7C3AED',
            backgroundColor: 'rgba(124,58,237,.07)',
            borderWidth: 2.5, fill: true, tension: .4,
            pointBackgroundColor: '#7C3AED', pointRadius: 3,
            pointHoverRadius: 6, pointHoverBackgroundColor: '#fff', pointHoverBorderWidth: 2.5,
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false },
            tooltip: {
                backgroundColor: '#1F2937', padding: 12, cornerRadius: 12,
                titleFont: { size: 11 }, bodyFont: { size: 13, weight: 'bold' },
                callbacks: { label: c => ' ₱' + c.raw.toLocaleString() }
            }
        },
        scales: {
            x: { grid: { display: false }, ticks: { font: { size: 10 }, color: '#9CA3AF' } },
            y: { grid: { color: gc }, border: { display: false }, ticks: { font: { size: 10 }, color: '#9CA3AF', callback: v => '₱' + (v/1000).toFixed(0) + 'k' } }
        }
    }
});

// ── Donut ─────────────────────────────────────────────────────
new Chart(document.getElementById('donutChart'), {
    type: 'doughnut',
    data: {
        labels: ['Mango','Durian','Pineapple','Others'],
        datasets: [{ data: [38,22,15,25], backgroundColor: ['#7C3AED','#10B981','#3B82F6','#F59E0B'], borderWidth: 0, hoverOffset: 10 }]
    },
    options: { responsive: true, cutout: '72%', plugins: { legend: { display: false }, tooltip: { backgroundColor: '#1F2937', padding: 10, cornerRadius: 10 } } }
});

// ── Forecast bar ──────────────────────────────────────────────
new Chart(document.getElementById('forecastBarChart'), {
    type: 'bar',
    data: {
        labels: ['Wk 1','Wk 2','Wk 3','Wk 4','This Wk'],
        datasets: [
            { label: 'Forecast', data: [68000,72000,75000,70000,74000], backgroundColor: 'rgba(124,58,237,.6)', borderRadius: 8, borderSkipped: false },
            { label: 'Actual',   data: [65000,74000,71000,73000,72000], backgroundColor: 'rgba(16,185,129,.65)',  borderRadius: 8, borderSkipped: false },
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'top', labels: { font: { size: 11 }, padding: 16 } },
            tooltip: { backgroundColor: '#1F2937', padding: 10, cornerRadius: 10 }
        },
        scales: {
            x: { grid: { display: false }, ticks: { font: { size: 10 }, color: '#9CA3AF' } },
            y: { grid: { color: gc }, border: { display: false }, ticks: { font: { size: 10 }, color: '#9CA3AF', callback: v => '₱' + (v/1000).toFixed(0) + 'k' } }
        }
    }
});

// ── Fruit revenue bar ─────────────────────────────────────────
new Chart(document.getElementById('fruitBarChart'), {
    type: 'bar',
    data: {
        labels: ['Mango','Durian','Pineapple','Banana','Pomelo','Mangosteen'],
        datasets: [{ data: [84200,62400,38100,29700,18500,42600], backgroundColor: ['#7C3AED','#10B981','#3B82F6','#F59E0B','#EF4444','#8B5CF6'], borderRadius: 10, borderSkipped: false }]
    },
    options: {
        indexAxis: 'y', responsive: true,
        plugins: { legend: { display: false }, tooltip: { backgroundColor: '#1F2937', padding: 10, cornerRadius: 10 } },
        scales: {
            x: { grid: { color: gc }, border: { display: false }, ticks: { font: { size: 10 }, color: '#9CA3AF', callback: v => '₱' + (v/1000).toFixed(0) + 'k' } },
            y: { grid: { display: false }, ticks: { font: { size: 11 }, color: '#6B7280' } }
        }
    }
});
</script>
@endpush
</x-app-layout>
