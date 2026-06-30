<div id="ai-chat"
     x-data="{
        open: false,
        msgs: [{ from:'ai', text:'Good morning! I\'m FreshTrack AI Assistant. How can I help you today?' }],
        userInput: '',
        sendMsg() {
            const txt = this.userInput.trim();
            if (!txt) return;
            this.msgs.push({ from:'user', text: txt });
            this.userInput = '';
            setTimeout(() => {
                this.msgs.push({ from:'ai', text:'Analyzing your request… Based on current data, I recommend reviewing Mango and Durian inventory levels for optimal profitability.' });
            }, 900);
        }
     }"
     class="fixed bottom-6 right-6 z-[999] flex flex-col items-end">

    {{-- ── CHAT WINDOW ── --}}
    <div x-show="open" x-cloak
         x-transition:enter="transition ease-out duration-250"
         x-transition:enter-start="opacity-0 scale-95 translate-y-3"
         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
         x-transition:leave-end="opacity-0 scale-95 translate-y-3"
         class="mb-3 w-80 bg-white rounded-3xl overflow-hidden shadow-2xl shadow-violet-200/60 border border-violet-100">

        {{-- Header --}}
        <div class="g-violet px-4 py-3.5 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm flex-shrink-0">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-white font-bold text-[13.5px]" style="font-family:Poppins,sans-serif">FreshTrack AI</p>
                    <div class="flex items-center gap-1.5 mt-0.5">
                        <span class="w-1.5 h-1.5 bg-green-300 rounded-full pulse-dot"></span>
                        <span class="text-white/75 text-[11px] font-medium">Online · Ready to assist</span>
                    </div>
                </div>
            </div>
            <button @click="open = false"
                    class="text-white/60 hover:text-white hover:bg-white/15 p-1.5 rounded-xl transition-all">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Messages --}}
        <div class="bg-[#FAFAFE] h-64 overflow-y-auto p-4 space-y-3"
             x-ref="msgbox"
             x-effect="if(open) $nextTick(() => { $refs.msgbox.scrollTop = $refs.msgbox.scrollHeight })">
            <template x-for="(m, i) in msgs" :key="i">
                <div class="flex" :class="m.from === 'ai' ? 'justify-start' : 'justify-end'">
                    <div class="max-w-[85%] px-3.5 py-2.5 rounded-2xl text-[12.5px] leading-relaxed shadow-sm"
                         :class="m.from === 'ai'
                             ? 'bg-white text-gray-700 rounded-tl-sm border border-gray-100'
                             : 'g-violet text-white rounded-tr-sm'">
                        <span x-text="m.text"></span>
                    </div>
                </div>
            </template>
        </div>

        {{-- Quick suggestions --}}
        <div class="px-4 py-3 bg-[#F5F3FF] border-t border-violet-100 space-y-1.5">
            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider mb-2">Quick questions</p>
            @foreach(["What's today's forecast?", "Show spoilage alerts", "Top selling fruit today", "Restock recommendations"] as $q)
            <button @click="msgs.push({from:'user',text:'{{ $q }}'}); setTimeout(()=>msgs.push({from:'ai',text:'Let me check that for you…'}),800)"
                    class="w-full text-left text-[12px] text-violet-700 bg-white hover:bg-violet-50 px-3 py-2 rounded-xl border border-violet-100 font-medium transition-colors">
                {{ $q }}
            </button>
            @endforeach
        </div>

        {{-- Input --}}
        <div class="p-3 bg-white border-t border-gray-100 flex gap-2">
            <input type="text"
                   x-model="userInput"
                   @keydown.enter="sendMsg()"
                   placeholder="Ask FreshTrack AI anything…"
                   class="flex-1 text-[12.5px] px-3.5 py-2.5 rounded-xl border border-gray-200 bg-gray-50 outline-none focus:border-violet-400 focus:bg-white focus:shadow-[0_0_0_3px_rgba(124,58,237,.1)] transition-all placeholder-gray-400 text-gray-700">
            <button @click="sendMsg()"
                    class="w-9 h-9 g-violet rounded-xl flex items-center justify-center text-white hover:opacity-90 transition-opacity flex-shrink-0">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- ── TRIGGER BUTTON ── --}}
    <button @click="open = !open"
            class="w-14 h-14 g-violet rounded-2xl shadow-xl shadow-violet-400/40 flex items-center justify-center text-white hover:shadow-violet-400/60 hover:-translate-y-0.5 transition-all active:scale-95 relative flex-shrink-0">

        {{-- Chat icon (shown when closed) --}}
        <svg class="w-6 h-6 transition-all duration-200"
             :class="open ? 'opacity-0 scale-75 absolute' : 'opacity-100 scale-100'"
             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
        </svg>

        {{-- Close icon (shown when open) --}}
        <svg class="w-6 h-6 transition-all duration-200"
             :class="open ? 'opacity-100 scale-100' : 'opacity-0 scale-75 absolute'"
             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
        </svg>

        {{-- Notification badge --}}
        <span x-show="!open"
              class="absolute -top-1.5 -right-1.5 w-5 h-5 bg-red-500 rounded-full text-[9px] font-black flex items-center justify-center ring-2 ring-white shadow-sm">
            3
        </span>
    </button>
</div>
