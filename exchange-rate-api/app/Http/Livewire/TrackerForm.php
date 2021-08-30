<?php

namespace App\Http\Livewire;
use App\Contact;
use Livewire\Component;

final class TrackerForm extends Component
{
    public $fromDate = null;
    public $toDate = null;

    const RULES = [
        'fromDate' => 'date:Y-m-d',
        'toDate' => 'date:Y-m-d',
    ];

    const MESSAGES = [
        
    ];

    const VALIDATION_ATTRS = [

    ];

    public function mount() {

    }

    public function submit()
    {
        $data = $this->validate();
  
        //Contact::create($data);
  
        return redirect()->to('/tracker');
    }

    public function render()
    {
        return view('livewire.tracker-form');
    }
}
