<x-app-layout>
<x-slot name="title">Analytics — FruitIQ</x-slot>

<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-7 fade-up">
    <div>
        <h1 class="text-[26px] font-black text-gray-900">Analytics Dashboard</h1>
        <p class="text-[13.5px] text-gray-500 mt-0.5">Deep-dive analytics and business performance metrics</p>
    </div>
    <select class="inp" style="width:auto;padding:10px 18px;border-radius:14px">
        <option>Last 30 Days</option><option>Last 90 Days</option><option>Last 6 Months</option><option>Last Year</option>
    </select>
</div>

{{-- KPIs --}}
<div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-7 fade-up delay-1">
@foreach([['Revenue','₱342,800','↑ 8.3%','g-violet','💰'],['Profit','₱144,400','↑ 15.7%','g-green','💎'],['Sales Volume','8,230 kg','↑ 11.2%','g-blue','📊'],['Waste Reduced','62%','↑ 23.4%','g-teal','♻️'],['Forecast Acc.','96.4%','↑ 1.2%','g-indigo','🎯']] as [$l,$v,$c,$g,$i])
<div class="card shimmer card-lift p-5">
    <div class="stat-ring {{ $g }} mb-3 w-10 h-10 rounded-xl shadow-md"><span class="text-xl">{{ $i }}</span></div>
    <p class="text-[22px] font-black text-gray-900">{{ $v }}</p>
    <p class="text-[12px] text-gray-500 font-medium mt-0.5">{{ $l }}</p>
    <span class="badge badge-green text-[10.5px] mt-1.5">{{ $c }}</span>
</div>
@endforeach
</div>

