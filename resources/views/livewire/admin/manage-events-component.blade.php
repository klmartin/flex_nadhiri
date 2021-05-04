<div><div class="container">
 <div class="my-2 flex sm:flex-row flex-col">
      <div> <button href="#myModal-8" data-toggle="modal" class="modal-open bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full">Send Messages</button></div>
 </div> 
    <div style="
    justify-content: center;
    flex-direction: row;    
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -7.5px;
    margin-left: -7.5px;
        margin-top: 35px;">


        <div style="    -ms-flex: 0 0 33.333333%;
    flex: 1 0 33.333333%;
    max-width: 50.333333%;">
            <legend><a href="http://www.jquery2dotnet.com"><i class="glyphicon glyphicon-globe"></i></a>New Church Event</legend>
            <form wire:submit.prevent="storeEvent">
                 @if(Session::has('message'))
                <div class="bg-blue-500 text-center py-4 lg:px-4">
  <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
    <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">New</span>
    <span class="font-semibold mr-2 text-left flex-auto">{{Session::get('message')}}</span>
    <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
  </div>
</div>
@endif
            <input class="form-control" wire:model="event_name" placeholder="Name of Event" type="text" required="required" />
            <textarea wire:model="message" id="message" class="form-control" rows="9" cols="25" required="required" placeholder="Message"></textarea>
            <label for="date">
                Event Start Date </label>
                 <label for="date" style="left: 494px;position: absolute;">
                Event Ending Date</label>
            <div class="row">
                <div class="col-xs-4 col-md-4">
                    <div class="form-group">
                        <div class="col-sm-16">
                            <input type="date" class="form-control" wire:model="event_start">
                        </div>
                    </div>   
                </div>
                <div class="col-xs-4 col-md-4">
                   
                </div>
                <div class="col-xs-4 col-md-4">
                    <div class="form-group">
                        <div class="col-sm-16">
                            <input type="date" class="form-control" wire:model="event_end">
                        </div>
                    </div>   
                </div>
            </div>
           
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                Save Event</button>
            </form>
        </div>
        <div style=" -ms-flex: 0 0 33.333333%;
    flex: 1 0 33.333333%;
    max-width: 50.333333%;">
    

            <livewire:member.view-events-component/>

        </div>
        <div id="myModal-8" class="modal fade">
        <div class="modal-dialog modal-lg">
        <!-- livewire add payment component -->

        <livewire:admin.send-sms-component/>

        <!-- end of livewire add payment Component -->
        </div>
        </div>

    </div>

</div>
</div>