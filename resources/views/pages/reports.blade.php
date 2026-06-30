<x-app-layout>
<x-slot name="title">Reports — FreshTrack</x-slot>

<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-7 fade-up">
    <div>
        <h1 class="text-[26px] font-black text-gray-900">Reports</h1>
        <p class="text-[13.5px] text-gray-500 mt-0.5">Comprehensive business performance reports · June 2026</p>
    </div>
    <div class="flex items-center gap-2.5">
        <button class="btn btn-outline btn-md text-[12.5px]">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            PDF
        </button>
        <button class="btn btn-outline btn-md text-[12.5px]">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
            Print
        </button>
        <button class="btn btn-outline btn-md text-[12.5px]">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            Excel
        </button>
        <button class="btn btn-violet btn-md text-[12.5px]">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
            Download CSV
        </button>
    </div>
</div>

<div class="card overflow-hidden fade-up delay-1" x-data="{ tab: 'sales' }">
    {{-- Tabs --}}
    <div class="flex gap-1 p-2 bg-gray-50 border-b border-gray-100">
    @foreach([['sales','money','Sales'],['forecast','chart','Forecast'],['inventory','box','Inventory'],['spoilage','warn','Spoilage'],['profit','gem','Profit']] as [$t,$icon,$l])
        <button @click="tab='{{ $t }}'"
                :class="tab==='{{ $t }}' ? 'g-violet text-white shadow-md' : 'text-gray-500 hover:bg-white hover:shadow-sm'"
                class="flex-1 py-2.5 px-3 rounded-xl text-[12.5px] font-semibold transition-all flex items-center justify-center gap-1.5">
            @if($icon==='money')<svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            @elseif($icon==='chart')<svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            @elseif($icon==='box')<svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            @elseif($icon==='warn')<svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
            @elseif($icon==='gem')<svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            @endif
            {{ $l }}
        </button>
        @endforeach
    </div>

    {{-- SALES --}}
    <div x-show="tab==='sales'" class="p-6">
        <div class="flex items-center justify-between mb-6">
            <div><h3 class="font-bold text-gray-900 text-[16px]">Sales Performance Report</h3><p class="text-[12px] text-gray-400 mt-0.5">June 1–23, 2026</p></div>
            <select class="inp" style="width:auto;padding:8px 14px;border-radius:10px"><option>June 2026</option><option>May 2026</option><option>April 2026</option></select>
        </div>
        <div class="grid grid-cols-4 gap-4 mb-6">
            @foreach([['Total Revenue','₱342,800','↑ 8.3%','badge-green'],['Transactions','847','↑ 12.1%','badge-green'],['Avg Daily Sales','₱14,904','↑ 5.4%','badge-green'],['Best Fruit','Mango','—','badge-violet']] as [$l,$v,$c,$b])
            <div class="bg-[#F5F3FF] rounded-2xl p-4 border border-violet-100 text-center">
                <p class="text-[22px] font-black text-gray-900">{{ $v }}</p>
                <p class="text-[12px] text-gray-500 mt-0.5">{{ $l }}</p>
                <span class="badge {{ $b }} text-[10px] mt-2">{{ $c }}</span>
            </div>
            @endforeach
        </div>
        <canvas id="salesReportChart" height="80" class="mb-6"></canvas>
        <table class="tbl w-full">
            <thead><tr><th class="text-left">Fruit</th><th class="text-left">Units Sold</th><th class="text-left">Revenue</th><th class="text-left">% of Total</th><th class="text-left">Trend</th></tr></thead>
            <tbody>
            @foreach([['Mango','2,450 kg','₱84,200','24.6%','↑'],['Durian','890 kg','₱62,400','18.2%','↑'],['Mangosteen','1,120 kg','₱42,600','12.4%','→'],['Pineapple','1,860 kg','₱38,100','11.1%','↓'],['Banana','3,200 kg','₱29,700','8.7%','↑'],['Lanzones','850 kg','₱21,300','6.2%','→'],['Pomelo','620 kg','₱18,500','5.4%','↑']] as $r)
            <tr><td class="font-medium text-gray-800">{{ $r[0] }}</td><td class="text-gray-500 text-[13px]">{{ $r[1] }}</td><td class="font-bold text-gray-900">{{ $r[2] }}</td><td class="text-gray-500">{{ $r[3] }}</td><td class="font-black text-[16px] {{ $r[4]==='↑'?'text-green-600':($r[4]==='↓'?'text-red-500':'text-blue-600') }}">{{ $r[4] }}</td></tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{-- FORECAST --}}
    <div x-show="tab==='forecast'" class="p-6">
        <h3 class="font-bold text-gray-900 text-[16px] mb-5">Forecast Accuracy Report</h3>
        <div class="grid grid-cols-4 gap-4 mb-6">
            @foreach([['Overall Accuracy','96.4%','badge-green'],['MAPE Score','3.6%','badge-blue'],['Model Version','v2.4.1','badge-violet'],['Training Data','14 months','badge-gray']] as [$l,$v,$b])
            <div class="bg-[#F5F3FF] rounded-2xl p-4 border border-violet-100 text-center"><p class="text-[22px] font-black text-gray-900">{{ $v }}</p><p class="text-[12px] text-gray-500 mt-0.5">{{ $l }}</p><span class="badge {{ $b }} text-[10px] mt-2">Verified</span></div>
            @endforeach
        </div>
        <canvas id="forecastAccReport" height="100" class="mb-6"></canvas>
        <table class="tbl w-full">
            <thead><tr><th class="text-left">Fruit</th><th class="text-left">Forecast</th><th class="text-left">Actual</th><th class="text-left">Error</th><th class="text-left">Accuracy</th></tr></thead>
            <tbody>
            @foreach([['Mango','₱84,000','₱84,200','0.24%','99.8%'],['Durian','₱65,000','₱62,400','4.0%','96.0%'],['Mangosteen','₱44,000','₱42,600','3.2%','96.8%'],['Pineapple','₱41,000','₱38,100','7.1%','92.9%'],['Banana','₱28,000','₱29,700','-6.1%','93.9%']] as $r)
            <tr><td class="font-medium text-gray-800">{{ $r[0] }}</td><td class="text-gray-500">{{ $r[1] }}</td><td class="text-gray-500">{{ $r[2] }}</td><td class="font-semibold {{ str_starts_with($r[3],'-')?'text-green-600':'text-amber-600' }}">{{ $r[3] }}</td><td><span class="badge badge-green text-[11px]">{{ $r[4] }}</span></td></tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{-- INVENTORY --}}
    <div x-show="tab==='inventory'" class="p-6">
        <h3 class="font-bold text-gray-900 text-[16px] mb-5">Inventory Turnover Report</h3>
        <canvas id="invTurnChart" height="100" class="mb-6"></canvas>
        <table class="tbl w-full">
            <thead><tr><th class="text-left">Fruit</th><th class="text-left">Opening Stock</th><th class="text-left">Received</th><th class="text-left">Sold</th><th class="text-left">Closing</th><th class="text-left">Turnover</th></tr></thead>
            <tbody>
            @foreach([['Mango','380 kg','460 kg','2,450 kg','390 kg','6.3x'],['Durian','120 kg','200 kg','890 kg','145 kg','7.4x'],['Pomelo','85 kg','40 kg','620 kg','8 kg','2.1x'],['Pineapple','160 kg','300 kg','1,860 kg','118 kg','11.6x'],['Banana','240 kg','600 kg','3,200 kg','210 kg','13.3x']] as $r)
            <tr><td class="font-medium text-gray-800">{{ $r[0] }}</td><td class="text-gray-500">{{ $r[1] }}</td><td class="text-gray-500">{{ $r[2] }}</td><td class="font-semibold text-green-600">{{ $r[3] }}</td><td class="text-gray-500">{{ $r[4] }}</td><td class="font-black text-violet-700">{{ $r[5] }}</td></tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{-- SPOILAGE --}}
    <div x-show="tab==='spoilage'" class="p-6">
        <h3 class="font-bold text-gray-900 text-[16px] mb-5">Spoilage Loss Report</h3>
        <div class="grid grid-cols-4 gap-4 mb-6">
            @foreach([['Total Spoilage','42 kg'],['Spoilage Rate','8.4%'],['Financial Loss','₱6,240'],['Prevented Loss','₱18,290']] as [$l,$v])
            <div class="bg-[#F5F3FF] rounded-2xl p-4 border border-violet-100 text-center"><p class="text-[22px] font-black text-gray-900">{{ $v }}</p><p class="text-[12px] text-gray-500 mt-0.5">{{ $l }}</p></div>
            @endforeach
        </div>
        <table class="tbl w-full">
            <thead><tr><th class="text-left">Fruit</th><th class="text-left">Spoilage Qty</th><th class="text-left">Loss Value</th><th class="text-left">Spoilage %</th><th class="text-left">Main Cause</th><th class="text-left">Status</th></tr></thead>
            <tbody>
            @foreach([['Mango','18 kg','₱2,160','12%','High temperature','badge-red'],['Durian','12 kg','₱3,840','45%','Extended storage','badge-red'],['Pomelo','5 kg','₱350','8%','High humidity','badge-amber'],['Lanzones','4 kg','₱360','6%','Poor ventilation','badge-amber'],['Pineapple','3 kg','₱225','4%','Normal degradation','badge-green']] as $r)
            <tr><td class="font-medium text-gray-800">{{ $r[0] }}</td><td class="text-red-600 font-semibold">{{ $r[1] }}</td><td class="font-bold text-gray-900">{{ $r[2] }}</td><td>
                <div class="flex items-center gap-2"><div class="progress-bar w-12"><div class="{{ (int)$r[3]>30?'bg-red-500':((int)$r[3]>15?'bg-amber-500':'bg-green-500') }} h-full rounded-full" style="width:{{ min((int)$r[3],100) }}%"></div></div><span class="text-[12.5px] font-bold text-gray-800">{{ $r[3] }}</span></div>
            </td><td class="text-gray-500 text-[12.5px]">{{ $r[4] }}</td><td><span class="badge {{ $r[5] }} text-[11px]">{{ (int)$r[3]>30?'Critical':((int)$r[3]>10?'Moderate':'Low Risk') }}</span></td></tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{-- PROFIT --}}
    <div x-show="tab==='profit'" class="p-6">
        <h3 class="font-bold text-gray-900 text-[16px] mb-5">Profit & Loss Report — June 2026</h3>
        <div class="grid grid-cols-4 gap-4 mb-6">
            @foreach([['Gross Revenue','₱342,800','text-violet-600'],['Total COGS','₱198,400','text-red-600'],['Gross Profit','₱144,400','text-green-600'],['Net Margin','42.1%','text-blue-600']] as [$l,$v,$c])
            <div class="bg-[#F5F3FF] rounded-2xl p-4 border border-violet-100 text-center"><p class="text-[22px] font-black {{ $c }}">{{ $v }}</p><p class="text-[12px] text-gray-500 mt-0.5">{{ $l }}</p></div>
            @endforeach
        </div>
        <canvas id="profitTrendChart" height="100"></canvas>
    </div>
