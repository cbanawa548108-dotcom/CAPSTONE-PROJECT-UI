<x-app-layout>
<x-slot name="title">Dashboard — FruitIQ</x-slot>

{{-- HERO BANNER --}}
<div class="relative rounded-3xl p-7 mb-7 overflow-hidden shadow-xl fade-up" style="background:linear-gradient(135deg,#7C3AED 0%,#6D28D9 45%,#059669 100%)">
    <div class="absolute inset-0 opacity-10" style="background-image:radial-gradient(circle,rgba(255,255,255,.8) 1px,transparent 1px);background-size:32px 32px"></div>
    <div class="absolute right-8 top-4 text-7xl opacity-20 select-none" style="animation:fa 6s ease-in-out infinite">🥭</div>
    <div class="absolute right-32 bottom-4 text-5xl opacity-15 select-none" style="animation:fb 8s ease-in-out infinite;animation-delay:1s">🍍</div>
    <div class="relative flex flex-col sm:flex-row sm:items-center justify-between gap-5">
        <div>
            <div class="flex items-center gap-3 mb-2">
                <span class="text-3xl">👋</span>
                <h1 class="text-2xl font-black text-white">Good morning, Juan Dela Cruz!</h1>
            </div>
            <p class="text-white/75 text-[14.5px] mb-4">Tuesday, June 23, 2026 · Here's your executive summary for today.</p>
            <div class="flex flex-wrap gap-3">
                <span class="flex items-center gap-1.5 text-[12px] bg-white/15 text-white font-semibold px-3.5 py-1.5 rounded-full backdrop-blur-sm border border-white/20">
                    <span class="w-1.5 h-1.5 bg-green-300 rounded-full" style="animation:pd 2.2s infinite"></span> Live Data
                </span>
                <span class="text-[12px] bg-white/15 text-white font-semibold px-3.5 py-1.5 rounded-full border border-white/20">📍 FruitIQ Davao · Peak Season</span>
                <span class="text-[12px] bg-green-400/20 text-green-200 font-semibold px-3.5 py-1.5 rounded-full border border-green-400/25">🌤 28°C · Partly Cloudy</span>
            </div>
        </div>
        <div class="flex items-center gap-3 flex-shrink-0">
            <a href="{{ route('reports') }}" class="flex items-center gap-2 bg-white/15 border border-white/25 text-white text-[13px] font-semibold px-4 py-2.5 rounded-xl hover:bg-white/25 transition-all">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                Export Report
            </a>
            <a href="{{ route('forecast') }}" class="flex items-center gap-2 bg-white text-violet-700 text-[13px] font-bold px-4 py-2.5 rounded-xl hover:bg-violet-50 transition-all shadow-lg">
                🔮 View AI Forecast
            </a>
        </div>
    </div>
</div>
@push('scripts')
<style>
@keyframes fa{0%,100%{transform:translateY(0) rotate(0deg)}50%{transform:translateY(-18px) rotate(5deg)}}
@keyframes fb{0%,100%{transform:translateY(0)}50%{transform:translateY(-12px) rotate(-4deg)}}
@keyframes pd{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.5;transform:scale(1.3)}}
</style>
@endpush

