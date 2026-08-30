{{-- Preloader Component --}}
<div id="preloader" class="preloader-overlay">
    <div class="flex flex-col items-center gap-5">
        <div class="preloader-ring">
            <div class="preloader-ring-inner"></div>
        </div>
        <span class="text-sm font-semibold text-slate-400 tracking-widest uppercase">{{ $settings->site_name }}</span>
    </div>
</div>

<script>
    window.addEventListener('load', function() {
        var p = document.getElementById('preloader');
        if (p) {
            setTimeout(function() {
                p.classList.add('loaded');
                setTimeout(function() { p.remove(); }, 500);
            }, 400);
        }
    });
    setTimeout(function() {
        var p = document.getElementById('preloader');
        if (p && !p.classList.contains('loaded')) {
            p.classList.add('loaded');
            setTimeout(function() { p.remove(); }, 500);
        }
    }, 3500);
</script>
