<div>

        Hello {{ $contact->name }}  {{ now() }} <button  wire:click="$emit('foo')">Refresh</button>



</div>
