<x-app-layout>
<x-slot name="title">Sales — FruitIQ</x-slot>
<div x-data="{ addModal: false, viewId: null }" @open-add.window="addModal=true">

{{-- Header --}}
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-7 fade-up">
    <div>
        <h1 class="text-[26px] font-black text-gray-900">Sales Transactions</h1>
        <p class="text-[13.5px] text-gray-500 mt-0.5">Track, manage and analyze all fruit sales · June 2026</p>
    </div>
    <div class="flex items-center gap-3">
        <button class="btn btn-outline btn-md text-[13px]">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            Export PDF
        </button>
        <button class="btn btn-outline btn-md text-[13px]">
            <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
            Export CSV
        </button>
        <button @click="addModal=true" class="btn btn-violet btn-md text-[13px]">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            New Transaction
        </button>
    </div>
</div>

{{-- Stats --}}
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6 fade-up delay-1">
@foreach([["Today's Total",'₱18,450','💰','g-violet'],['Transactions','42 sales','🧾','g-green'],['Avg Sale Value','₱439','📊','g-amber'],['Top Seller','Mango','🥭','g-emerald']] as [$l,$v,$i,$g])
<div class="card shimmer card-lift p-5">
    <div class="stat-ring {{ $g }} mb-3 w-10 h-10 rounded-xl shadow-md"><span class="text-xl">{{ $i }}</span></div>
    <p class="text-[22px] font-black text-gray-900">{{ $v }}</p>
    <p class="text-[12.5px] text-gray-500 font-medium mt-0.5">{{ $l }}</p>
</div>
@endforeach
</div>

{{-- Filters --}}
<div class="card p-4 mb-5 fade-up delay-2">
    <div class="flex flex-wrap items-center gap-3">
        <div class="flex items-center gap-2.5 bg-gray-100 rounded-2xl px-4 py-2.5 flex-1 min-w-52 max-w-sm border-2 border-transparent focus-within:border-violet-400 focus-within:bg-white transition-all">
            <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <input type="text" placeholder="Search transactions, fruit, cashier…" class="bg-transparent text-[13px] text-gray-700 outline-none w-full placeholder-gray-400">
        </div>
        <input type="date" value="2026-06-23" class="inp" style="width:auto;padding:10px 14px;border-radius:12px">
        <select class="inp" style="width:auto;padding:10px 14px;border-radius:12px">
            <option>All Fruits</option>
            <option>🥭 Mango</option><option>🍑 Durian</option><option>🍈 Pomelo</option>
            <option>🍊 Mangosteen</option><option>🫐 Lanzones</option><option>🍌 Banana</option><option>🍍 Pineapple</option>
        </select>
        <select class="inp" style="width:auto;padding:10px 14px;border-radius:12px">
            <option>All Status</option><option>Completed</option><option>Pending</option><option>Cancelled</option>
        </select>
        <button class="btn btn-outline btn-sm text-[12px] text-gray-500">Clear Filters</button>
    </div>
</div>

{{-- Table --}}
<div class="card overflow-hidden fade-up delay-3">
    <div class="overflow-x-auto">
        <table class="tbl w-full">
            <thead><tr>
                <th class="text-left">Transaction ID</th><th class="text-left">Fruit</th><th class="text-left">Qty</th><th class="text-left">Unit Price</th><th class="text-left">Total</th><th class="text-left">Cashier</th><th class="text-left">Date & Time</th><th class="text-left">Status</th><th class="text-left">Actions</th>
            </tr></thead>
            <tbody>
