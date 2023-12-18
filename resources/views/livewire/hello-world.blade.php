<div>
    @foreach($contacts as $contact)
        @livewire('say-hi',['contact' => $contact], key($contact->name))
        <button  wire:click="deleteContact('{{$contact->id}}')">Delete</button>
    @endforeach

        <hr>
        <button wire:click="$emit('foo')">Refresh Children</button>
    {{ now() }}
</div>
