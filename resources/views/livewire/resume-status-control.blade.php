<div>
    <div class="flex">
        <div class="w-1/2 inline-block align-middle ">{{$status_title}}</div>
        <div class="w-1/2 ">@if ($resume->status_label == "Approved")
            <button class=" bg-red-500 p-3 rounded-full text-white shadow-sm hover:shadow-inner  transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-95"
            wire:click="reject">Reject</button>
            
            @elseif($resume->status_label == "Rejected")
            <button class=" bg-green-500 p-3 rounded-full text-white shadow-sm hover:shadow-inner  transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-95"
            wire:click="accept">Accept</button>
        
            @elseif($resume->status_label == "Processing")
            <button class=" bg-green-500 p-3 rounded-full text-white shadow-sm hover:shadow-inner  transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-95"
            wire:click="accept">Accept</button>
            <button class=" bg-red-500 p-3 rounded-full text-white shadow-sm hover:shadow-inner  transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-95"
            wire:click="accept">Rejecte</button>
                
            @endif</div>
    </div>
    
</div>
