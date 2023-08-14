<?php

namespace App\Http\Livewire\Staff;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Index extends Component
{
    public $name, $password, $role;

    protected $rules = [

        'name' => 'required',

        'password' => 'required|min:8',

        'role' => 'required',
    ];

    public function updated($field)

    {
        
        $this->validateOnly($field);

    }

    public function submit()
    {
        $this->validate();
        // dd($this->name, $this->password, $this->role);
        User::create([
           'name' => $this->name,
           'password' => Hash::make($this->password),
           'role_id' => $this->role
        ]);
        session()->flash('msg', 'Data berhasil ditambah!');
        $this->clearInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function clearInput()
    {
        $this->name = '';
        $this->password ='';
        $this->role = '';
    }

    public function render()
    {
        return view('livewire.staff.index',[
            'user' => User::all()
        ]);
    }
}
