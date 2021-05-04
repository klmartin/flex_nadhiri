<div>
            <div class="modal-content">
            <div class="modal-header">              
            <div class="text-center"> <span class="text-xl text-gray-700">Member Registration Form</span> </div>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
           	<form wire:submit.prevent="addMember">
                @csrf
                     @if(Session::has('message'))
            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
              @endif
             <div class="card-body">
                <div class="py-20 h-screen bg-white-300 px-2">
   				<div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-md">
       			<div class="md:flex">
           		<div class="w-full p-3 px-6 py-10">
                <div class="mt-3 relative"> <span class="absolute p-1 bottom-8 ml-2 bg-white text-gray-400 ">First name</span> <input wire:model="name" class="h-12 px-2 w-full border-2 rounded focus:outline-none focus:border-red-600"> </div>
                <div class="mt-4 relative"> <span class="absolute p-1 bottom-8 ml-2 bg-white text-gray-400 ">Last name</span> <input wire:model="lastname" class="h-12 px-2 w-full border-2 rounded focus:outline-none focus:border-red-600"> </div>
                <div class="mt-4 relative"> <span class="absolute p-1 bottom-8 ml-2 bg-white text-gray-400 ">Email</span> <input wire:model="email" type="text" class="h-12 px-2 w-full border-2 rounded focus:outline-none focus:border-red-600"> </div>
                 <div class="mt-4 relative"> <span class="absolute p-1 bottom-8 ml-2 bg-white text-gray-400 ">Phone No</span> <input wire:model="phone_no" type="text" class="h-12 px-2 w-full border-2 rounded focus:outline-none focus:border-red-600"> </div>
                <div class="mt-4 relative"> <span class="absolute p-1 bottom-8 ml-2 bg-white text-gray-400 ">Set Password</span> <input wire:model="password" class="h-12 px-2 w-full border-2 rounded focus:outline-none focus:border-red-600"> </div>
                <div class="mt-4"> <button type="submit" class="h-12 w-full bg-red-600 text-white rounded hover:bg-blue-700">Proceed <i class="fa fa-long-arrow-right"></i></button> </div>
            </div>
        </div>
    </div>
</div>
</div>
</form>
</div>
<style type="text/css">
	.h-screen {
    height: 66vh;
}
	.py-20 {
    padding-top: 0rem;
    padding-bottom: 5rem;
}
</style>
</div>