{{-- Row 1 --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mb-5 fade-up delay-2">
    <div class="lg:col-span-2 card p-6">
        <div class="flex items-center justify-between mb-5">
            <div><h3 class="font-bold text-gray-900 text-[15px]">Revenue vs Profit Trend</h3><p class="text-[12px] text-gray-400 mt-0.5">Monthly — last 6 months</p></div>
            <div class="flex gap-2">
                @foreach(['Revenue','Profit','COGS'] as $l)
                <span class="badge badge-gray text-[11px]">{{ $l }}</span>
                @endforeach
            </div>
        </div>
        <canvas id="revProfitChart" height="130"></canvas>
    </div>
    <div class="card p-6">
        <h3 class="font-bold text-gray-900 text-[15px] mb-1">Sales by Fruit</h3>
        <p class="text-[12px] text-gray-400 mb-4">Revenue distribution this month</p>
        <canvas id="fruitPieChart" height="170"></canvas>
        <div class="mt-4 space-y-2">
            @foreach([['🥭','Mango','24.6%','#7C3AED'],['🍑','Durian','18.2%','#10B981'],['🍊','Mangosteen','12.4%','#8B5CF6'],['🍍','Pineapple','11.1%','#3B82F6'],['🍌','Others','33.7%','#9CA3AF']] as [$e,$n,$p,$c])
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full" style="background:{{ $c }}"></span><span class="text-[12.5px] text-gray-600">{{ $e }} {{ $n }}</span></div>
                <span class="text-[12.5px] font-bold text-gray-800">{{ $p }}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Row 2 --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-5 fade-up delay-3">
    <div class="card p-5"><h3 class="font-bold text-gray-900 text-[14px] mb-1">Weekly Sales</h3><p class="text-[11.5px] text-gray-400 mb-3">Last 8 weeks</p><canvas id="weeklyBar" height="150"></canvas></div>
    <div class="card p-5"><h3 class="font-bold text-gray-900 text-[14px] mb-1">Cumulative Revenue</h3><p class="text-[11.5px] text-gray-400 mb-3">Month-to-date</p><canvas id="cumulativeChart" height="150"></canvas></div>
    <div class="card p-5">
        <h3 class="font-bold text-gray-900 text-[14px] mb-1">Forecast Accuracy</h3><p class="text-[11.5px] text-gray-400 mb-3">By fruit category</p>
        <canvas id="accDonut" height="110"></canvas>
        <div class="mt-3 space-y-1.5">
            @foreach([['Mango','99.8%','#7C3AED'],['Durian','96%','#10B981'],['Pineapple','92.9%','#3B82F6'],['Others','95.2%','#8B5CF6']] as [$n,$v,$c])
            <div class="flex justify-between"><div class="flex items-center gap-1.5"><span class="w-2 h-2 rounded-full" style="background:{{ $c }}"></span><span class="text-[12px] text-gray-600">{{ $n }}</span></div><span class="text-[12px] font-bold text-gray-800">{{ $v }}</span></div>
            @endforeach
        </div>
    </div>
    <div class="card p-5"><h3 class="font-bold text-gray-900 text-[14px] mb-1">Waste Reduction</h3><p class="text-[11.5px] text-gray-400 mb-3">Monthly spoilage rate</p><canvas id="wasteBar" height="150"></canvas></div>
</div>

{{-- Row 3 --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-7 fade-up delay-4">
    <div class="card p-6"><h3 class="font-bold text-gray-900 text-[15px] mb-1">Sales by Fruit per Month</h3><p class="text-[12px] text-gray-400 mb-4">Stacked revenue breakdown</p><canvas id="stackedChart" height="150"></canvas></div>
    <div class="card p-6"><h3 class="font-bold text-gray-900 text-[15px] mb-1">Performance Radar</h3><p class="text-[12px] text-gray-400 mb-4">Multi-dimensional business health</p><canvas id="radarChart" height="150"></canvas></div>
</div>

{{-- Summary Banners --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-5 fade-up delay-5">
    <div class="rounded-3xl p-6 text-white shadow-xl" style="background:linear-gradient(135deg,#7C3AED,#6D28D9)">
        <p class="text-white/70 text-[12px] font-medium mb-1">Revenue Growth Rate</p>
        <p class="text-[40px] font-black">+8.3%</p>
        <p class="text-white/60 text-[12px] mt-1">Month-over-month · On track for ₱400K</p>
        <div class="mt-4 bg-white/10 rounded-full h-2"><div class="h-2 rounded-full bg-green-300" style="width:83%"></div></div>
        <p class="text-white/50 text-[11px] mt-1.5">83% of ₱400K monthly goal</p>
    </div>
    <div class="rounded-3xl p-6 text-white shadow-xl" style="background:linear-gradient(135deg,#3B82F6,#2563EB)">
        <p class="text-white/70 text-[12px] font-medium mb-1">Customer Satisfaction Score</p>
        <p class="text-[40px] font-black">4.8<span class="text-[22px]">/5</span></p>
        <p class="text-white/60 text-[12px] mt-1">Based on 312 feedback responses</p>
        <div class="flex gap-1 mt-4">@for($i=0;$i<5;$i++)<span class="text-xl">{{ $i<4?'⭐':'✨' }}</span>@endfor</div>
    </div>
    <div class="rounded-3xl p-6 text-white shadow-xl" style="background:linear-gradient(135deg,#10B981,#059669)">
        <p class="text-white/70 text-[12px] font-medium mb-1">AI System Performance</p>
        <p class="text-[40px] font-black">94<span class="text-[22px]">/100</span></p>
        <p class="text-white/60 text-[12px] mt-1">Combined AI score across all modules</p>
        <div class="grid grid-cols-3 gap-2 mt-4 text-center">
            @foreach([['Forecast','96%'],['Spoilage','94%'],['Quality','92%']] as [$l,$v])
            <div><p class="text-white/50 text-[11px]">{{ $l }}</p><p class="font-black text-[14px]">{{ $v }}</p></div>
            @endforeach
        </div>
    </div>
</div>

@push('scripts')
<script>
const months=['Jan','Feb','Mar','Apr','May','Jun'];
const gc='rgba(124,58,237,.06)';
new Chart(document.getElementById('revProfitChart'),{type:'line',data:{labels:months,datasets:[{label:'Revenue',data:[280000,295000,310000,298000,325000,342800],borderColor:'#7C3AED',backgroundColor:'rgba(124,58,237,.07)',fill:true,tension:.4,borderWidth:2.5,pointRadius:4},{label:'Profit',data:[112000,118000,124000,119050,130000,144400],borderColor:'#10B981',backgroundColor:'rgba(16,185,129,.07)',fill:true,tension:.4,borderWidth:2.5,pointRadius:4},{label:'COGS',data:[168000,177000,186000,178950,195000,198400],borderColor:'#F97316',borderDash:[5,5],fill:false,tension:.4,borderWidth:2,pointRadius:3}]},options:{responsive:true,plugins:{legend:{position:'top',labels:{font:{size:11}}}},scales:{x:{grid:{display:false}},y:{grid:{color:gc},border:{display:false},ticks:{font:{size:10},color:'#9CA3AF',callback:v=>'₱'+(v/1000).toFixed(0)+'k'}}}}});
new Chart(document.getElementById('fruitPieChart'),{type:'pie',data:{labels:['Mango','Durian','Mangosteen','Pineapple','Others'],datasets:[{data:[24.6,18.2,12.4,11.1,33.7],backgroundColor:['#7C3AED','#10B981','#8B5CF6','#3B82F6','#9CA3AF'],borderWidth:0,hoverOffset:10}]},options:{responsive:true,plugins:{legend:{display:false}}}});
new Chart(document.getElementById('weeklyBar'),{type:'bar',data:{labels:['W1','W2','W3','W4','W5','W6','W7','W8'],datasets:[{data:[65000,71000,68000,74000,70000,78000,73000,82000],backgroundColor:'#7C3AED',borderRadius:8}]},options:{responsive:true,plugins:{legend:{display:false}},scales:{x:{grid:{display:false},ticks:{font:{size:9},color:'#9CA3AF'}},y:{grid:{color:gc},border:{display:false},ticks:{font:{size:9},color:'#9CA3AF',callback:v=>'₱'+(v/1000)+'k'}}}}});
new Chart(document.getElementById('cumulativeChart'),{type:'line',data:{labels:Array.from({length:23},(_,i)=>i+1),datasets:[{data:[14900,29800,44700,59600,74500,89400,104300,119200,134100,149000,163900,178800,193700,208600,223500,238400,253300,268200,283100,298000,312900,327800,342800],borderColor:'#6366F1',backgroundColor:'rgba(99,102,241,.1)',fill:true,tension:.4,borderWidth:2,pointRadius:0}]},options:{responsive:true,plugins:{legend:{display:false}},scales:{x:{grid:{display:false},ticks:{font:{size:9}}},y:{grid:{color:gc},border:{display:false},ticks:{font:{size:9},color:'#9CA3AF',callback:v=>'₱'+(v/1000).toFixed(0)+'k'}}}}});
new Chart(document.getElementById('accDonut'),{type:'doughnut',data:{labels:['Mango','Durian','Pineapple','Others'],datasets:[{data:[99.8,96,92.9,95.2],backgroundColor:['#7C3AED','#10B981','#3B82F6','#8B5CF6'],borderWidth:0}]},options:{responsive:true,cutout:'65%',plugins:{legend:{display:false}}}});
new Chart(document.getElementById('wasteBar'),{type:'bar',data:{labels:months,datasets:[{data:[18.2,16.5,14.8,13.2,11.4,8.4],backgroundColor:['rgba(239,68,68,.65)','rgba(249,115,22,.65)','rgba(245,158,11,.65)','rgba(234,179,8,.65)','rgba(132,204,22,.65)','rgba(16,185,129,.65)'],borderRadius:8}]},options:{responsive:true,plugins:{legend:{display:false}},scales:{x:{grid:{display:false},ticks:{font:{size:9}}},y:{grid:{color:gc},border:{display:false},ticks:{font:{size:9},color:'#9CA3AF',callback:v=>v+'%'}}}}});
new Chart(document.getElementById('stackedChart'),{type:'bar',data:{labels:months,datasets:[{label:'Mango',data:[68000,72000,76000,71000,80000,84200],backgroundColor:'#7C3AED'},{label:'Durian',data:[48000,52000,55000,51000,58000,62400],backgroundColor:'#10B981'},{label:'Pineapple',data:[32000,34000,36000,33000,37000,38100],backgroundColor:'#3B82F6'},{label:'Others',data:[52000,57000,63000,58000,70000,78100],backgroundColor:'#8B5CF6'}]},options:{responsive:true,plugins:{legend:{position:'top',labels:{font:{size:10}}}},scales:{x:{stacked:true,grid:{display:false}},y:{stacked:true,grid:{color:gc},border:{display:false},ticks:{font:{size:10},color:'#9CA3AF',callback:v=>'₱'+(v/1000).toFixed(0)+'k'}}}}});
new Chart(document.getElementById('radarChart'),{type:'radar',data:{labels:['Revenue','Profit Margin','Forecast Acc.','Stock Efficiency','Waste Reduction','Customer Rating'],datasets:[{label:'This Month',data:[88,84,96,90,62,96],borderColor:'#7C3AED',backgroundColor:'rgba(124,58,237,.12)',borderWidth:2,pointBackgroundColor:'#7C3AED',pointRadius:4},{label:'Last Month',data:[82,78,95,85,52,92],borderColor:'#9CA3AF',backgroundColor:'rgba(156,163,175,.08)',borderWidth:2,borderDash:[5,5],pointRadius:3}]},options:{responsive:true,plugins:{legend:{position:'top',labels:{font:{size:11}}}},scales:{r:{grid:{color:'#E5E7EB'},ticks:{font:{size:9}},pointLabels:{font:{size:11}},beginAtZero:true,max:100}}}});
</script>
@endpush
</x-app-layout>
