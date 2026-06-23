<x-app-layout>
<x-slot name="title">Spoilage Prediction — FruitIQ</x-slot>

<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-7 fade-up">
    <div class="flex items-center gap-4">
        <div class="w-12 h-12 g-rose rounded-2xl flex items-center justify-center shadow-lg shadow-rose-200/60 text-2xl">⚠️</div>
        <div>
            <h1 class="text-[26px] font-black text-gray-900">Spoilage Prediction</h1>
            <p class="text-[13.5px] text-gray-500 mt-0.5">AI-powered spoilage risk · Sensor data updated every 30 minutes</p>
        </div>
    </div>
    <span class="flex items-center gap-2 badge badge-red px-4 py-2.5 text-[12.5px]">
        <span class="w-2 h-2 bg-red-500 rounded-full pulse-dot"></span> 3 High Risk Items
    </span>
</div>

{{-- Risk Cards --}}
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-7 fade-up delay-1">
@foreach([['High Risk','3 items','🔴','g-rose','Immediate action'],['Moderate Risk','5 items','🟠','g-orange','Monitor closely'],['Low Risk / Fresh','18 items','🟢','g-green','Within safe range'],['Avg Spoilage','24%','📊','g-blue','Across inventory']] as [$l,$v,$i,$g,$s])
<div class="card shimmer card-lift p-5">
    <div class="stat-ring {{ $g }} mb-3 w-11 h-11 rounded-xl shadow-md"><span class="text-xl">{{ $i }}</span></div>
    <p class="text-[24px] font-black text-gray-900">{{ $v }}</p>
    <p class="text-[12.5px] font-semibold text-gray-600">{{ $l }}</p>
    <p class="text-[11.5px] text-gray-400 mt-0.5">{{ $s }}</p>
</div>
@endforeach
</div>

