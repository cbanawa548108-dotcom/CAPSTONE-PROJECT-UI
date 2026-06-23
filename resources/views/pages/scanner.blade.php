<x-app-layout>
<x-slot name="title">Image Processing — FruitIQ</x-slot>

<div class="flex items-center justify-between mb-7 fade-up">
    <div class="flex items-center gap-4">
        <div class="w-12 h-12 g-blue rounded-2xl flex items-center justify-center shadow-lg shadow-blue-200/60 text-2xl">📷</div>
        <div>
            <h1 class="text-[26px] font-black text-gray-900">Image Processing</h1>
            <p class="text-[13.5px] text-gray-500 mt-0.5">AI-powered fruit quality analysis via camera or image upload</p>
        </div>
    </div>
    <span class="badge badge-violet px-3.5 py-2 text-[12px]">🤖 AI Model v2.4 Active</span>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-7 fade-up delay-1" x-data="{ analyzed: true, dragging: false }">

    {{-- Upload Panel --}}
    <div class="space-y-5">
        <div class="card p-6">
            <h3 class="font-bold text-gray-900 text-[15px] mb-5">📤 Upload Fruit Image</h3>
            <div @dragover.prevent="dragging=true" @dragleave="dragging=false" @drop.prevent="dragging=false; analyzed=true"
                 :class="dragging ? 'border-violet-500 bg-violet-50' : 'border-gray-200 bg-[#F9F8FF] hover:border-violet-400 hover:bg-violet-50/50'"
                 class="border-2 border-dashed rounded-2xl p-10 text-center transition-all duration-200 cursor-pointer">
                <div class="flex flex-col items-center gap-4">
                    <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-violet-100 to-blue-100 flex items-center justify-center shadow-inner">
                        <span class="text-4xl">🖼</span>
                    </div>
                    <div>
                        <p class="font-bold text-gray-700 text-[15px]">Drag & drop fruit image here</p>
                        <p class="text-gray-400 text-[13px] mt-1">or click to browse files from your device</p>
                    </div>
                    <p class="text-[11.5px] text-gray-400">Supports JPG, PNG, WEBP · Maximum 10MB</p>
                    <button class="btn btn-outline btn-sm text-[12.5px]">Browse Files</button>
                </div>
            </div>
            <div class="flex gap-3 mt-4">
                <button @click="analyzed=true" class="btn btn-outline btn-md flex-1 text-[13px]">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Use Camera
                </button>
                <button @click="analyzed=true" class="btn btn-violet btn-md flex-1 text-[13px]">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                    Upload & Analyze
                </button>
            </div>
        </div>

        <div class="card p-5">
            <h3 class="font-bold text-gray-900 text-[14px] mb-4">🖼 Sample Fruit Images</h3>
            <div class="grid grid-cols-4 gap-3">
                @foreach(['🥭','🍑','🍌','🍈','🍍','🍊','🫐','🍇'] as $f)
                <button @click="analyzed=true" class="aspect-square bg-gradient-to-br from-[#F5F3FF] to-[#EDE9FE] rounded-2xl flex items-center justify-center text-3xl hover:from-violet-100 hover:to-violet-200 hover:scale-105 transition-all shadow-sm border border-violet-100">{{ $f }}</button>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Result Card --}}
    <div x-show="analyzed" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0">
        <div class="card overflow-hidden">
            <div class="g-violet p-6 text-white relative overflow-hidden">
                <div class="absolute inset-0 opacity-10" style="background-image:radial-gradient(circle,rgba(255,255,255,.6) 1px,transparent 1px);background-size:24px 24px"></div>
                <div class="relative flex items-start justify-between">
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <span class="text-5xl">🥭</span>
                            <div>
                                <h3 class="text-2xl font-black">Mango</h3>
                                <p class="text-white/70 text-[13px]">Carabao Variety · Detected</p>
                            </div>
                        </div>
                        <p class="text-white/60 text-[12px]">Analyzed at Jun 23, 2026 — 2:45 PM</p>
                    </div>
                    <div class="text-right bg-white/15 rounded-2xl px-4 py-3 backdrop-blur-sm">
                        <p class="text-[32px] font-black text-green-300">92%</p>
                        <p class="text-white/70 text-[11px]">AI Confidence</p>
                    </div>
                </div>
            </div>

            <div class="p-6 space-y-5">
                <div class="grid grid-cols-3 gap-3">
                    @foreach([['Ripeness Score','87/100','🟢','Ripe'],['Quality Grade','A+','⭐','Premium'],['Spoilage Risk','8%','✅','Very Low']] as [$l,$v,$i,$s])
                    <div class="bg-[#F5F3FF] rounded-2xl p-3.5 text-center border border-violet-100">
                        <span class="text-xl">{{ $i }}</span>
                        <p class="text-[18px] font-black text-gray-900 mt-1">{{ $v }}</p>
                        <p class="text-[11px] text-gray-500 font-medium">{{ $l }}</p>
                        <p class="text-[11px] text-green-600 font-bold">{{ $s }}</p>
                    </div>
                    @endforeach
                </div>

                <div>
                    <p class="text-[11.5px] font-bold text-gray-500 uppercase tracking-wider mb-2.5">Surface Defects Detected</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="badge badge-green text-[11px]">✓ No major bruising</span>
                        <span class="badge badge-green text-[11px]">✓ No black spots</span>
                        <span class="badge badge-amber text-[11px]">⚠ Minor scratch (1)</span>
                        <span class="badge badge-green text-[11px]">✓ No mold detected</span>
                    </div>
                </div>

                <div>
                    <p class="text-[11.5px] font-bold text-gray-500 uppercase tracking-wider mb-2.5">Color Analysis</p>
                    <div class="flex items-center gap-3">
                        <div class="flex gap-1.5">
                            @foreach(['#f59e0b','#fbbf24','#fcd34d','#fde68a','#fef3c7'] as $col)
                            <div class="w-8 h-8 rounded-xl border border-white shadow-sm" style="background:{{ $col }}"></div>
                            @endforeach
                        </div>
                        <div>
                            <p class="text-[12.5px] font-bold text-gray-800">Golden Yellow — Primary</p>
                            <p class="text-[11.5px] text-gray-500 mt-0.5">68% coverage · Indicates full ripeness</p>
                        </div>
                    </div>
                </div>

                <div>
                    <p class="text-[11.5px] font-bold text-gray-500 uppercase tracking-wider mb-3">Texture Analysis</p>
                    <div class="grid grid-cols-3 gap-3">
                        @foreach([['Firmness','72%','Good'],['Smoothness','88%','Excellent'],['Uniformity','81%','Good']] as [$l,$v,$s])
                        <div class="bg-gray-50 rounded-xl p-3 border border-gray-100">
                            <p class="text-[11.5px] text-gray-500 font-medium mb-2">{{ $l }}</p>
                            <div class="progress-bar mb-1.5"><div class="progress-fill bg-violet-600" style="width:{{ $v }}"></div></div>
                            <div class="flex justify-between"><span class="text-[12px] font-bold text-gray-800">{{ $v }}</span><span class="text-[11px] text-green-600 font-semibold">{{ $s }}</span></div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="bg-green-50 rounded-2xl p-4 border border-green-200">
                    <p class="text-[12.5px] font-bold text-green-800 mb-1.5">🎯 AI Recommendation</p>
                    <p class="text-[12.5px] text-green-700 leading-relaxed">Premium quality mango — ready for immediate full-price sale. Minor surface scratch does not affect market value. <strong>Suggested retail: ₱125–₱135/kg</strong></p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- History --}}
