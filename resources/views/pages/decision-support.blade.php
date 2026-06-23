<x-app-layout>
<x-slot name="title">Decision Support — FruitIQ</x-slot>

<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-7 fade-up">
    <div class="flex items-center gap-4">
        <div class="w-12 h-12 g-indigo rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-200/60 text-2xl">🧠</div>
        <div>
            <h1 class="text-[26px] font-black text-gray-900">Decision Support Dashboard</h1>
            <p class="text-[13.5px] text-gray-500 mt-0.5">AI-powered business intelligence and actionable recommendations</p>
        </div>
    </div>
    <span class="flex items-center gap-2 badge badge-violet px-4 py-2.5 text-[12.5px]">
        <span class="w-2 h-2 bg-violet-500 rounded-full pulse-dot"></span> 8 Active Recommendations
    </span>
</div>

{{-- Action Cards --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-7 fade-up delay-1">
    @foreach([
        ['g-rose','border-red-400','🔴 Urgent','Restock Now','📦',['🍈','Pomelo','Pomelo stock at 8 kg — critically low. Predicted demand: 20 kg/day. Stock runs out in &lt;12 hours.'],['Stock Level','16%',16,'red'],['Recommended Order','50 kg'],'Order Now','badge-red'],
        ['g-orange','border-orange-400','🟠 High Priority','Sell Immediately','💨',['🥭','Mango','Mango batch MNG-002 has 78% spoilage risk. 155 kg at risk — potential loss: ₱18,290 if not sold in 24h.'],['Spoilage Risk','78%',78,'orange'],['Suggested Discount','-20%'],'Apply Discount','badge-orange'],
        ['g-blue','border-blue-400','🔵 Revenue','Apply Discount','🏷',['🍍','Pineapple','Pineapple demand is 20% below forecast. Apply 10% discount to stimulate sales and clear 118 kg.'],['Demand Gap','-20%',20,'blue'],['Expected Revenue Boost','+₱2,800'],'Apply Now','badge-blue'],
    ] as [$grad,$border,$urgency,$title,$icon,$fruit,$progress,$kv,$btn,$b])
    <div class="card p-6 border-l-4 {{ $border }} card-lift">
        <div class="flex items-start justify-between mb-4">
            <div class="flex items-center gap-3">
                <div class="stat-ring {{ $grad }} w-10 h-10 rounded-xl shadow-md"><span class="text-base">{{ $icon }}</span></div>
                <div>
                    <span class="badge {{ $b }} text-[10px]">{{ $urgency }}</span>
                    <h3 class="font-bold text-gray-900 text-[15px] mt-1">{{ $title }}</h3>
                </div>
            </div>
            <span class="text-2xl">{{ $fruit[0] }}</span>
        </div>
        <p class="text-[13px] text-gray-600 leading-relaxed mb-4">{!! $fruit[2] !!}</p>
        <div class="bg-gray-50 rounded-2xl p-3.5 mb-4 border border-gray-100">
            <div class="flex items-center justify-between text-[12px] mb-2">
                <span class="font-semibold text-gray-700">{{ $progress[0] }}</span>
                <span class="font-black {{ $progress[3]==='red'?'text-red-600':($progress[3]==='orange'?'text-orange-600':'text-blue-600') }}">{{ $progress[1] }}</span>
            </div>
            <div class="progress-bar">
                <div class="{{ $progress[3]==='red'?'bg-red-500':($progress[3]==='orange'?'bg-orange-500':'bg-blue-500') }} h-full rounded-full" style="width:{{ $progress[2] }}%"></div>
            </div>
        </div>
        <div class="flex items-center justify-between mb-5">
            <span class="text-[12.5px] text-gray-500">{{ $kv[0] }}</span>
            <span class="font-black text-gray-900 text-[15px]">{{ $kv[1] }}</span>
        </div>
        <div class="flex gap-2">
            <button class="btn {{ $progress[3]==='red'?'btn-violet':($progress[3]==='orange'?'g-orange text-white':'btn-violet') }} btn-md flex-1 text-[12.5px]">{{ $btn }}</button>
            <button class="btn btn-outline btn-md flex-1 text-[12.5px]">Dismiss</button>
        </div>
    </div>
    @endforeach
</div>

{{-- Profit Banner --}}
<div class="rounded-3xl p-7 mb-7 text-white overflow-hidden relative fade-up delay-2" style="background:linear-gradient(135deg,#7C3AED 0%,#6D28D9 50%,#059669 100%)">
    <div class="absolute inset-0 opacity-10" style="background-image:radial-gradient(circle,rgba(255,255,255,.6) 1px,transparent 1px);background-size:28px 28px"></div>
    <div class="relative flex flex-col md:flex-row items-start md:items-center justify-between gap-5">
        <div>
            <p class="text-white/70 text-[13px] font-medium">If all AI recommendations are followed today</p>
            <h2 class="text-3xl font-black mt-1">Expected Profit Increase</h2>
            <p class="text-white/60 text-[13px] mt-1">Based on current inventory, pricing, and forecast data</p>
        </div>
        <div class="text-right">
            <p class="text-[52px] font-black text-green-300">+₱24,850</p>
            <p class="text-white/60 text-[13px] mt-1">+47.5% above current projection</p>
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4 mt-6 pt-6 border-t border-white/20">
        @foreach([['🛡','₱18,290','Spoilage Prevention'],['🏷','₱2,800','Discount Revenue'],['📦','₱3,760','Restock Profit']] as [$i,$v,$l])
        <div class="text-center bg-white/10 rounded-2xl p-4 backdrop-blur-sm">
            <span class="text-2xl">{{ $i }}</span>
            <p class="text-[22px] font-black text-green-300 mt-1">{{ $v }}</p>
            <p class="text-white/60 text-[11.5px] mt-0.5">{{ $l }}</p>
        </div>
        @endforeach
    </div>
</div>

{{-- Charts --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-7 fade-up delay-3">
    <div class="card p-6">
        <h3 class="font-bold text-gray-900 text-[15px] mb-1">Priority Action Matrix</h3>
        <p class="text-[12px] text-gray-400 mb-4">Urgency vs Impact — all 8 recommendations</p>
        <canvas id="matrixChart" height="200"></canvas>
    </div>
    <div class="card p-6">
        <h3 class="font-bold text-gray-900 text-[15px] mb-1">Revenue Optimization</h3>
        <p class="text-[12px] text-gray-400 mb-4">Before vs after applying AI recommendations</p>
        <canvas id="revenueOptChart" height="200"></canvas>
    </div>
</div>

{{-- Insights --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-5 fade-up delay-4">
    <div class="card p-6">
        <h3 class="font-bold text-gray-900 text-[15px] mb-4">📦 Inventory Optimization Insights</h3>
        <div class="space-y-3">
            @foreach([
                ['Mango','Overstocked 20%','Reduce next order','amber'],
                ['Durian','Optimal level','Maintain order size','green'],
                ['Pomelo','Critical shortage','Order 50 kg now','red'],
                ['Lanzones','Slightly understocked','Increase order 15%','blue'],
                ['Pineapple','Overstocked, low demand','Discount + reduce order','orange'],
            ] as [$n,$s,$r,$c])
            @php $map=['amber'=>['bg-amber-50','border-amber-200','text-amber-800','text-amber-700'],'green'=>['bg-green-50','border-green-200','text-green-800','text-green-700'],'red'=>['bg-red-50','border-red-200','text-red-800','text-red-700'],'blue'=>['bg-blue-50','border-blue-200','text-blue-800','text-blue-700'],'orange'=>['bg-orange-50','border-orange-200','text-orange-800','text-orange-700']]; @endphp
            <div class="flex items-center gap-3 p-3.5 {{ $map[$c][0] }} rounded-2xl border {{ $map[$c][1] }}">
                <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between">
                        <p class="text-[13px] font-bold {{ $map[$c][2] }}">{{ $n }}</p>
                        <span class="text-[11.5px] font-semibold {{ $map[$c][3] }}">{{ $s }}</span>
                    </div>
                    <p class="text-[12px] {{ $map[$c][3] }} mt-0.5">{{ $r }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="card p-6">
        <h3 class="font-bold text-gray-900 text-[15px] mb-4">💰 Revenue Optimization Insights</h3>
        <div class="space-y-4">
            @foreach([
                ['Peak Sales Hours','10AM–1PM and 4PM–6PM show highest traffic. Schedule more staff during these windows.',92,'g-violet'],
                ['Best-Performing Fruit','Mango generates 35% of total revenue. Prioritize stock availability.',88,'g-green'],
                ['Weekend Surge','Sales increase 40% on Saturdays. Prepare extra stock by Friday.',85,'g-blue'],
                ['Bundle Pricing','Mango + Pineapple bundles could boost avg sale by 18%.',78,'g-indigo'],
            ] as [$t,$d,$c,$g])
            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <p class="text-[13px] font-bold text-gray-900">{{ $t }}</p>
                    <span class="badge badge-green text-[10.5px]">{{ $c }}% confidence</span>
                </div>
                <p class="text-[12.5px] text-gray-500 mb-2 leading-relaxed">{{ $d }}</p>
                <div class="progress-bar"><div class="{{ $g }} h-full rounded-full" style="width:{{ $c }}%"></div></div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@push('scripts')
<script>
const gc='rgba(124,58,237,.06)';
new Chart(document.getElementById('matrixChart'),{type:'bubble',data:{datasets:[{label:'Restock Pomelo',data:[{x:9,y:8,r:18}],backgroundColor:'rgba(239,68,68,.7)'},{label:'Sell Mango',data:[{x:8,y:9,r:22}],backgroundColor:'rgba(249,115,22,.7)'},{label:'Discount Pineapple',data:[{x:6,y:7,r:14}],backgroundColor:'rgba(99,102,241,.7)'},{label:'Restock Lanzones',data:[{x:5,y:6,r:12}],backgroundColor:'rgba(245,158,11,.7)'},{label:'Monitor Durian',data:[{x:4,y:5,r:10}],backgroundColor:'rgba(16,185,129,.7)'}]},options:{responsive:true,plugins:{legend:{position:'right',labels:{font:{size:10}}}},scales:{x:{title:{display:true,text:'Urgency →',font:{size:11}},min:0,max:10,grid:{color:gc}},y:{title:{display:true,text:'Impact →',font:{size:11}},min:0,max:10,grid:{color:gc}}}}});
new Chart(document.getElementById('revenueOptChart'),{type:'bar',data:{labels:['This Week\n(Current)','This Week\n(Optimized)','Next Week\n(Forecast)','Next Week\n(Optimized)'],datasets:[{label:'Revenue (₱)',data:[52300,77150,58400,86200],backgroundColor:['rgba(156,163,175,.5)','rgba(124,58,237,.8)','rgba(156,163,175,.5)','rgba(16,185,129,.8)'],borderRadius:12}]},options:{responsive:true,plugins:{legend:{display:false}},scales:{x:{grid:{display:false},ticks:{font:{size:10},color:'#9CA3AF'}},y:{grid:{color:gc},border:{display:false},ticks:{font:{size:10},color:'#9CA3AF',callback:v=>'₱'+(v/1000).toFixed(0)+'k'}}}}});
</script>
@endpush
</x-app-layout>
