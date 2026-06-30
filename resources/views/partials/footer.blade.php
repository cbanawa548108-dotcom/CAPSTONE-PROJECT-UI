<footer class="h-12 bg-white border-t border-[rgba(124,58,237,.07)] flex items-center justify-between px-6 flex-shrink-0">
    <p class="text-[11.5px] text-gray-400 font-medium">
        © 2026 <span class="font-bold text-violet-600">FreshTrack</span> — AI-Powered Inventory & Forecasting · Davao City
    </p>
    <div class="flex items-center gap-4 text-[11.5px] text-gray-400">
        {{-- Live clock --}}
        <div class="hidden sm:flex items-center gap-1.5 font-medium text-gray-400"
             x-data="{ time: '' }"
             x-init="
                const update = () => {
                    const now = new Date();
                    time = now.toLocaleTimeString('en-PH', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
                };
                update();
                setInterval(update, 1000);
             ">
            <svg class="w-3.5 h-3.5 text-violet-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span x-text="time" class="font-mono text-[11.5px] tabular-nums text-gray-500"></span>
        </div>

        <span class="text-gray-200">|</span>

        {{-- System status --}}
        <span class="flex items-center gap-1.5 font-medium">
            <span class="w-1.5 h-1.5 bg-green-400 rounded-full pulse-dot"></span>
            <span class="text-green-600 font-semibold">All Systems Operational</span>
        </span>

        <span class="text-gray-200">|</span>
        <span class="font-medium text-gray-400">v2.0.0-beta</span>
    </div>
</footer>
