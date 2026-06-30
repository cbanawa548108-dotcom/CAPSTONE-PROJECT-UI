<x-app-layout>
<x-slot name="title">Image Processing — FreshTrack</x-slot>

{{-- ── PAGE HEADER ── --}}
<div class="flex items-center justify-between mb-7 fade-up">
    <div class="flex items-center gap-4">
        <div class="w-12 h-12 bg-gray-100 border border-gray-200 rounded-2xl flex items-center justify-center">
            <svg class="w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
        </div>
        <div>
            <h1 class="text-[26px] font-black text-gray-900">Image Processing</h1>
            <p class="text-[13.5px] text-gray-500 mt-0.5">AI-powered fruit quality analysis via camera or image upload</p>
        </div>
    </div>
    <span class="flex items-center gap-2 badge badge-violet px-3.5 py-2 text-[12px]">
        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
        </svg>
        AI Model v2.4 Active
    </span>
</div>

{{-- ── MAIN GRID ── --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-7 fade-up delay-1"
     x-data="{ analyzed: true, dragging: false }">

    {{-- ── LEFT: UPLOAD PANEL ── --}}
    <div class="space-y-5">
        {{-- Drop zone --}}
        <div class="card p-6">
            <div class="flex items-center gap-2 mb-5">
                <svg class="w-4.5 w-[18px] h-[18px] text-violet-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                </svg>
                <h3 class="font-bold text-gray-900 text-[15px]">Upload Fruit Image</h3>
            </div>
            <div @dragover.prevent="dragging=true"
                 @dragleave="dragging=false"
                 @drop.prevent="dragging=false; analyzed=true"
                 :class="dragging
                     ? 'border-violet-500 bg-violet-50'
                     : 'border-gray-200 bg-[#F9F8FF] hover:border-violet-400 hover:bg-violet-50/50'"
                 class="border-2 border-dashed rounded-2xl p-10 text-center transition-all duration-200 cursor-pointer">
                <div class="flex flex-col items-center gap-4">
                    <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-violet-100 to-blue-100 flex items-center justify-center shadow-inner">
                        <svg class="w-10 h-10 text-violet-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-gray-700 text-[15px]">Drag & drop fruit image here</p>
                        <p class="text-gray-400 text-[13px] mt-1">or click to browse files from your device</p>
                    </div>
                    <p class="text-[11.5px] text-gray-400">Supports JPG, PNG, WEBP · Maximum 10 MB</p>
                    <button class="btn btn-outline btn-sm text-[12.5px] flex items-center gap-2">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
                        </svg>
                        Browse Files
                    </button>
                </div>
            </div>
            <div class="flex gap-3 mt-4">
                <button @click="analyzed=true" class="btn btn-outline btn-md flex-1 text-[13px] flex items-center gap-2 justify-center">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Use Camera
                </button>
                <button @click="analyzed=true" class="btn btn-violet btn-md flex-1 text-[13px] flex items-center gap-2 justify-center">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                    </svg>
                    Upload & Analyze
                </button>
            </div>
        </div>

        {{-- Sample Fruit Grid --}}
        <div class="card p-5">
            <div class="flex items-center gap-2 mb-4">
                <svg class="w-4 h-4 text-violet-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                </svg>
                <h3 class="font-bold text-gray-900 text-[14px]">Sample Fruit Images</h3>
            </div>
            @php
            $sampleFruits = [
                ['Mango',      'g-violet', '#7C3AED'],
                ['Durian',     'g-green',  '#10B981'],
                ['Banana',     'g-amber',  '#F59E0B'],
                ['Pomelo',     'g-orange', '#F97316'],
                ['Pineapple',  'g-blue',   '#3B82F6'],
                ['Mangosteen', 'g-indigo', '#6366F1'],
                ['Lanzones',   'g-teal',   '#14B8A6'],
                ['Grapes',     'g-rose',   '#F43F5E'],
            ];
            $leafPath = 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4';
            @endphp
            <div class="grid grid-cols-4 gap-3">
                @foreach($sampleFruits as [$fruitName,$grad,$color])
                <button @click="analyzed=true"
                        class="aspect-square bg-gradient-to-br from-[#F5F3FF] to-[#EDE9FE] rounded-2xl flex flex-col items-center justify-center gap-1.5 hover:from-violet-100 hover:to-violet-200 hover:scale-105 transition-all shadow-sm border border-violet-100 group p-2">
                    <div class="w-8 h-8 rounded-xl flex items-center justify-center bg-gray-100 border border-gray-200 text-gray-400 flex-shrink-0">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $leafPath }}"/>
                        </svg>
                    </div>
                    <span class="text-[9.5px] font-semibold text-gray-500 group-hover:text-violet-700 leading-tight text-center">{{ $fruitName }}</span>
                </button>
                @endforeach
            </div>
        </div>
    </div>{{-- end left col --}}

    {{-- ── RIGHT: RESULT CARD ── --}}
    <div x-show="analyzed"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-x-4"
         x-transition:enter-end="opacity-100 translate-x-0">
        <div class="card overflow-hidden">
            {{-- Result header --}}
            <div class="g-violet p-6 text-white relative overflow-hidden">
                <div class="absolute inset-0 opacity-10"
                     style="background-image:radial-gradient(circle,rgba(255,255,255,.6) 1px,transparent 1px);background-size:24px 24px"></div>
                <div class="relative flex items-start justify-between">
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm flex-shrink-0">
                                <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $leafPath }}"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-black">Mango</h3>
                                <p class="text-white/70 text-[13px]">Carabao Variety · Detected</p>
                            </div>
                        </div>
                        <p class="text-white/60 text-[12px]">Analyzed at Jun 23, 2026 — 2:45 PM</p>
                    </div>
                    <div class="text-right bg-white/15 rounded-2xl px-4 py-3 backdrop-blur-sm flex-shrink-0">
                        <p class="text-[32px] font-black text-green-300 leading-none">92%</p>
                        <p class="text-white/70 text-[11px] mt-0.5">AI Confidence</p>
                    </div>
                </div>
            </div>

            <div class="p-6 space-y-5">
                {{-- 3 metric tiles --}}
                <div class="grid grid-cols-3 gap-3">
                    @php
                    $metrics = [
                        ['M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10', 'text-green-500',  'Ripeness',      '87/100', 'Ripe'],
                        ['M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z', 'text-violet-500','Quality Grade', 'A+',     'Premium'],
                        ['M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',                                                           'text-green-500',  'Spoilage Risk', '8%',     'Very Low'],
                    ];
                    @endphp
                    @foreach($metrics as [$iconPath,$iconColor,$label,$val,$sub])
                    <div class="bg-[#F5F3FF] rounded-2xl p-3.5 text-center border border-violet-100">
                        <svg class="w-5 h-5 mx-auto mb-1 {{ $iconColor }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $iconPath }}"/>
                        </svg>
                        <p class="text-[18px] font-black text-gray-900">{{ $val }}</p>
                        <p class="text-[11px] text-gray-500 font-medium">{{ $label }}</p>
                        <p class="text-[11px] text-green-600 font-bold">{{ $sub }}</p>
                    </div>
                    @endforeach
                </div>

                {{-- Surface defects --}}
                <div>
                    <p class="text-[11.5px] font-bold text-gray-500 uppercase tracking-wider mb-2.5">Surface Defects Detected</p>
                    <div class="flex flex-wrap gap-2">
                        @php
                        $defects = [
                            ['badge-green', true,  'No major bruising'],
                            ['badge-green', true,  'No black spots'],
                            ['badge-amber', false, 'Minor scratch (1)'],
                            ['badge-green', true,  'No mold detected'],
                        ];
                        @endphp
                        @foreach($defects as [$badgeClass,$ok,$label])
                        <span class="badge {{ $badgeClass }} text-[11px] flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                @if($ok)
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                @else
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01"/>
                                @endif
                            </svg>
                            {{ $label }}
                        </span>
                        @endforeach
                    </div>
                </div>

                {{-- Color analysis --}}
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

                {{-- Texture analysis --}}
                <div>
                    <p class="text-[11.5px] font-bold text-gray-500 uppercase tracking-wider mb-3">Texture Analysis</p>
                    <div class="grid grid-cols-3 gap-3">
                        @foreach([['Firmness','72%','Good'],['Smoothness','88%','Excellent'],['Uniformity','81%','Good']] as [$label,$val,$status])
                        <div class="bg-gray-50 rounded-xl p-3 border border-gray-100">
                            <p class="text-[11.5px] text-gray-500 font-medium mb-2">{{ $label }}</p>
                            <div class="progress-bar mb-1.5">
                                <div class="progress-fill bg-violet-600" style="width:{{ $val }}"></div>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-[12px] font-bold text-gray-800">{{ $val }}</span>
                                <span class="text-[11px] text-green-600 font-semibold">{{ $status }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- AI Recommendation --}}
                <div class="bg-green-50 rounded-2xl p-4 border border-green-200">
                    <div class="flex items-center gap-2 mb-2">
                        <svg class="w-4 h-4 text-green-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                        <p class="text-[12.5px] font-bold text-green-800">AI Recommendation</p>
                    </div>
                    <p class="text-[12.5px] text-green-700 leading-relaxed">
                        Premium quality mango — ready for immediate full-price sale. Minor surface scratch does not affect market value.
                        <strong>Suggested retail: ₱125–₱135/kg</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>{{-- end right col --}}
