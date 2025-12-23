<div class="bg-white shadow-md px-8 py-4 flex items-center justify-between relative">
    <!-- Page Indicator -->
    <div>
        <h2 class="text-xl font-semibold text-gray-800">{{ $pageTitle ?? 'Admin Panel' }}</h2>
        <p class="text-sm text-gray-500">Admin Panel - {{ $pageTitle ?? 'Dashboard' }}</p>
    </div>

    <!-- Right Side - Notifications & Profile -->
    <div class="flex items-center gap-4">
        <!-- Notifications -->
        <div class="relative">
            <button 
                onclick="toggleNotification()"
                class="p-2 hover:bg-gray-100 rounded-lg transition relative"
                id="notificationBtn"
            >
                <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                </svg>
                <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
            </button>

            <div id="notificationDropdown" class="hidden absolute right-0 top-12 w-80 bg-white rounded-xl shadow-xl border border-gray-200 z-50">
                <div class="p-4 border-b border-gray-200">
                    <h3 class="text-gray-800 font-semibold">Notifikasi Admin</h3>
                </div>
                <div class="max-h-96 overflow-y-auto">
                    <div class="p-4 border-b border-gray-100 hover:bg-gray-50 transition cursor-pointer">
                        <p class="text-gray-800 text-sm mb-1">Device AQV-001 offline</p>
                        <p class="text-gray-500 text-xs">5 menit lalu</p>
                    </div>
                    <div class="p-4 border-b border-gray-100 hover:bg-gray-50 transition cursor-pointer">
                        <p class="text-gray-800 text-sm mb-1">User baru mendaftar</p>
                        <p class="text-gray-500 text-xs">30 menit lalu</p>
                    </div>
                    <div class="p-4 border-b border-gray-100 hover:bg-gray-50 transition cursor-pointer">
                        <p class="text-gray-800 text-sm mb-1">Device issue dilaporkan</p>
                        <p class="text-gray-500 text-xs">1 jam lalu</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile -->
        <div class="relative">
            <button 
                onclick="toggleProfile()"
                class="flex items-center gap-3 p-2 hover:bg-gray-100 rounded-lg transition"
                id="profileBtn"
            >
                <div class="w-10 h-10 bg-gradient-to-br from-gray-600 to-gray-700 rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div class="text-left">
                    <p class="text-sm text-gray-800 font-medium">Administrator</p>
                    <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                </div>
            </button>

            <div id="profileDropdown" class="hidden absolute right-0 top-14 w-48 bg-white rounded-xl shadow-xl border border-gray-200 z-50">
                <button 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="flex items-center gap-3 px-4 py-3 hover:bg-gray-50 transition w-full text-left"
                >
                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    <span class="text-sm text-red-600 font-medium">Logout</span>
                </button>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function toggleNotification() {
    const dropdown = document.getElementById('notificationDropdown');
    const profileDropdown = document.getElementById('profileDropdown');
    dropdown.classList.toggle('hidden');
    profileDropdown.classList.add('hidden');
}

function toggleProfile() {
    const dropdown = document.getElementById('profileDropdown');
    const notificationDropdown = document.getElementById('notificationDropdown');
    dropdown.classList.toggle('hidden');
    notificationDropdown.classList.add('hidden');
}

document.addEventListener('click', function(event) {
    const notificationBtn = document.getElementById('notificationBtn');
    const profileBtn = document.getElementById('profileBtn');
    const notificationDropdown = document.getElementById('notificationDropdown');
    const profileDropdown = document.getElementById('profileDropdown');
    
    if (!notificationBtn.contains(event.target) && !notificationDropdown.contains(event.target)) {
        notificationDropdown.classList.add('hidden');
    }
    
    if (!profileBtn.contains(event.target) && !profileDropdown.contains(event.target)) {
        profileDropdown.classList.add('hidden');
    }
});
</script>