<div class="card overflow-hidden fade-up delay-4">
    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
        <div><h3 class="font-bold text-gray-900 text-[15px]">Analysis History</h3><p class="text-[12px] text-gray-400 mt-0.5">Recent image processing results</p></div>
        <button class="btn btn-outline btn-sm text-[12px]">Clear History</button>
    </div>
    <div class="overflow-x-auto">
        <table class="tbl w-full">
            <thead><tr>
                <th class="text-left">Fruit</th><th class="text-left">Ripeness</th><th class="text-left">Grade</th><th class="text-left">Confidence</th><th class="text-left">Spoilage Risk</th><th class="text-left">Date & Time</th><th class="text-left">Result</th>
            </tr></thead>
            <tbody>
@foreach([
    ['🥭','Mango','87/100','A+','92%','8%','Jun 23, 2:45 PM','Premium Quality','badge-green'],
    ['🍑','Durian','74/100','B+','88%','32%','Jun 23, 1:30 PM','Good Condition','badge-green'],
    ['🍌','Banana','92/100','A','95%','4%','Jun 23, 11:20 AM','Excellent','badge-green'],
    ['🍈','Pomelo','55/100','C','79%','58%','Jun 23, 10:05 AM','Poor — Discount','badge-red'],
    ['🍍','Pineapple','81/100','A-','91%','14%','Jun 22, 4:00 PM','Good Condition','badge-green'],
    ['🍊','Mangosteen','88/100','A+','94%','6%','Jun 22, 2:15 PM','Premium Quality','badge-green'],
] as $h)
<tr>
    <td><div class="flex items-center gap-2.5"><span class="text-xl">{{ $h[0] }}</span><span class="font-semibold text-gray-800 text-[13.5px]">{{ $h[1] }}</span></div></td>
    <td>
        <div class="flex items-center gap-2">
            <div class="progress-bar w-16"><div class="progress-fill bg-violet-600" style="width:{{ (int)$h[2] }}%"></div></div>
            <span class="text-[12.5px] font-bold text-gray-700">{{ $h[2] }}</span>
        </div>
    </td>
    <td class="font-black text-gray-900">{{ $h[3] }}</td>
    <td class="font-semibold text-green-600">{{ $h[4] }}</td>
    <td class="font-semibold {{ (int)$h[5] > 30 ? 'text-red-600' : 'text-green-600' }}">{{ $h[5] }}</td>
    <td class="text-[12px] text-gray-400">{{ $h[6] }}</td>
    <td><span class="badge {{ $h[8] }} text-[11px]">{{ $h[7] }}</span></td>
</tr>
@endforeach
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>
