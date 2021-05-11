<div><div class="container mx-auto py-10 flex ">
    <div class="w-screen pl-4  h-full flex flex-col">
                    <div class="bg-white text-sm text-gray-500 font-bold px-5 py-2 shadow border-b border-gray-300">
                        @if(Auth::user()->role == 'admin')
                        View & Manage Church Events
                        @else
                        New Church Events
                        @endif
                    </div>
                     @if(Session::has('message'))
                    <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                     <p class="font-bold">{{Session::get('message')}}</p>
                    </div>
                    @endif
                    <div class="w-full h-full overflow-auto shadow bg-white" id="journal-scroll">
                    <table class="w-full">
                        <tbody class="">
                            @foreach($event as $events)
                                <tr class="relative transform scale-100 text-xs py-1 border-b-2 border-blue-100 cursor-default bg-blue-500 bg-opacity-25">
                                <td class="pl-5 pr-3 whitespace-no-wrap">
                                    <div class="text-gray-400">{{\Carbon\Carbon::parse($events->created_at)->format('d M')}}</div>
                                    <div>{{\Carbon\Carbon::parse($events->created_at)->format('H : i')}}</div>
                                </td>

                                <td class="px-2 py-2 whitespace-no-wrap">
                                    <div class="leading-5 text-gray-500 font-medium">{{$events->event_name}}</div>
                                    <div class="leading-5 text-gray-900">{{$events->message}}</div>
                                    <div class="leading-5 text-gray-800">Event Ends at {{\Carbon\Carbon::parse($events->event_end)->format('d M')}}</div>
                                </td> @if(Auth::user()->role == 'admin')
                                <td> <a class="btn btn-danger" href="#" onclick="confirm('Are You Sure You Want To Delete This Event?') || event.stopImmediatePropagation()" wire:click.prevent="deleteEvent({{$events->id}})" ><span class="iconify" data-icon="fluent:delete-20-regular" data-inline="false"></span></a></td> @endif

                            </tr>

                            @endforeach              
                        </tbody>
                    </table>
                    </div>
                    
                </div>
</div>

<style>
  #journal-scroll::-webkit-scrollbar {
            width: 4px;
            cursor: pointer;
            /*background-color: rgba(229, 231, 235, var(--bg-opacity));*/

        }
        #journal-scroll::-webkit-scrollbar-track {
            background-color: rgba(229, 231, 235, var(--bg-opacity));
            cursor: pointer;
            /*background: red;*/
        }
        #journal-scroll::-webkit-scrollbar-thumb {
            cursor: pointer;
            background-color: #a0aec0;
            /*outline: 1px solid slategrey;*/
        }
</style>
</div>
