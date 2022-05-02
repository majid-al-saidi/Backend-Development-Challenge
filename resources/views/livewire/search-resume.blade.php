<div>
    <br>
    <hr>
    <p>Search within this resume, max search words: 5</p>


    <form wire:submit.prevent="submit" class="pt-3 flex gap-1	">
        <div class="w-1/5">
            <label class="form-label required text-center" for="wordone">first word</label>
            <input
                class="form-controle mt-1 block w-full border-none bg-gray-100 h-11 rounded-full text-center shadow-sm hover:bg-blue-100 focus:bg-blue-100 focus:ring-0"
                type="text" name="wordone" id="wordone" required wire:model="wordone">
                <p class="text-center text-red-400">{{$errorone}}</p>
        </div>


        @if (!empty($wordone))
            <div class="w-1/5">
                <label class="form-label required text-center" for="wordtwo">second word</label>
                <input
                    class="form-controle mt-1 block w-full border-none bg-gray-100 h-11 rounded-full text-center shadow-sm hover:bg-blue-100 focus:bg-blue-100 focus:ring-0"
                    type="text" name="wordtwo" id="wordtwo" required wire:model="wordtwo">
                    <p class="text-center text-red-400">{{$errortwo}}</p>
            </div>
        @endif

        @if (!empty($wordtwo))
            <div class="w-1/5">
                <label class="form-label required text-center" for="wordthree">third word</label>
                <input
                    class="form-controle mt-1 block w-full border-none bg-gray-100 h-11 rounded-full text-center shadow-sm hover:bg-blue-100 focus:bg-blue-100 focus:ring-0"
                    type="text" name="wordthree" id="wordthree" required wire:model="wordthree">
                    <p class="text-center text-red-400">{{$errorthree}}</p>
            </div>
        @endif

        @if (!empty($wordthree))
            <div class="w-1/5">
                <label class="form-label required text-center" for="wordfour">fourth word</label>
                <input
                    class="form-controle mt-1 block w-full border-none bg-gray-100 h-11 rounded-full text-center shadow-sm hover:bg-blue-100 focus:bg-blue-100 focus:ring-0"
                    type="text" name="wordfour" id="wordfour" required wire:model="wordfour">
                    <p class="text-center text-red-400">{{$errorfour}}</p>
            </div>
        @endif
        @if (!empty($wordfour))
            <div class="w-1/5">
                <label class="form-label required text-center" for="wordfour">fivth word</label>
                <input
                    class="form-controle mt-1 block w-full border-none bg-gray-100 h-11 rounded-full text-center shadow-sm hover:bg-blue-100 focus:bg-blue-100 focus:ring-0"
                    type="text" name="wordfive" id="wordfive" required wire:model="wordfive">
                    <p class="text-center text-red-400">{{$errorfive}}</p>
            </div>
        @endif
    </form>

    <br>
    <br>

    @if (!empty($wordone) && $matchesone != null)
        <p>{{ $wordone }} matches: </p>
        @forelse ($matchesone as $matcheone)
            <li>{{ $matcheone }}</li>
        @empty
            <p>No results</p>
        @endforelse
    @endif

    @if (!empty($wordone) && !empty($wordtwo)&& $matchestwo != null)
        <p>{{ $wordtwo }} matches: </p>
        @forelse ($matchestwo as $matchetwo)
            <li>{{ $matchetwo }}</li>
        @empty
            <p>No results</p>
        @endforelse
    @endif

    @if (!empty($wordone) && !empty($wordtwo)&& $matchesthree != null)
        <p>{{ $wordthree }} matches: </p>
        @forelse ($matchesthree as $matchethree)
            <li>{{ $matchethree }}</li>
        @empty
            <p>No results</p>
        @endforelse
    @endif

    @if (!empty($wordone) && !empty($wordtwo)&& $matchesfour != null)
        <p>{{ $wordfour }} matches: </p>
        @forelse ($matchesfour as $matchefour)
            <li>{{ $matchefour }}</li>
        @empty
            <p>No results</p>
        @endforelse
    @endif
    @if (!empty($wordone) && !empty($wordtwo)&& $matchesfive != null)
        <p>{{ $wordfive }} matches: </p>
        @forelse ($matchesfive as $matchefive)
            <li>{{ $matchefive }}</li>
        @empty
            <p>No results</p>
        @endforelse
    @endif

</div>
