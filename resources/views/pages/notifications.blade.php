<x-app-layout>
<x-slot name="title">Notifications — FruitIQ</x-slot>

<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-7 fade-up">
    <div>
        <h1 class="text-[26px] font-black text-gray-900">Notification Center</h1>
        <p class="text-[13.5px] text-gray-500 mt-0.5">All system alerts, AI recommendations, and activity logs</p>
    </div>
    <div class="flex items-center gap-3">
        <button class="btn btn-outline btn-md text-[13px]">Mark All Read</button>
        <button class="btn btn-outline btn-md text-[13px] text-red-500 hover:bg-red-50 hover:border-red-300">Clear All</button>
    </div>
</div>

{{-- Filter tabs --}}
<div class="flex gap-2 mb-6 fade-up delay-1" x-data="{ filter: 'all' }">
    @foreach([['all','All Notifications','14'],['critical','🔴 Critical','3'],['warning','🟠 Warning','5'],['info','🔵 Info','4'],['success','🟢 Success','2']] as [$f,$l,$c])
    <button @click="filter='{{ $f }}'" :class="filter==='{{ $f }}' ? 'g-violet text-white shadow-md border-transparent' : 'bg-white text-gray-600 border-gray-200 hover:border-violet-300 hover:text-violet-700 hover:bg-violet-50'"
            class="flex items-center gap-2 px-4 py-2.5 rounded-xl text-[12.5px] font-semibold border transition-all">
        {{ $l }} <span :class="filter==='{{ $f }}' ? 'bg-white/20 text-white' : 'bg-gray-100 text-gray-500'" class="text-[10px] font-bold px-1.5 py-0.5 rounded-full">{{ $c }}</span>
    </button>
    @endforeach
</div>

{{-- Notifications list --}}
<div class="space-y-4 fade-up delay-2">
@php
$notifs = [
    ['🔴','Critical','Low Stock Alert','Pomelo stock critically low','Pomelo (POM-034) has only 8 kg remaining. Current daily demand is 20 kg/day. Stock will be completely depleted within 12 hours if not restocked immediately.','2 min ago','badge-red',false,'Restock Now','g-rose'],
    ['🟠','Warning','Spoilage Risk — High','Durian batch DUR-112 at 78% spoilage risk','Sensor data shows temperature 28°C and humidity 75% for Durian DUR-112. AI prediction: 78% chance of spoilage within 24 hours. Potential loss: ₱18,290.','15 min ago','badge-orange',false,'Apply Discount','g-orange'],
    ['🟠','Warning','Spoilage Risk — Moderate','Mango MNG-001 at 45% spoilage risk','Mango batch MNG-001 shows moderate spoilage indicators. Consider applying a 15% discount to accelerate sales and minimize losses.','32 min ago','badge-orange',false,'View Details','g-amber'],
    ['🟣','AI Insight','AI Forecast Ready','New 7-day demand forecast generated','FruitIQ AI has generated an updated sales forecast for June 24–30. Mango demand predicted to increase 38% this weekend. Recommend increasing stock by 30 kg.','1 hr ago','badge-violet',false,'View Forecast','g-indigo'],
    ['🔵','Info','Scanner Analysis Complete','Fruit quality scan results ready','Image processing analysis completed for 3 fruit samples. Results: Mango (A+ Grade, 92% confidence), Banana (A Grade), Pomelo (C Grade — recommend discount).','1.5 hrs ago','badge-blue',true,'View Results','g-blue'],
    ['🟢','Success','Restock Completed','Mango batch MNG-003 (200 kg) received','New mango batch MNG-003 has been received from Davao Fresh Farms. 200 kg added to inventory. Batch expires June 30, 2026.','2 hrs ago','badge-green',true,'View Inventory','g-green'],
    ['🟢','Success','Sales Target Reached','Today\'s ₱18,000 sales milestone hit','Congratulations! Today\'s sales have reached the ₱18,000 target at 2:30 PM — 3.5 hours ahead of schedule.','2.5 hrs ago','badge-green',true,'View Sales','g-emerald'],
    ['🔵','Info','Weather Alert','High humidity warning for Davao City','Philippine Atmospheric Agency reports 78% humidity expected for the next 48 hours. This increases spoilage risk for Durian and Mango. Take preventive action.','3 hrs ago','badge-blue',true,'View Spoilage','g-blue'],
    ['🟣','AI Insight','Decision Support Update','3 new AI recommendations available','FruitIQ AI has generated 3 new business recommendations: (1) Sell Mango first, (2) Restock Pomelo, (3) Apply 10% discount on Pineapple.','5 hrs ago','badge-violet',true,'View AI Advice','g-indigo'],
    ['🔵','Info','User Activity','Pedro Reyes recorded 5 new transactions','Cashier Pedro Reyes has recorded 5 transactions totaling ₱4,820 between 10:00 AM and 12:30 PM today.','6 hrs ago','badge-blue',true,'View Transactions','g-blue'],
];
@endphp

