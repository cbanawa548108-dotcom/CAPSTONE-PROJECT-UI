<x-app-layout>
<x-slot name="title">AI Sales Forecast — FreshTrack</x-slot>

<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-7 fade-up">
    <div class="flex items-center gap-4">
        <div class="w-12 h-12 bg-gray-100 border border-gray-200 rounded-2xl flex items-center justify-center">
            <svg class="w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
        </div>
        <div>
            <h1 class="text-[26px] font-black text-gray-900">AI Sales Forecast</h1>
            <p class="text-[13.5px] text-gray-500 mt-0.5">Machine learning predictions · Updated Jun 23, 2026 · 96.4% accuracy</p>
        </div>
    </div>
    <div class="flex items-center gap-3">
        <span class="flex items-center gap-2 badge badge-violet px-3.5 py-2 text-[12px]">
            <span class="w-2 h-2 bg-violet-500 rounded-full pulse-dot"></span> AI Model Active
        </span>
        <button class="btn btn-outline btn-md text-[13px]">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            Refresh Forecast
        </button>
    </div>
</div>

{{-- Summary Cards --}}
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-7 fade-up delay-1">
@foreach([['Predicted Sales','₱127,400','target','g-indigo','Next 7 days'],['Expected Revenue','₱142,800','money','g-green','+12.3% vs last week'],['Demand Level','High ↑','chart','g-orange','Peak season'],['Forecast Accuracy','96.4%','check','g-violet','Model confidence']] as [$l,$v,$i,$g,$s])
<div class="card shimmer card-lift p-5">
    <div class="icon-ring mb-3">
        @if($i==='target')<svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
        @elseif($i==='money')<svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        @elseif($i==='chart')<svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        @elseif($i==='check')<svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        @endif
    </div>
    <p class="text-[24px] font-black text-gray-900">{{ $v }}</p>
    <p class="text-[12.5px] font-semibold text-gray-600">{{ $l }}</p>
    <p class="text-[11.5px] text-gray-400 mt-0.5">{{ $s }}</p>
</div>
@endforeach
</div>