</div>{{-- end main grid --}}

{{-- ── ANALYSIS HISTORY ── --}}
<div class="card overflow-hidden fade-up delay-4">
    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
        <div>
            <h3 class="font-bold text-gray-900 text-[15px]">Analysis History</h3>
            <p class="text-[12px] text-gray-400 mt-0.5">Recent image processing results</p>
        </div>
        <button class="btn btn-outline btn-sm text-[12px] flex items-center gap-1.5">
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
            </svg>
            Clear History
        </button>
    </div>
    <div class="overflow-x-auto">
        <table class="tbl w-full">
            <thead><tr>
                <th class="text-left">Fruit</th>
                <th class="text-left">Ripeness</th>
                <th class="text-left">Grade</th>
                <th class="text-left">Confidence</th>
                <th class="text-left">Spoilage Risk</th>
                <th class="text-left">Date & Time</th>
                <th class="text-left">Result</th>
            </tr></thead>
            <tbody>
@php
$history = [
    ['Mango',      'g-violet', '87', 'A+', '92%', '8%',  'Jun 23, 2:45 PM', 'Premium Quality', 'badge-green'],
    ['Durian',     'g-green',  '74', 'B+', '88%', '32%', 'Jun 23, 1:30 PM', 'Good Condition',  'badge-green'],
    ['Banana',     'g-amber',  '92', 'A',  '95%', '4%',  'Jun 23, 11:20 AM','Excellent',        'badge-green'],
    ['Pomelo',     'g-orange', '55', 'C',  '79%', '58%', 'Jun 23, 10:05 AM','Poor — Discount',  'badge-red'],
    ['Pineapple',  'g-blue',   '81', 'A-', '91%', '14%', 'Jun 22, 4:00 PM', 'Good Condition',  'badge-green'],
    ['Mangosteen', 'g-indigo', '88', 'A+', '94%', '6%',  'Jun 22, 2:15 PM', 'Premium Quality', 'badge-green'],
];
@endphp
@foreach($history as [$name,$grad,$ripeness,$grade,$confidence,$spoilage,$datetime,$result,$badge])
<tr>
    <td>
        <div class="flex items-center gap-2.5">
            <div class="w-8 h-8 rounded-xl flex items-center justify-center bg-gray-100 border border-gray-200 text-gray-400 flex-shrink-0">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
            </div>
            <span class="font-semibold text-gray-800 text-[13.5px]">{{ $name }}</span>
        </div>
    </td>
    <td>
        <div class="flex items-center gap-2">
            <div class="progress-bar w-16">
                <div class="progress-fill bg-violet-600" style="width:{{ $ripeness }}%"></div>
            </div>
            <span class="text-[12.5px] font-bold text-gray-700">{{ $ripeness }}/100</span>
        </div>
    </td>
    <td class="font-black text-gray-900">{{ $grade }}</td>
    <td class="font-semibold text-green-600">{{ $confidence }}</td>
    <td class="font-semibold {{ (int)$spoilage > 30 ? 'text-red-600' : 'text-green-600' }}">{{ $spoilage }}</td>
    <td class="text-[12px] text-gray-400">{{ $datetime }}</td>
    <td><span class="badge {{ $badge }} text-[11px]">{{ $result }}</span></td>
</tr>
@endforeach
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>
