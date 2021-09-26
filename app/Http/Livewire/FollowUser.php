<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class FollowUser extends Component
{
    public $userId;

    protected $listeners = ['followToggled' => '$refresh'];

    public function getUserProperty()
    {
        return User::withCount('followers')
            ->withFollowed()
            ->find($this->userId);
    }

    public function follow()
    {
        if (! auth()->check()) {
            return redirect()->route('login.create');
        }

        $this->user->toggleFollow();

        $this->emit('followToggled');
    }

    public function render()
    {
        return view('livewire.follow-user');
    }
}
