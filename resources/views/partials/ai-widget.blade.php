<div id="ai-chat" x-data="{ open: false, typing: false, msgs: [
    { from:'ai', text:'👋 Good morning! I\'m FruitIQ AI Assistant. How can I help you today?' },
] }">
    {{-- Chat window --}}
    <div x-show="open" x-cloak
         x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90 translate-y-4" x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-4"
         class="mb-3 w-80 card overflow-hidden shadow-2xl shadow-violet-200/50 border-violet-100">

        {{-- Header --}}
        <div class="g-violet p-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 bg-white/20 rounded-xl flex items-center justify-center text-lg backdrop-blur-sm">🧠</div>
                <div>
                    <p class="text-white font-bold text-sm" style="font-family:Poppins,sans-serif">FruitIQ AI</p>
                    <div class="flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 bg-green-300 rounded-full pulse-dot"></span>
                        <span class="text-white/80 text-[11px] font-medium">Online · Ready to assist</span>
                    </div>
                </div>
            </div>
            <button @click="open = false" class="text-white/70 hover:text-white transition-colors p-1 rounded-lg hover:bg-white/10">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        {{-- Messages --}}
        <div class="bg-[#FAFAFE] h-64 overflow-y-auto p-4 space-y-3">
            <template x-for="(m, i) in msgs" :key="i">
                <div :class="m.from === 'ai' ? 'justify-start' : 'justify-end'" class="flex">
                    <div :class="m.from === 'ai' ? 'bg-white text-gray-700 rounded-tl-none border border-violet-100' : 'g-violet text-white rounded-tr-none'"
                         class="max-w-[85%] px-3.5 py-2.5 rounded-2xl text-[12.5px] leading-relaxed shadow-sm">
                        <span x-text="m.text"></span>
                    </div>
                </div>
            </template>

            {{-- Quick suggestions --}}
            <div class="pt-2 space-y-1.5">
                <p class="text-[10.5px] text-gray-400 font-medium uppercase tracking-wide">Quick questions</p>
                @foreach(["What's today's forecast?","Show spoilage alerts","Top selling fruit today","Restock recommendations"] as $q)
                <button onclick="document.querySelector('[x-data]').__x.\$data.msgs.push({from:'user',text:'{{ $q }}'})"
                        class="w-full text-left text-[12px] text-violet-700 bg-violet-50 hover:bg-violet-100 px-3 py-2 rounded-xl border border-violet-100 font-medium transition-colors">
                    {{ $q }}
                </button>
                @endforeach
            </div>
        </div>

        {{-- Input --}}
        <div class="p-3 bg-white border-t border-gray-100 flex gap-2">
            <input type="text" placeholder="Ask FruitIQ AI anything…"
                   class="inp flex-1 text-[12.5px] py-2.5 rounded-xl"
                   @keydown.enter="if ($event.target.value.trim()) { msgs.push({from:'user',text:$event.target.value}); $event.target.value=''; setTimeout(()=>{ msgs.push({from:'ai',text:'🤖 Analyzing your request… Based on current data, I recommend reviewing Mango and Durian inventory levels for optimal profitability.'}); },1000); }">
            <button class="btn btn-violet btn-sm px-3">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
            </button>
        </div>
    </div>

    {{-- Trigger button --}}
    <button @click="open = !open"
            class="w-14 h-14 g-violet rounded-2xl shadow-2xl shadow-violet-400/40 flex items-center justify-center text-white hover:scale-110 transition-all active:scale-95 relative">
        <svg x-show="!open" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
        </svg>
        <svg x-show="open" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
        </svg>
        <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 rounded-full text-[9px] font-black flex items-center justify-center ring-2 ring-white">3</span>
    </button>
</div>