{{-- KPI CARDS ROW 1 --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-5">
@php
$kpis1 = [
    ["Today's Sales",  '₱18,450',  '↑ +12.5%', true,  'g-violet', '💰', 'vs yesterday',    'from-violet-50'],
    ['Monthly Revenue','₱342,800', '↑ +8.3%',  true,  'g-green',  '📈', 'vs last month',   'from-green-50'],
    ['Total Inventory','1,240 kg', '↓ -3.2%',  false, 'g-amber',  '📦', 'vs last week',    'from-amber-50'],
    ['Forecast Acc.',  '96.4%',    '↑ +1.2%',  true,  'g-blue',   '🔮', 'model confidence','from-blue-50'],
];
@endphp
@foreach($kpis1 as [$label,$val,$chg,$up,$grad,$icon,$sub,$from])
<div class="card shimmer card-lift p-5 fade-up delay-{{ $loop->index + 1 }}">
    <div class="flex items-start justify-between mb-4">
        <div class="stat-ring {{ $grad }} shadow-lg">
            <span class="text-xl">{{ $icon }}</span>
        </div>
        <span class="badge {{ $up ? 'badge-green' : 'badge-red' }} text-[11px]">{{ $chg }}</span>
    </div>
    <p class="text-[26px] font-black text-gray-900 leading-none mb-1">{{ $val }}</p>
    <p class="text-[12.5px] font-semibold text-gray-600">{{ $label }}</p>
    <p class="text-[11.5px] text-gray-400 mt-0.5">{{ $sub }}</p>
</div>
@endforeach
</div>

{{-- KPI CARDS ROW 2 --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-7">
@php
$kpis2 = [
    ['Spoilage Rate',   '8.4%',    '↓ -2.1%',  true,  'g-rose',   '⚠️', 'below avg threshold'],
    ['Low Stock Items', '3 Items',  '↑ +1',     false, 'g-amber',  '📉', 'needs attention now'],
    ['Expected Profit', '₱52,300', '↑ +15.7%', true,  'g-teal',   '💎', 'projected this month'],
    ['AI Score',        '94/100',  '↑ +3pts',  true,  'g-indigo', '🧠', 'recommendations'],
];
@endphp
@foreach($kpis2 as [$label,$val,$chg,$up,$grad,$icon,$sub])
<div class="card shimmer card-lift p-5 fade-up delay-{{ $loop->index + 5 }}">
    <div class="flex items-start justify-between mb-4">
        <div class="stat-ring {{ $grad }} shadow-lg"><span class="text-xl">{{ $icon }}</span></div>
        <span class="badge {{ $up ? 'badge-green' : 'badge-red' }} text-[11px]">{{ $chg }}</span>
    </div>
    <p class="text-[26px] font-black text-gray-900 leading-none mb-1">{{ $val }}</p>
    <p class="text-[12.5px] font-semibold text-gray-600">{{ $label }}</p>
    <p class="text-[11.5px] text-gray-400 mt-0.5">{{ $sub }}</p>
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
            <a href="{{ route('sales') }}" class="text-[12.5px] text-violet-600 font-semibold hover:text-violet-700 flex items-center gap-1">View all <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg></a>
        </div>
        <table class="tbl w-full">
            <thead><tr>
                <th class="text-left">Fruit</th><th class="text-left">Qty</th><th class="text-left">Total</th><th class="text-left">Time</th><th class="text-left">Status</th>
            </tr></thead>
            <tbody>
            @foreach([
                ['🥭','Mango','15 kg','₱1,875','08:32 AM','Completed','badge-green'],
                ['🍍','Pineapple','8 pcs','₱640','09:15 AM','Completed','badge-green'],
                ['🍌','Banana','20 kg','₱900','10:02 AM','Completed','badge-green'],
                ['🍈','Pomelo','5 pcs','₱375','11:20 AM','Pending','badge-amber'],
                ['🍊','Mangosteen','12 kg','₱2,160','01:45 PM','Completed','badge-green'],
                ['🫐','Lanzones','6 kg','₱540','02:30 PM','Completed','badge-green'],
            ] as [$e,$n,$q,$t,$time,$s,$b])
            <tr>
                <td><div class="flex items-center gap-2.5"><div class="w-8 h-8 bg-gray-100 rounded-xl flex items-center justify-center text-base">{{ $e }}</div><span class="font-semibold text-gray-800 text-[13.5px]">{{ $n }}</span></div></td>
                <td class="text-gray-500 text-[13px]">{{ $q }}</td>
                <td class="font-bold text-gray-900 text-[13.5px]">{{ $t }}</td>
                <td class="text-gray-400 text-[12.5px]">{{ $time }}</td>
                <td><span class="badge {{ $b }} text-[11px]">{{ $s }}</span></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{-- AI Rec + Top Sellers --}}
    <div class="space-y-5 fade-up delay-3">
        <div class="card p-5">
            <div class="flex items-center gap-3 mb-4">
                <div class="stat-ring g-indigo"><span class="text-xl">🧠</span></div>
                <div>
                    <h3 class="font-bold text-gray-900 text-[14px]">AI Recommendations</h3>
                    <p class="text-[11px] text-gray-400">Updated 5 min ago</p>
                </div>
            </div>
            <div class="space-y-3">
                <div class="flex items-start gap-3 p-3.5 bg-amber-50 rounded-2xl border border-amber-200/60">
                    <span class="text-xl mt-0.5">🥭</span>
                    <div><p class="text-[12.5px] font-bold text-amber-800">Sell Mango First</p><p class="text-[12px] text-amber-600 mt-0.5 leading-relaxed">3 batches expiring in 2 days. Discount 15% to clear stock.</p><span class="badge badge-amber text-[10px] mt-2">🔴 High Priority</span></div>
                </div>
                <div class="flex items-start gap-3 p-3.5 bg-violet-50 rounded-2xl border border-violet-200/60">
                    <span class="text-xl mt-0.5">🍈</span>
                    <div><p class="text-[12.5px] font-bold text-violet-800">Restock Pomelo</p><p class="text-[12px] text-violet-600 mt-0.5 leading-relaxed">Only 8 kg remaining. Demand forecast is 20 kg/day.</p><span class="badge badge-violet text-[10px] mt-2">📦 Restock Now</span></div>
                </div>
                <div class="flex items-start gap-3 p-3.5 bg-green-50 rounded-2xl border border-green-200/60">
                    <span class="text-xl mt-0.5">🍍</span>
                    <div><p class="text-[12.5px] font-bold text-green-800">Discount Pineapple</p><p class="text-[12px] text-green-600 mt-0.5 leading-relaxed">Demand 20% below forecast. Apply 10% discount.</p><span class="badge badge-green text-[10px] mt-2">💰 Revenue Boost</span></div>
                </div>
            </div>
        </div>

        <div class="card p-5">
            <div class="flex items-center gap-2 mb-4"><span class="text-lg">🏆</span><h3 class="font-bold text-gray-900 text-[14px]">Top Sellers Today</h3></div>
            <div class="space-y-3">
                @foreach([['🥭','Mango','₱4,200','#7C3AED',85],['🍊','Mangosteen','₱3,150','#10B981',64],['🍌','Banana','₱2,400','#3B82F6',49],['🍍','Pineapple','₱1,800','#F59E0B',37]] as $i => [$e,$n,$v,$c,$p])
                <div class="flex items-center gap-3">
                    <span class="text-[12px] font-black text-gray-300 w-4">{{ $i+1 }}</span>
                    <span class="text-lg">{{ $e }}</span>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between mb-1.5"><span class="text-[12.5px] font-semibold text-gray-700">{{ $n }}</span><span class="text-[12.5px] font-bold text-gray-900">{{ $v }}</span></div>
                        <div class="progress-bar"><div class="progress-fill" style="width:{{ $p }}%;background:{{ $c }}"></div></div>
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
                <div class="stat-ring g-rose w-10 h-10 rounded-xl text-sm shadow-md"><span>⚠️</span></div>
                <div><h3 class="font-bold text-gray-900 text-[15px]">Low Stock Alert</h3><p class="text-[12px] text-gray-400">Immediate restocking required</p></div>
            </div>
            <a href="{{ route('inventory') }}" class="text-[12.5px] text-violet-600 font-semibold hover:text-violet-700 flex items-center gap-1">Manage <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg></a>
        </div>
        <table class="tbl w-full">
            <thead><tr>
                <th class="text-left">Fruit</th><th class="text-left">Stock</th><th class="text-left">Required</th><th class="text-left">Level</th><th class="text-left">Status</th><th class="text-left">Action</th>
            </tr></thead>
            <tbody>
            @foreach([['🍈','Pomelo','8 kg','50 kg',16,'Critical','badge-red'],['🍊','Mangosteen','14 kg','40 kg',35,'Low Stock','badge-amber'],['🫐','Lanzones','22 kg','50 kg',44,'Low Stock','badge-amber']] as [$e,$n,$s,$r,$p,$st,$b])
            <tr>
                <td><div class="flex items-center gap-2.5"><div class="w-9 h-9 bg-gray-100 rounded-xl flex items-center justify-center text-lg">{{ $e }}</div><span class="font-semibold text-gray-800 text-[13.5px]">{{ $n }}</span></div></td>
                <td class="font-bold {{ $p < 20 ? 'text-red-600' : 'text-amber-600' }} text-[13.5px]">{{ $s }}</td>
                <td class="text-gray-500 text-[13px]">{{ $r }}</td>
                <td>
                    <div class="flex items-center gap-2">
                        <div class="progress-bar w-20"><div class="progress-fill {{ $p < 20 ? 'bg-red-500' : 'bg-amber-400' }}" style="width:{{ $p }}%"></div></div>
                        <span class="text-[12px] font-semibold text-gray-500">{{ $p }}%</span>
                    </div>
                </td>
                <td><span class="badge {{ $b }} text-[11px]">{{ $st }}</span></td>
                <td><button class="btn btn-violet btn-sm text-[12px]">Restock</button></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{-- Weather + Quick Actions --}}
    <div class="space-y-5 fade-up delay-4">
        <div class="card p-5 overflow-hidden relative" style="background:linear-gradient(135deg,#EDE9FE,#F5F3FF)">
            <div class="absolute right-4 top-4 text-5xl opacity-30">🌤</div>
            <p class="text-[11px] font-bold text-violet-600 uppercase tracking-wider mb-2">Weather · Davao City</p>
            <p class="text-4xl font-black text-gray-900">28°C</p>
            <p class="text-[13px] text-gray-600 font-medium mt-1">Partly Cloudy</p>
            <div class="grid grid-cols-2 gap-3 mt-4">
                @foreach([['💧 Humidity','78%'],['💨 Wind','12 km/h'],['🌡 Feels Like','31°C'],['☀️ UV Index','7 High']] as [$l,$v])
                <div class="bg-white/70 rounded-xl p-2.5 text-center border border-violet-100">
                    <p class="text-[10.5px] text-gray-500">{{ $l }}</p>
                    <p class="text-[13px] font-bold text-gray-800 mt-0.5">{{ $v }}</p>
                </div>
                @endforeach
            </div>
            <div class="mt-3 bg-amber-50 border border-amber-200 rounded-xl p-3">
                <p class="text-[11.5px] text-amber-700 font-semibold">⚠️ High humidity may accelerate spoilage. Monitor Durian & Mango closely.</p>
            </div>
        </div>

        <div class="card p-5">
            <p class="text-[12px] font-bold text-gray-500 uppercase tracking-wider mb-3">Quick Actions</p>
            <div class="grid grid-cols-2 gap-2.5">
                @foreach([['🛒','Open POS',route('pos')],['📦','Add Stock',route('inventory')],['💰','New Sale',route('sales')],['📊','Reports',route('reports')],['🔮','Forecast',route('forecast')],['🧠','AI Advice',route('decision-support')]] as [$e,$l,$r])
                <a href="{{ $r }}" class="flex items-center gap-2 p-3 bg-[#F5F3FF] rounded-xl hover:bg-violet-100 border border-violet-100 hover:border-violet-300 transition-all text-[12.5px] font-semibold text-violet-700 hover:text-violet-800">
                    <span>{{ $e }}</span>{{ $l }}
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
const gc = 'rgba(124,58,237,.06)';
Chart.defaults.font.family = 'Inter';

new Chart(document.getElementById('salesChart'),{type:'line',data:{labels:['Jun 10','11','12','13','14','15','16','17','18','19','20','21','22','23'],datasets:[{label:'Revenue (₱)',data:[12400,15200,11800,18600,14300,16900,13200,19400,15800,17300,14600,21000,18200,18450],borderColor:'#7C3AED',backgroundColor:'rgba(124,58,237,.07)',borderWidth:2.5,fill:true,tension:.4,pointBackgroundColor:'#7C3AED',pointRadius:3,pointHoverRadius:6,pointHoverBackgroundColor:'#fff',pointHoverBorderWidth:2.5}]},options:{responsive:true,plugins:{legend:{display:false},tooltip:{backgroundColor:'#1F2937',padding:12,cornerRadius:12,titleFont:{size:11},bodyFont:{size:13,weight:'bold'},callbacks:{label:c=>' ₱'+c.raw.toLocaleString()}}},scales:{x:{grid:{display:false},ticks:{font:{size:10},color:'#9CA3AF'}},y:{grid:{color:gc},border:{display:false},ticks:{font:{size:10},color:'#9CA3AF',callback:v=>'₱'+(v/1000).toFixed(0)+'k'}}}}});

new Chart(document.getElementById('donutChart'),{type:'doughnut',data:{labels:['Mango','Durian','Pineapple','Others'],datasets:[{data:[38,22,15,25],backgroundColor:['#7C3AED','#10B981','#3B82F6','#F59E0B'],borderWidth:0,hoverOffset:10}]},options:{responsive:true,cutout:'72%',plugins:{legend:{display:false},tooltip:{backgroundColor:'#1F2937',padding:10,cornerRadius:10}}}});

new Chart(document.getElementById('forecastBarChart'),{type:'bar',data:{labels:['Wk 1','Wk 2','Wk 3','Wk 4','This Wk'],datasets:[{label:'Forecast',data:[68000,72000,75000,70000,74000],backgroundColor:'rgba(124,58,237,.6)',borderRadius:8,borderSkipped:false},{label:'Actual',data:[65000,74000,71000,73000,72000],backgroundColor:'rgba(16,185,129,.65)',borderRadius:8,borderSkipped:false}]},options:{responsive:true,plugins:{legend:{position:'top',labels:{font:{size:11},padding:16}},tooltip:{backgroundColor:'#1F2937',padding:10,cornerRadius:10}},scales:{x:{grid:{display:false},ticks:{font:{size:10},color:'#9CA3AF'}},y:{grid:{color:gc},border:{display:false},ticks:{font:{size:10},color:'#9CA3AF',callback:v=>'₱'+(v/1000).toFixed(0)+'k'}}}}});

new Chart(document.getElementById('fruitBarChart'),{type:'bar',data:{labels:['Mango','Durian','Pineapple','Banana','Pomelo','Mangosteen'],datasets:[{data:[84200,62400,38100,29700,18500,42600],backgroundColor:['#7C3AED','#10B981','#3B82F6','#F59E0B','#EF4444','#8B5CF6'],borderRadius:10,borderSkipped:false}]},options:{indexAxis:'y',responsive:true,plugins:{legend:{display:false},tooltip:{backgroundColor:'#1F2937',padding:10,cornerRadius:10}},scales:{x:{grid:{color:gc},border:{display:false},ticks:{font:{size:10},color:'#9CA3AF',callback:v=>'₱'+(v/1000).toFixed(0)+'k'}},y:{grid:{display:false},ticks:{font:{size:11},color:'#6B7280'}}}}});
</script>
@endpush
</x-app-layout>