@php
$txns = [
    ['TXN-20260623-001','🥭','Mango','15 kg','₱125/kg','₱1,875','Maria Santos','Jun 23, 08:32 AM','Completed','badge-green'],
    ['TXN-20260623-002','🍍','Pineapple','8 pcs','₱80/pc','₱640','Maria Santos','Jun 23, 09:15 AM','Completed','badge-green'],
    ['TXN-20260623-003','🍌','Banana','20 kg','₱45/kg','₱900','Pedro Reyes','Jun 23, 10:02 AM','Completed','badge-green'],
    ['TXN-20260623-004','🍈','Pomelo','5 pcs','₱75/pc','₱375','Pedro Reyes','Jun 23, 11:20 AM','Pending','badge-amber'],
    ['TXN-20260623-005','🍊','Mangosteen','12 kg','₱180/kg','₱2,160','Maria Santos','Jun 23, 01:45 PM','Completed','badge-green'],
    ['TXN-20260623-006','🫐','Lanzones','6 kg','₱90/kg','₱540','Ana Gomez','Jun 23, 02:30 PM','Completed','badge-green'],
    ['TXN-20260623-007','🥭','Mango','25 kg','₱125/kg','₱3,125','Ana Gomez','Jun 23, 03:15 PM','Completed','badge-green'],
    ['TXN-20260623-008','🍑','Durian','4 kg','₱350/kg','₱1,400','Pedro Reyes','Jun 23, 04:00 PM','Cancelled','badge-red'],
    ['TXN-20260622-039','🍌','Banana','30 kg','₱45/kg','₱1,350','Maria Santos','Jun 22, 09:00 AM','Completed','badge-green'],
    ['TXN-20260622-040','🍊','Mangosteen','8 kg','₱180/kg','₱1,440','Ana Gomez','Jun 22, 11:30 AM','Completed','badge-green'],
];
@endphp
@foreach($txns as $tx)
<tr>
    <td class="font-mono text-[12px] text-gray-500">{{ $tx[0] }}</td>
    <td><div class="flex items-center gap-2"><span class="text-lg">{{ $tx[1] }}</span><span class="font-semibold text-gray-800 text-[13.5px]">{{ $tx[2] }}</span></div></td>
    <td class="text-gray-500 text-[13px]">{{ $tx[3] }}</td>
    <td class="text-gray-500 text-[13px]">{{ $tx[4] }}</td>
    <td class="font-bold text-gray-900">{{ $tx[5] }}</td>
    <td>
        <div class="flex items-center gap-2">
            <div class="w-7 h-7 g-violet rounded-full flex items-center justify-center text-white text-[10px] font-bold">{{ substr($tx[6],0,1) }}</div>
            <span class="text-[12.5px] text-gray-600">{{ $tx[6] }}</span>
        </div>
    </td>
    <td class="text-[12px] text-gray-400">{{ $tx[7] }}</td>
    <td><span class="badge {{ $tx[9] }} text-[11px]">{{ $tx[8] }}</span></td>
    <td>
        <div class="flex items-center gap-1.5">
            <button class="p-1.5 text-gray-400 hover:text-violet-600 hover:bg-violet-50 rounded-lg transition-colors"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg></button>
            <button class="p-1.5 text-gray-400 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-colors"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></button>
            <button class="p-1.5 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
        </div>
    </td>
</tr>
@endforeach
            </tbody>
        </table>
    </div>
    <div class="flex items-center justify-between px-6 py-4 border-t border-gray-100 bg-gray-50/50">
        <p class="text-[12.5px] text-gray-500">Showing <span class="font-bold text-gray-800">1–10</span> of <span class="font-bold text-gray-800">247</span> transactions</p>
        <div class="flex items-center gap-1.5">
            <button class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-400 hover:bg-gray-200 transition-colors text-sm">←</button>
            @foreach([1,2,3,'…',24,25] as $p)
            <button class="w-8 h-8 flex items-center justify-center rounded-lg text-[12.5px] font-semibold transition-all {{ $p===1 ? 'g-violet text-white shadow-sm' : 'text-gray-600 hover:bg-gray-200' }}">{{ $p }}</button>
            @endforeach
            <button class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-400 hover:bg-gray-200 transition-colors text-sm">→</button>
        </div>
    </div>
</div>

{{-- Add Modal --}}
<div x-show="addModal" @click.self="addModal=false" class="modal-bg fixed inset-0 bg-black/40 flex items-center justify-center z-50 p-4" x-cloak
     x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md border border-violet-100"
         x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
        <div class="flex items-center justify-between px-6 py-5 border-b border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 g-violet rounded-xl flex items-center justify-center text-white shadow-md shadow-violet-200"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg></div>
                <div><h3 class="font-bold text-gray-900 text-[15px]">New Transaction</h3><p class="text-[11.5px] text-gray-400">Record a new fruit sale</p></div>
            </div>
            <button @click="addModal=false" class="p-2 hover:bg-gray-100 rounded-xl text-gray-400 transition-colors"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg></button>
        </div>
        <div class="p-6 space-y-4">
            <div><label class="inp-label">Fruit Type</label>
                <select class="inp"><option>🥭 Mango</option><option>🍑 Durian</option><option>🍈 Pomelo</option><option>🍊 Mangosteen</option><option>🫐 Lanzones</option><option>🍌 Banana</option><option>🍍 Pineapple</option></select>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div><label class="inp-label">Quantity</label><input type="number" placeholder="e.g. 15" class="inp"></div>
                <div><label class="inp-label">Unit (kg / pcs)</label><select class="inp"><option>kg</option><option>pcs</option><option>box</option></select></div>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div><label class="inp-label">Unit Price (₱)</label><input type="number" placeholder="0.00" class="inp"></div>
                <div><label class="inp-label">Cashier</label><select class="inp"><option>Maria Santos</option><option>Pedro Reyes</option><option>Ana Gomez</option></select></div>
            </div>
            <div><label class="inp-label">Notes (Optional)</label><input type="text" placeholder="Add notes…" class="inp"></div>
        </div>
        <div class="flex gap-3 px-6 pb-6">
            <button @click="addModal=false" class="btn btn-outline btn-md flex-1">Cancel</button>
            <button @click="addModal=false" class="btn btn-violet btn-md flex-1">Save Transaction</button>
        </div>
    </div>
</div>

</div>
</x-app-layout>