{{-- Charts --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-6 fade-up delay-2">
    <div class="card p-6">
        <div class="flex items-center justify-between mb-5">
            <div><h3 class="font-bold text-gray-900 text-[15px]">7-Day Sales Forecast</h3><p class="text-[12px] text-gray-400 mt-0.5">Predicted daily revenue with confidence interval</p></div>
            <span class="badge badge-violet text-[11px]">Line Chart</span>
        </div>
        <canvas id="forecastLineChart" height="160"></canvas>
    </div>
    <div class="card p-6">
        <div class="flex items-center justify-between mb-5">
            <div><h3 class="font-bold text-gray-900 text-[15px]">Confidence Band</h3><p class="text-[12px] text-gray-400 mt-0.5">Upper & lower forecast bounds</p></div>
            <span class="badge badge-blue text-[11px]">Area Chart</span>
        </div>
        <canvas id="forecastAreaChart" height="160"></canvas>
    </div>
</div>

<div class="card p-6 mb-7 fade-up delay-3">
    <div class="flex items-center justify-between mb-5">
        <div><h3 class="font-bold text-gray-900 text-[15px]">Fruit-by-Fruit Demand Forecast</h3><p class="text-[12px] text-gray-400 mt-0.5">Predicted units sold per fruit — next 7 days vs current</p></div>
        <span class="badge badge-green text-[11px]">Grouped Bar</span>
    </div>
    <canvas id="forecastBarChart" height="90"></canvas>
</div>

{{-- Forecast Table --}}
<div class="card overflow-hidden fade-up delay-4">
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
        <div><h3 class="font-bold text-gray-900 text-[15px]">Detailed Forecast by Fruit</h3><p class="text-[12px] text-gray-400 mt-0.5">AI predictions with actionable recommendations</p></div>
    </div>
    <div class="overflow-x-auto">
        <table class="tbl w-full">
            <thead><tr>
                <th class="text-left">Fruit</th><th class="text-left">Current/Day</th><th class="text-left">Predicted/Day</th><th class="text-left">Δ Change</th><th class="text-left">Trend</th><th class="text-left">Accuracy</th><th class="text-left">Recommendation</th>
            </tr></thead>
            <tbody>
@php
$fc=[
    ['Mango','42 kg','58 kg','+16 kg','↑ Rising','96%','Increase stock 30%','badge-green'],
    ['Durian','28 kg','24 kg','-4 kg','↓ Declining','94%','Reduce order quantity','badge-red'],
    ['Pomelo','12 kg','20 kg','+8 kg','↑ Rising','98%','Restock urgently','badge-green'],
    ['Mangosteen','35 kg','38 kg','+3 kg','→ Stable','97%','Maintain current stock','badge-blue'],
    ['Lanzones','18 kg','22 kg','+4 kg','↑ Rising','95%','Order 20 kg more','badge-green'],
    ['Pineapple','25 kg','20 kg','-5 kg','↓ Declining','93%','Apply 10% discount','badge-amber'],
    ['Banana','55 kg','60 kg','+5 kg','↑ Rising','96%','Increase to 80 kg','badge-green'],
];
@endphp
@foreach($fc as $f)
<tr>
    <td><div class="flex items-center gap-2"><div class="w-8 h-8 bg-gradient-to-br from-green-400 to-teal-500 rounded-xl flex items-center justify-center"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg></div><span class="font-semibold text-gray-800 text-[13.5px]">{{ $f[0] }}</span></div></td>
    <td class="text-gray-500 text-[13px]">{{ $f[1] }}</td>
    <td class="font-bold text-gray-900">{{ $f[2] }}</td>
    <td><span class="font-bold {{ str_starts_with($f[3],'+') ? 'text-green-600' : 'text-red-500' }}">{{ $f[3] }}</span></td>
    <td><span class="font-semibold text-[13px] {{ $f[4][0]==='↑' ? 'text-green-600' : ($f[4][0]==='↓' ? 'text-red-500' : 'text-blue-600') }}">{{ $f[4] }}</span></td>
    <td>
        <div class="flex items-center gap-2">
            <div class="progress-bar w-16"><div class="progress-fill bg-violet-600" style="width:{{ $f[5] }}"></div></div>
            <span class="text-[12px] font-bold text-gray-700">{{ $f[5] }}</span>
        </div>
    </td>
    <td><span class="badge {{ $f[7] }} text-[11px]">{{ $f[6] }}</span></td>
</tr>
@endforeach
            </tbody>
        </table>
    </div>
</div>

@push('scripts')
<script>
const days=['Mon Jun 24','Tue Jun 25','Wed Jun 26','Thu Jun 27','Fri Jun 28','Sat Jun 29','Sun Jun 30'];
const pred=[18200,19400,17800,21500,24300,26800,22100];
const up=[20000,21200,19600,23300,26500,29000,24200];
const lo=[16400,17600,16000,19700,22100,24600,20000];
const gc='rgba(124,58,237,.06)';

new Chart(document.getElementById('forecastLineChart'),{type:'line',data:{labels:days,datasets:[{label:'Predicted',data:pred,borderColor:'#7C3AED',backgroundColor:'rgba(124,58,237,.08)',borderWidth:2.5,fill:true,tension:.4,pointBackgroundColor:'#7C3AED',pointRadius:4,pointHoverRadius:7},{label:'Last Week',data:[16800,18100,15900,19200,21400,23100,19600],borderColor:'#D1D5DB',borderWidth:1.5,borderDash:[5,4],fill:false,tension:.4,pointRadius:3}]},options:{responsive:true,plugins:{legend:{position:'top',labels:{font:{size:11}}}},scales:{x:{grid:{display:false},ticks:{font:{size:10},color:'#9CA3AF'}},y:{grid:{color:gc},border:{display:false},ticks:{font:{size:10},color:'#9CA3AF',callback:v=>'₱'+(v/1000).toFixed(0)+'k'}}}}});

new Chart(document.getElementById('forecastAreaChart'),{type:'line',data:{labels:days,datasets:[{label:'Upper Bound',data:up,borderColor:'rgba(99,102,241,.3)',backgroundColor:'rgba(99,102,241,.08)',fill:'+1',tension:.4,pointRadius:0,borderWidth:1},{label:'Predicted',data:pred,borderColor:'#6366F1',backgroundColor:'rgba(99,102,241,.12)',fill:true,tension:.4,pointBackgroundColor:'#6366F1',pointRadius:4,borderWidth:2.5},{label:'Lower Bound',data:lo,borderColor:'rgba(99,102,241,.3)',fill:false,tension:.4,pointRadius:0,borderWidth:1}]},options:{responsive:true,plugins:{legend:{position:'top',labels:{font:{size:11}}}},scales:{x:{grid:{display:false},ticks:{font:{size:10},color:'#9CA3AF'}},y:{grid:{color:gc},border:{display:false},ticks:{font:{size:10},color:'#9CA3AF',callback:v=>'₱'+(v/1000).toFixed(0)+'k'}}}}});

new Chart(document.getElementById('forecastBarChart'),{type:'bar',data:{labels:['Mango','Durian','Pomelo','Mangosteen','Lanzones','Pineapple','Banana'],datasets:[{label:'Current (kg/day)',data:[42,28,12,35,18,25,55],backgroundColor:'rgba(156,163,175,.5)',borderRadius:6},{label:'Predicted (kg/day)',data:[58,24,20,38,22,20,60],backgroundColor:['#7C3AED','#10B981','#3B82F6','#8B5CF6','#EC4899','#F59E0B','#14B8A6'],borderRadius:6}]},options:{responsive:true,plugins:{legend:{position:'top',labels:{font:{size:11}}}},scales:{x:{grid:{display:false},ticks:{font:{size:11},color:'#6B7280'}},y:{grid:{color:gc},border:{display:false},ticks:{font:{size:10},color:'#9CA3AF',callback:v=>v+' kg'}}}}});
</script>
@endpush
</x-app-layout>
