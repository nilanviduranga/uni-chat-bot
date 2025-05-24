<div class="flex flex-col items-center bg-indigo-100 border border-gray-200 mt-4 w-full py-6 px-4 rounded-lg">
    <div class="h-20 w-20 rounded-full border overflow-hidden">
        <img src="https://avatars3.githubusercontent.com/u/2763884?s=128" alt="Avatar" class="h-full w-full" />
    </div>
    <div class="text-sm font-semibold mt-2">Nipun Hansaka</div>
    <div class="text-xs text-gray-500">UOC - Student</div>
    <div class="flex flex-row items-center mt-3">

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-xs bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded">
                Logout
            </button>
        </form>

    </div>
</div>


{{-- <div class="flex flex-col items-center bg-indigo-100 border border-gray-200 mt-4 w-full py-6 px-4 rounded-lg">
    <div class="h-20 w-20 rounded-full border overflow-hidden">
        <img src="https://avatars3.githubusercontent.com/u/2763884?s=128" alt="Avatar" class="h-full w-full" />
    </div>
    <div class="text-sm font-semibold mt-2">Aminos Co.</div>
    <div class="text-xs text-gray-500">Lead UI/UX Designer</div>
    <div class="mt-3">
        <button class="text-xs bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded">
            Logout
        </button>
    </div>
</div> --}}