{{-- Charts --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mb-7 fade-up delay-2">
    <div class="card p-6">
        <h3 class="font-bold text-gray-900 text-[15px] mb-1">Spoilage Risk by Fruit</h3>
        <p class="text-[12px] text-gray-400 mb-4">Current risk % per batch</p>
        <canvas id="spoilageBarChart" height="220"></canvas>
    </div>
    <div class="card p-6">
        <h3 class="font-bold text-gray-900 text-[15px] mb-1">Risk Timeline</h3>
        <p class="text-[12px] text-gray-400 mb-4">Projected spoilage over 7 days</p>
        <canvas id="riskTimelineChart" height="220"></canvas>
    </div>
    <div class="card p-6">
        <h3 class="font-bold text-gray-900 text-[15px] mb-1">Priority Distribution</h3>
        <p class="text-[12px] text-gray-400 mb-4">Risk level breakdown</p>
        <canvas id="priorityDonut" height="170"></canvas>
        <div class="mt-4 space-y-2">
            @foreach([['High Risk','3','#EF4444'],['Moderate','5','#F97316'],['Low Risk','8','#FACC15'],['Fresh','10','#10B981']] as [$r,$c,$col])
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full" style="background:{{ $col }}"></span><span class="text-[12.5px] text-gray-600">{{ $r }}</span></div>
                <span class="text-[12.5px] font-bold text-gray-800">{{ $c }} items</span>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Spoilage Gauge Cards --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-7 fade-up delay-3">
@foreach([
    ['🥭','Mango MNG-002',78,'bg-red-500','Critical','text-red-600','Sell immediately or refrigerate','badge-red'],
    ['🍑','Durian DUR-112',65,'bg-orange-500','High Risk','text-orange-600','Move to cooler, sell today','badge-orange'],
    ['🥭','Mango MNG-001',45,'bg-amber-500','Moderate','text-amber-600','Apply 15% discount today','badge-amber'],
] as [$e,$n,$pct,$bar,$st,$tc,$rec,$b])
<div class="card p-5 border-l-4 {{ $pct>70 ? 'border-red-400' : ($pct>50 ? 'border-orange-400' : 'border-amber-400') }}">
    <div class="flex items-start justify-between mb-4">
        <div class="flex items-center gap-3">
            <div class="text-3xl">{{ $e }}</div>
            <div>
                <p class="font-bold text-gray-900 text-[14px]">{{ $n }}</p>
                <span class="badge {{ $b }} text-[10px]">{{ $st }}</span>
            </div>
        </div>
        <div class="text-right">
            <p class="text-[26px] font-black {{ $tc }}">{{ $pct }}%</p>
            <p class="text-[10.5px] text-gray-400">Spoilage Risk</p>
        </div>
    </div>
    <div class="progress-bar mb-3">
        <div class="{{ $bar }} h-full rounded-full transition-all" style="width:{{ $pct }}%"></div>
    </div>
    <div class="bg-gray-50 rounded-xl p-3 border border-gray-100">
        <p class="text-[12px] font-semibold text-gray-700">💡 {{ $rec }}</p>
    </div>
</div>
@endforeach
</div>

{{-- Sensor Table --}}
<div class="card overflow-hidden fade-up delay-4">
    <div class="px-6 py-4 border-b border-gray-100">
        <h3 class="font-bold text-gray-900 text-[15px]">Sensor Data & Spoilage Analysis</h3>
        <p class="text-[12px] text-gray-400 mt-0.5">Real-time environmental monitoring with AI spoilage prediction</p>
    </div>
    <div class="overflow-x-auto">
        <table class="tbl w-full">
            <thead><tr>
                <th class="text-left">Fruit / Batch</th><th class="text-left">🌡 Temp</th><th class="text-left">💧 Humidity</th><th class="text-left">CO₂ ppm</th><th class="text-left">Light</th><th class="text-left">Spoilage %</th><th class="text-left">Priority</th><th class="text-left">Status</th><th class="text-left">Recommendation</th>
            </tr></thead>
            <tbody>
@php
$rows=[
    ['🥭','Mango MNG-002','31°C','82%','1,240','High',78,95,'Critical','Sell immediately'],
    ['🍑','Durian DUR-112','28°C','75%','2,180','Low',65,82,'High Risk','Sell today'],
    ['🥭','Mango MNG-001','26°C','70%','980','Med',45,68,'High Risk','Apply 15% off'],
    ['🫐','Lanzones LNZ-055','29°C','78%','1,100','Med',38,55,'Moderate','Sell in 2 days'],
    ['🍊','Mangosteen MGS-078','25°C','65%','820','Low',22,38,'Moderate','Check tomorrow'],
    ['🍈','Pomelo POM-034','24°C','60%','760','Low',18,30,'Low Risk','Monitor humidity'],
    ['🍍','Pineapple PNA-019','23°C','58%','680','Low',12,20,'Low Risk','Normal sales'],
    ['🍌','Banana BNA-041','22°C','55%','640','Low',8,12,'Fresh','Optimal condition'],
];
@endphp
@foreach($rows as $r)
<tr>
    <td><div class="flex items-center gap-2"><span class="text-lg">{{ $r[0] }}</span><span class="font-medium text-gray-800 text-[13px]">{{ $r[1] }}</span></div></td>
    <td class="font-semibold text-[13px] {{ (int)$r[2] > 28 ? 'text-red-600' : 'text-gray-600' }}">{{ $r[2] }}</td>
    <td class="text-[13px] {{ (int)$r[3] > 75 ? 'text-amber-600 font-semibold' : 'text-gray-600' }}">{{ $r[3] }}</td>
    <td class="text-gray-500 text-[12.5px]">{{ $r[4] }}</td>
    <td><span class="badge {{ $r[5]==='High'?'badge-amber':($r[5]==='Med'?'badge-blue':'badge-gray') }} text-[10px]">{{ $r[5] }}</span></td>
    <td>
        <div class="flex items-center gap-2">
            <div class="progress-bar w-16"><div class="{{ $r[6]>=70?'bg-red-500':($r[6]>=40?'bg-amber-500':'bg-green-500') }} h-full rounded-full" style="width:{{ $r[6] }}%"></div></div>
            <span class="text-[12.5px] font-bold {{ $r[6]>=70?'text-red-600':($r[6]>=40?'text-amber-600':'text-green-600') }}">{{ $r[6] }}%</span>
        </div>
    </td>
    <td>
        <div class="flex gap-0.5">
            @for($s=1;$s<=5;$s++)
            <div class="w-2 h-5 rounded-sm {{ $s<=round($r[7]/20) ? ($r[7]>=80?'bg-red-500':($r[7]>=60?'bg-orange-500':($r[7]>=40?'bg-amber-400':'bg-green-500'))) : 'bg-gray-200' }}"></div>
            @endfor
            <span class="text-[11px] font-bold ml-1.5 {{ $r[7]>=80?'text-red-600':($r[7]>=60?'text-orange-600':'text-green-600') }}">{{ $r[7] }}</span>
        </div>
    </td>
    <td>
        @php $sc=['Critical'=>'badge-red','High Risk'=>'badge-orange','Moderate'=>'badge-amber','Low Risk'=>'badge-blue','Fresh'=>'badge-green']; @endphp
        <span class="badge {{ $sc[$r[8]]??'badge-gray' }} text-[11px]">{{ $r[8] }}</span>
    </td>
    <td class="text-[12px] text-gray-500 max-w-36">{{ $r[9] }}</td>
</tr>
@endforeach
            </tbody>
        </table>
    </div>
</div>

@push('scripts')
<script>
const gc='rgba(124,58,237,.06)';
new Chart(document.getElementById('spoilageBarChart'),{type:'bar',data:{labels:['Mango-002','Durian-112','Mango-001','Lanzones','Mangosteen','Pomelo','Pineapple','Banana'],datasets:[{label:'Spoilage %',data:[78,65,45,38,22,18,12,8],backgroundColor:['#EF4444','#F97316','#F97316','#F59E0B','#F59E0B','#84CC16','#22C55E','#10B981'],borderRadius:6}]},options:{indexAxis:'y',responsive:true,plugins:{legend:{display:false}},scales:{x:{grid:{color:gc},ticks:{font:{size:10},color:'#9CA3AF',callback:v=>v+'%'},max:100},y:{grid:{display:false},ticks:{font:{size:10},color:'#6B7280'}}}}});
new Chart(document.getElementById('riskTimelineChart'),{type:'line',data:{labels:['Today','Day 2','Day 3','Day 4','Day 5','Day 6','Day 7'],datasets:[{label:'Mango',data:[78,88,95,100,100,100,100],borderColor:'#EF4444',tension:.3,fill:false,borderWidth:2,pointRadius:3},{label:'Durian',data:[65,72,80,88,93,97,100],borderColor:'#F97316',tension:.3,fill:false,borderWidth:2,pointRadius:3},{label:'Lanzones',data:[38,45,52,60,68,76,84],borderColor:'#F59E0B',tension:.3,fill:false,borderWidth:2,pointRadius:3},{label:'Banana',data:[8,10,13,17,22,28,35],borderColor:'#10B981',tension:.3,fill:false,borderWidth:2,pointRadius:3}]},options:{responsive:true,plugins:{legend:{position:'top',labels:{font:{size:10}}}},scales:{x:{grid:{display:false},ticks:{font:{size:10},color:'#9CA3AF'}},y:{grid:{color:gc},border:{display:false},ticks:{font:{size:10},color:'#9CA3AF',callback:v=>v+'%'},max:100}}}});
new Chart(document.getElementById('priorityDonut'),{type:'doughnut',data:{labels:['High Risk','Moderate','Low Risk','Fresh'],datasets:[{data:[3,5,8,10],backgroundColor:['#EF4444','#F97316','#FACC15','#10B981'],borderWidth:0,hoverOffset:10}]},options:{responsive:true,cutout:'68%',plugins:{legend:{display:false}}}});
</script>
@endpush
</x-app-layout>