@foreach($notifs as $n)
<div class="card p-5 transition-all card-lift {{ $n[7] ? 'opacity-70' : '' }} {{ $loop->index < 3 ? 'border-l-4 '.($n[0]==='🔴'?'border-red-400':($n[0]==='🟠'?'border-orange-400':'border-violet-400')) : '' }}">
    <div class="flex items-start gap-4">
        <div class="stat-ring {{ $n[9] }} w-12 h-12 rounded-xl shadow-md flex-shrink-0 text-xl">{{ $n[0] }}</div>
        <div class="flex-1 min-w-0">
            <div class="flex items-start justify-between gap-3 mb-1">
                <div class="flex items-center gap-2 flex-wrap">
                    <span class="badge {{ $n[6] }} text-[10.5px]">{{ $n[1] }}</span>
                    <h3 class="font-bold text-gray-900 text-[14.5px]">{{ $n[2] }}</h3>
                    @if(!$n[7])<span class="w-2 h-2 g-violet rounded-full flex-shrink-0 inline-block"></span>@endif
                </div>
                <span class="text-[11.5px] text-gray-400 font-medium flex-shrink-0">{{ $n[5] }}</span>
            </div>
            <p class="text-[13px] font-semibold text-gray-700 mb-1">{{ $n[3] }}</p>
            <p class="text-[12.5px] text-gray-500 leading-relaxed">{{ $n[4] }}</p>
            <div class="flex items-center gap-3 mt-3">
                <button class="btn {{ !$n[7] ? $n[9].' text-white' : 'btn-outline' }} btn-sm text-[12px]">{{ $n[8] }}</button>
                <button class="btn btn-outline btn-sm text-[12px]">Dismiss</button>
                @if(!$n[7])<button class="text-[12px] text-gray-400 hover:text-gray-600 font-medium transition-colors ml-auto">Mark as read</button>@endif
            </div>
        </div>
    </div>
</div>
@endforeach
</div>

{{-- Pagination --}}
<div class="flex items-center justify-between mt-6 fade-up delay-5">
    <p class="text-[12.5px] text-gray-500">Showing <span class="font-bold text-gray-800">1–10</span> of <span class="font-bold text-gray-800">47</span> notifications</p>
    <div class="flex items-center gap-1.5">
        <button class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-400 hover:bg-gray-200 transition-colors text-sm">←</button>
        @foreach([1,2,3,4,5] as $p)
        <button class="w-8 h-8 flex items-center justify-center rounded-lg text-[12.5px] font-semibold transition-all {{ $p===1 ? 'g-violet text-white shadow-sm' : 'text-gray-600 hover:bg-gray-200' }}">{{ $p }}</button>
        @endforeach
        <button class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-400 hover:bg-gray-200 transition-colors text-sm">→</button>
    </div>
</div>
</x-app-layout>
