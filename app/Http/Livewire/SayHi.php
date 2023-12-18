<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class SayHi extends Component
{
    protected $listeners = ['foo'=> '$refresh'];
    public $contact;



    public function mount(Contact $contact )
    {
        $this->contact = $contact;
    }
    public function render()
    {
        return view('livewire.say-hi');
    }
}