</div>

@push('scripts')
<script>
const gc='rgba(124,58,237,.06)';
new Chart(document.getElementById('salesReportChart'),{type:'line',data:{labels:Array.from({length:23},(_,i)=>'Jun '+(i+1)),datasets:[{label:'Daily Revenue',data:[12400,14200,13800,16400,15100,17800,19200,14600,16900,18300,15200,20100,17400,18900,16200,21500,19800,22400,18600,20200,17900,23100,18450],borderColor:'#7C3AED',backgroundColor:'rgba(124,58,237,.07)',borderWidth:2.5,fill:true,tension:.4,pointRadius:0}]},options:{responsive:true,plugins:{legend:{display:false}},scales:{x:{grid:{display:false},ticks:{font:{size:9},color:'#9CA3AF'}},y:{grid:{color:gc},border:{display:false},ticks:{font:{size:10},color:'#9CA3AF',callback:v=>'₱'+(v/1000).toFixed(0)+'k'}}}}});
new Chart(document.getElementById('forecastAccReport'),{type:'line',data:{labels:['Week 1','Week 2','Week 3','Week 4','This Week'],datasets:[{label:'Mango',data:[97,98,99,98,99.8],borderColor:'#7C3AED',tension:.4,fill:false,borderWidth:2,pointRadius:4},{label:'Durian',data:[92,94,95,96,96],borderColor:'#10B981',tension:.4,fill:false,borderWidth:2,pointRadius:4},{label:'Pineapple',data:[88,90,91,93,92.9],borderColor:'#3B82F6',tension:.4,fill:false,borderWidth:2,pointRadius:4}]},options:{responsive:true,plugins:{legend:{position:'top',labels:{font:{size:11}}}},scales:{x:{grid:{display:false}},y:{min:85,max:100,grid:{color:gc},border:{display:false},ticks:{callback:v=>v+'%',font:{size:10},color:'#9CA3AF'}}}}});
new Chart(document.getElementById('invTurnChart'),{type:'bar',data:{labels:['Mango','Durian','Pomelo','Mangosteen','Lanzones','Pineapple','Banana'],datasets:[{label:'Turnover Rate',data:[6.3,7.4,2.1,5.8,4.2,11.6,13.3],backgroundColor:['#7C3AED','#10B981','#EF4444','#8B5CF6','#EC4899','#3B82F6','#14B8A6'],borderRadius:10}]},options:{responsive:true,plugins:{legend:{display:false}},scales:{x:{grid:{display:false}},y:{grid:{color:gc},border:{display:false},ticks:{font:{size:10},color:'#9CA3AF',callback:v=>v+'x'}}}}});
new Chart(document.getElementById('profitTrendChart'),{type:'bar',data:{labels:['Jan','Feb','Mar','Apr','May','Jun'],datasets:[{label:'Revenue',data:[280000,295000,310000,298000,325000,342800],backgroundColor:'rgba(124,58,237,.65)',borderRadius:8},{label:'COGS',data:[168000,177000,186000,178950,195000,198400],backgroundColor:'rgba(249,115,22,.65)',borderRadius:8},{label:'Profit',data:[112000,118000,124000,119050,130000,144400],backgroundColor:'rgba(16,185,129,.65)',borderRadius:8}]},options:{responsive:true,plugins:{legend:{position:'top',labels:{font:{size:11}}}},scales:{x:{grid:{display:false}},y:{grid:{color:gc},border:{display:false},ticks:{font:{size:10},color:'#9CA3AF',callback:v=>'₱'+(v/1000).toFixed(0)+'k'}}}}});
</script>
@endpush
</x-app-layout>
